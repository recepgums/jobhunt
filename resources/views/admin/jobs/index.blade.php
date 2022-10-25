@extends('admin.layout.app')
@push('styles')
@endpush
@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-4">
            <div class="row y-gap-30 pt-30">
                <div class="col-xl-12 col-md-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="accordion -block-2 text-left js-accordion">
                            @forelse($jobs as $job)
                                <div class="accordion__item -dark-bg-dark-1 mt-10">
                                    <div class="accordion__button py-20 px-30 bg-light-4">
                                        <div class="d-flex items-center">
                                            <div class="icon icon-drag mr-10"></div>
                                            <span class="text-16 lh-14 fw-500 text-dark-1">{{$job->title}}</span>
                                        </div>

                                        <div class="d-flex x-gap-10 items-center">
                                            <a href="#" class="icon icon-edit mr-5"></a>
                                            <a href="#" class="icon icon-bin"></a>
                                            <div class="accordion__icon mr-0">
                                                <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                                                <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion__content">
                                        <div class="accordion__content__inner px-30 py-30">
                                            <div class="d-flex x-gap-10 y-gap-10 flex-wrap">
                                                @if($job->status === \App\Models\Job::STATUS['published'])
                                                    <form method="POST" action="{{route('admin.jobs.passive',$job->id)}}">
                                                        @csrf
                                                        @method('put')
                                                        <button class="button -sm py-15 -purple-3 text-purple-1 fw-500"
                                                        >Pasif Yap</button>
                                                    </form>
                                                @elseif($job->status === \App\Models\Job::STATUS['expired'])
                                                    <form method="POST" action="{{route('admin.jobs.active',$job->id)}}">
                                                        @csrf
                                                        @method('put')
                                                        <button class="button -sm py-15 -purple-3 text-purple-1 fw-500"
                                                        >Aktif Yap</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
