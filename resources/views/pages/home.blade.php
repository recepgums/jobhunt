@extends('layout.app')
@push('styles')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
.swiper {
    width: 100%;
    height: 100%;
}

p.job-type-custom {
    color: #26AE61;
    font-size: 13px;
    padding: 0px 8px;
    top: 90px;
    position: absolute;
    left: 215px;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    margin-right: 20px;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.swiper-slide {
    width: 80%;
}
}

@media only screen and (max-width: 600px) {
    .custom-job-title {
        margin: 0;
        padding: 0;
        float: left;
        max-height: 45px;
        overflow: hidden;
        font-weight: normal;
        font-size: 14px;
        line-height: 18px;
        color: #333;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
}

.bg-overlay {

    background: linear-gradient(to bottom, rgba(184, 24, 40, 0.88), rgba(23, 23, 22, 0.5)),
    url("{{ asset('assets/images/bg.jpeg') }}") 0 0 no-repeat fixed;
    background-size: cover;
}
</style>
@endpush
@section('content')

<section class="">
    <div class="block no-padding">
        <div class="container fluid">
            <div class="tw-h-[40rem] bg-overlay"></div>
            <div class="job-search-sec tw-ml-[22vw] lg:tw-ml-[6vw]">
                <div class="job-search text-center">
                    <div
                        class="lg:tw-ml-[-14rem] tw-ml-[-40vw] tw-text-white tw-font-bold lg:tw-text-[40px] tw-text-[20px]">
                        <h3>Mükemmel İş</h3>
                        <h3>Mükemmel Yetenek</h3>
                        <span class="tw-font-light lg:tw-text-[25px] tw-text-[15px] ">Aradığınız
                            güvenilir işi ve işçiyi
                            bulmanın en kolay yolu.</span>
                    </div>

                    <form method="get" action="{{route('job.index')}}" class="tw-ml-[-5rem]">
                        <div
                            class="tw-grid tw-grid-rows-1  lg:tw-grid-cols-3  lg:tw-gap-y-6  lg:tw-gap-x-[10rem] lg:tw-ml-[-5rem] md:tw-ml-[14vw]">
                            <div class="lg:tw-w-[25rem] tw-w-[20rem]">
                                <div class="job-field">
                                    <select data-placeholder="Şehir" name="city_id"
                                        class="chosen-city tw-rounded-[16px]">
                                        @forelse($cities as $city)
                                        <option @if($city->id == $selectedCity?->id) selected
                                            @endif value="{{$city->id}}">{{$city->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <i class="la la-map-marker"></i>
                                </div>
                            </div>
                            <div class="lg:tw-w-[25rem] tw-w-[20rem]">
                                <div class="job-field  ">
                                    <select data-placeholder="Şehir" name="category_id[]"
                                        class="chosen-city tw-rounded-[16px]">
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <i class=" la la-keyboard-o"></i>
                                </div>
                            </div>

                            <div class=" tw-w-[20rem] lg:tw-w-[15rem]">
                                <button type="submit">
                                    <div class="tw-flex tw-justify-center">
                                        <i class="la la-search tw-mr-[0.5rem] tw-text-white"></i>
                                        <p class="tw-text-[15px] lg:tw-text-[12px] tw-font-semibold tw-text-white">
                                            İlanları Görüntüle</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block gray" style="padding-top: 6rem">
        <div id="app">
            <div class="container">
                <classifiedsec
                    currentLocation="{{ucfirst(strtolower($selectedCity->name))}}'d{{is_last_letter_bold($selectedCity->name) ? 'a' : 'e'}}ki iş ilanları" />
            </div>


        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <div class="container">

            <!-- Heading -->

            <div class="tw-flex tw-justify-center tw-mt-8 tw-mb-8">
                <div class="browse-all-cat ">
                    <a href="{{route('job.index')}}" title="" class="style2">Daha fazla iş ilanı
                        görüntüleyin</a>
                </div>
            </div>
        </div>

</section>

<section>
    <div class="tw-bg-white tw-mx-8 tw-grid lg:tw-grid-cols-2  tw-grid-rows-2 tw-text-white tw-gap-4 ">
        <div class="tw-grid tw-grid-rows-4 tw-justify-items-center tw-bg-red-500 tw-rounded-lg">
            <img class="tw-w-36 tw-pt-6" src="{{asset('assets/images/bakerworker.png')}}">



            <div class="tw-space-y-4 tw-text-center tw-w-56 tw-row-span-2 tw-pt-8">
                <div>
                    <h1 class="tw-font-bold">Hesap Oluşturun</h1>
                    <h1 class="tw-mt-4 ">
                        İş ilanı verenler ile iletişime geçmek için hesap açın. Bilgilerinizi doğru girdiğinizden emin
                        olun.
                    </h1>
                </div>

                <div>
                    <h1 class="tw-font-bold">İş ilanlarını arayın</h1>
                    <h1 class="tw-mt-4 ">
                        İş ilanları sayfasından size uygun iş ilanlarını inceleyin
                    </h1>
                </div>

                <div>
                    <h1 class="tw-font-bold">İş ilanlarına başvurun</h1>
                    <h1 class="tw-mt-4 ">
                        İlan detaylarından, iş sahibinin numarasını arayın.
                    </h1>
                </div>


            </div>

            <button class="tw-bg-red-600 tw-mt-12 tw-h-20 lg:tw-h-10 tw-w-56 tw-rounded-lg">İş İlanlarını
                İnceleyin</button>

        </div>

        <div class="tw-grid tw-grid-rows-4 tw-justify-items-center tw-bg-blue-500 tw-rounded-lg">
            <img class="tw-w-36 tw-pt-6" src="{{asset('assets/images/baker.png')}}">
            <div class="tw-space-y-4 tw-text-center tw-w-56 tw-row-span-2 tw-pt-8">
                <div>
                    <h1 class="tw-font-bold">Hesap Oluşturun</h1>
                    <h1 class="tw-mt-4 ">
                        İş ilanı vermek için hesap açın. Bilgilerinizi eksiksiz ve
                        doğru girdiğinizden emin olun.
                    </h1>
                </div>

                <div>
                    <h1 class="tw-font-bold">İş İlanlanınızı Yayınlayın</h1>
                    <h1 class="tw-mt-4 ">
                        Doğru kişiye ulaşmak için çalışma şartlarınızı ve çalışandan beklediğiniz
                        tüm özellikleri belirtin.
                    </h1>
                </div>

                <div>
                    <h1 class="tw-font-bold">Telefonunuz Susmasın</h1>
                    <h1 class="tw-mt-4 ">
                        Dakikalar içerinde iş başvuruları almaya başlayın
                    </h1>
                </div>

            </div>

            <button class="tw-bg-blue-600  tw-mt-12 tw-h-20 lg:tw-h-10 tw-w-56 tw-rounded-lg">İş İlanı
                Yayınlayın</button>
        </div>
    </div>
</section>

<section>
    <div class="block gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>İş hayatınız için hızlı ipuçları</h2>
                        <span>Daha önce pek çok kişiyi işe almış deneyimli iş sahipleri tarafından yazılmıştır</span>
                    </div><!-- Heading -->
                    <div class="blog-sec">
                        <div class="row">


                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @forelse($blogs as $blog)
                                    <div class="swiper-slide col-lg-4">
                                        <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                    <img src="{{$blog->cover_image ?? 'https://place-hold.it/360x200'}}"
                                                        alt="{{$blog->title}}" /></a>
                                                <div class="blog-date">
                                                    <a>{{$blog->created_at->format('Y')}}
                                                        <i>{{$blog->created_at->format('M d')}}</i></a>
                                                </div>
                                            </div>
                                            <div class="blog-details">
                                                <h3>
                                                    <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                        {{$blog->title}}
                                                    </a>
                                                </h3>
                                                <p>{{\Illuminate\Support\Str::limit($blog->summary,40)}}</p>
                                                <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                    Devamını Oku
                                                    <i class="la la-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                                {{--                                    <div class="swiper-pagination" style="top: 2px;"></div>--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 column">
                    <div class="heading left">
                        <h2>Sıkça Sorulan Sorular</h2>
                    </div><!-- Heading -->
                    <div id="toggle-widget" class="experties">
                        @forelse($faqs as $faq)
                        <h2>{{$faq->question}}</h2>
                        <div class="content">
                            <p>{{$faq->answer}}</p>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-4 column">
                    <div class="reviews-sec" id="reviews">
                        @forelse($reviews as $review)
                        <div class="col-lg-6">
                            <div class="reviews style2">
                                <img src="{{$review->cover_image}}" alt="{{$review->review}}" />
                                <h3>{{$review->name}}<span>{{$review->role}}</span></h3>
                                <p>{{$review->review}}</p>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscription-sec">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Sorunla mı karşılaşıyorsunuz?</h3>
                                <p>Sorununuz hakkında profesyonel çalışanlarımızın sizinle iletişime geçmesini
                                    sağlayın.</p>
                            </div>
                            <div class="col-lg-6">
                                <form>
                                    <input type="text" placeholder="Geçerli bir email adresinizi yazın" />
                                    <button type="submit"><i class="la la-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    lazy: true,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    autoplay: {
        delay: 3000
    },
    loop: true,
    breakpoints: {
        545: {
            slidesPerView: 2,
            autoplay: {
                delay: 3000
            },
        },
        768: {
            slidesPerView: 2,
            autoplay: {
                delay: 3000
            },
        },
        992: {
            slidesPerView: 3,
            autoplay: {
                delay: 3000
            },
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 20,
            autoplay: {
                delay: 3000
            },
        },
        1400: {
            slidesPerView: 4,
            spaceBetween: 30,
            autoplay: {
                delay: 3000
            },
        }
    },
});
</script>
@endpush