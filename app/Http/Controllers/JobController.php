<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Http\Resources\JobResource;
use App\Models\City;
use App\Models\Job;
use App\Models\JobUser;
use App\Models\Package;
use App\Models\User;
use App\Services\Job\JobFilterService;
use App\Services\Job\JobHelper;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Omgtheking\OmgIyzicoPayment\Models\OmgPayTransactions;
use Omgtheking\OmgIyzicoPayment\omgIyzicoPayment;
use Stevebauman\Location\Facades\Location;

class JobController extends Controller
{

    private $city;
    private $product;

    public function __construct()
    {
        if ($position = Location::get()) {
            if (strlen($position->zipCode) == 4) {
                $position->zipCode = "0" . $position->zipCode;
            }
            $this->city = City::find((int)substr($position->zipCode, 0, 2));
        }

        $this->product = [
            'name' => 'İş İlanı Yayımlama Hizmeti',
            'type' => 'money',
            'price' => 9.50,
            'expire_date' => '2022-02-02',
        ];
    }

    public function index(Request $request, JobFilterService $jobFilterService, JobHelper $jobHelper)
    {
        if (!$request->has('city_id')) {
            return redirect()->route('job.index', ['city_id' => $this->city->id]);
        }

        $jobs = $jobFilterService->filter($request);

        $jobs = $jobs->listable()->orderByDesc('created_at')->paginate(8);

        [
            $workTypes,
            $categories,
            $genders,
            $jobPackages,
            $cities,
            $districts,
            $selectedDistricts,
        ] = $jobHelper->getJobCreateData($request->has('city_id') ? City::findOrFail($request->get('city_id')) : $this->city);

        return view('jobs.index', [
            'jobs' => $jobs,
            'workTypes' => $workTypes,
            'categories' => $categories,
            'genders' => $genders,
            'jobPackages' => $jobPackages,
            'cities' => $cities,
            'districts' => $districts,
            'selectedCity' => $this->city,
            'selectedDistricts' => $selectedDistricts,
        ]);
    }

    public function create(JobHelper $jobHelper)
    {
        if (!auth()->check())
            return redirect()->route('register-user');
        $selectedCity = $this->city;

        [
            $workTypes,
            $categories,
            $genders,
            $jobPackages,
            $cities,
            $districts,
            $selectedDistricts,
        ] = $jobHelper->getJobCreateData($selectedCity);


        return view('jobs.create', compact(
            'workTypes',
            'categories',
            'genders',
            'jobPackages',
            'cities',
            'districts',
            'selectedCity',
            'selectedDistricts'));
    }

    public function store(JobStoreRequest $request)
    {
        if (!auth()->check()) {
            $user = User::factory(1)->create()[0];
            $user->name = 'İsimsiz Kullanıcı';
            $user->token = Str::slug(Str::random(32));
            $user->save();
            $user->assignRole('employee'); // default role is "employee" when user creates a job

            auth()->loginUsingId($user->id);
        }

        $user = auth()->user();

        $job = Job::create(array_merge($request->validated(), [
            'user_id' => $user->id,
            'slug' => Str::slug($request->get('title')),
        ]));

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $job->addMedia($file)->toMediaCollection('images');
            }
        }

        if (count($job->getMedia('images')) < 1) {
            if (env('APP_ENV') == "local"){
                $job->addMediaFromUrl('https://image.shutterstock.com/image-photo/suleymaniye-mosque-during-sunset-istanbul-600w-1889028265.jpg')->toMediaCollection('images');
            }else{
                $job->addMediaFromUrl($job->category->default_cover_image)->toMediaCollection('images');
            }
        }

        return response()->json([
            'message' => 'İş ilanı kaydedildi. Ödeme bekleniyor',
            'job' => new JobResource($job),
            'url' => route('job.pricing', $job)
        ]);
    }

    public function show(Job $job)
    {
        if (!auth()->check() || auth()->id() !== $job->user->id) {
            if (!Cache::has(\request()->ip() . $job->slug)) {
                $job->increment('view_counter');
            }
        }

        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job, JobHelper $jobHelper)
    {
        if (!auth()->check())
            return redirect()->route('register-user');

        if ($job->user_id !== auth()->id())
            return \redirect()->back()->withErrors(['msg' =>'Sizin olmayan ilani güncelleyemezsiniz' ]);

        $selectedCity = $this->city;

        [
            $workTypes,
            $categories,
            $genders,
            $jobPackages,
            $cities,
            $districts,
            $selectedDistricts,
        ] = $jobHelper->getJobCreateData($selectedCity);


        return view('jobs.create', compact(
            'workTypes',
            'categories',
            'genders',
            'jobPackages',
            'cities',
            'job',
            'districts',
            'selectedCity',
            'selectedDistricts'));
    }

    public function update(JobUpdateRequest $request,Job $job)
    {
        try {
            $job->update($request->validated());
        }catch (\Exception $exception){
            return $this->returnJsonException($exception);
        }

        return response()->json([
            'message' => 'İş ilanı kaydedildi. Ödeme bekleniyor',
            'job' => new JobResource($job),
            'url' => route('job.pricing', $job)
        ]);
    }

    public function destroy(Job $job)
    {
        //
    }

    public function pricing(Job $job, JobHelper $jobHelper)
    {
        if (!auth()->check()) {
            return view('auth.login');
        }

        $packages = $jobHelper->getPackageData();

        /*if (!auth()->user()->jobs()->count() > 1) {
            $packages = $jobHelper->getFreePackageData();
        }*/

        return view('jobs.pricing', compact('packages', 'job'));
    }

    public function packageSelectPost(Job $job, Package $package)
    {
        $job->update([
            'package_id' => $package->id,
        ]);

        return redirect()->route('job.payment', $job);
    }

    public function packageSelectPostApi(Job $job, Package $package)
    {
        $job->update([
            'package_id' => $package->id,
        ]);

        return response()->json(['message' => 'success']);
    }

    public function payment(Job $job)
    {
        $product = [
            'name' => optional($job->package)->name,
            'model_type' => Job::class,
            'model_id' => $job->id,
            'type' => 'money',
            'price' => optional($job->package)->price ?? 0,
            'expire_date' => now()->addDays(optional($job->package)->expire_day ?? 7)->toDateTimeString(),
        ];

        if ($product['price'] <= 0) {
            $job->status = Job::STATUS['published'];
            $job->published_until_at = now()->addDays(optional($job->package)->expire_day ?? 7)->toDateTimeString();
            $job->save();

            return view('jobs.result')->with(['success' => 'İlanınız artık yayında!', 'job' => $job]);
        }

        $payment = (new omgIyzicoPayment(auth()->user(), $product))
            ->setCallback(route('omg-iyzico-form', $job->slug))
            ->createIyzicoPaymentForm();

        $form = $payment->getCheckoutFormContent();
        return view('jobs.payment', compact('form', 'job'));
    }

    public function receiveIyzicoPaymentForm(Job $job)
    {
        if ((new omgIyzicoPayment(auth()->user(), $this->product))->receiveIyzicoPaymentForm()) {
            $payment = OmgPayTransactions::query()->where('user_id', auth()->id())
                ->where('status', 'success')
                ->orderByDesc('updated_at')
                ->first();

            $productJson = json_decode($payment->product_json);
            $job = $productJson->model_type::findOrFail($productJson->model_id);
            $job->status = Job::STATUS['published'];
            $job->published_until_at = now()->addDays($job->package->expire_day)->toDateTimeString();
            $job->save();

            return view('jobs.result')->with(['success' => 'Ödemeniz başarıyla alınmıştır.', 'job' => $job]);
        }

        $payment = OmgPayTransactions::query()->where('user_id', auth()->id())
            ->where('status', '!=', 'success')
            ->orderByDesc('updated_at')
            ->first();

        return view('jobs.result')->with(['error' => $payment->status_detail]);
    }

    public function getContactInfo(Job $job)
    {
        try {
            $jobUser = JobUser::updateOrCreate([
                'user_id' => auth()->id(),
                'job_id' => $job->id,
            ], [
                'user_id' => auth()->id(),
                'job_id' => $job->id,
            ]);

        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }

        $user = $job->user;
        return response()->json(['phone' => $job->phone, 'email' => $user->email, 'name' => $user->name, 'avatar' => strlen($user->getFirstMediaUrl('images')) > 0 ? $user->getFirstMediaUrl('images') : 'https://www.mtsolar.us/wp-content/uploads/2020/04/avatar-placeholder.png']);
    }

    public function indexAjax(Request $request, JobFilterService $jobFilterService, JobHelper $jobHelper)
    {
        if (!$request->has('city_id')) {
            $request->request->add(['city_id' => $this->city->id]);
        }

        $jobs = $jobFilterService->filter($request);
        $jobs = $jobs->listable()->orderByDesc('created_at')->paginate(6);

        return JobResource::collection($jobs);
    }

    public function showAjax(Request $request, Job $job)
    {
        if (!auth()->check() || auth()->id() !== $job->user->id) {
            if (!Cache::has(\request()->ip() . $job->slug)) {
                $job->increment('view_counter');
            }
        }

        return new JobResource($job->fresh());
    }
}
