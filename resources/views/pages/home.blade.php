@extends('layout.app')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
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

        .padding-t {
            padding-top: 50px;
        }

        .padding-t1 {
            padding-top: 36px;
        }

        .h7 {
            font-size: 1.4rem;
        }

        .px-6 {
            padding-right: 8rem;
        }

        .visibility {
            visibility: hidden;
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

        @media only screen and (max-width: 768px) {
            .padding-t {
                padding-top: 25px;
            }

            .px-6 {
                padding-right: 1rem;
            }

            .mobile_mt {
                position: relative;
                top: -4rem;
            }

            .mobile_mt2 {
                position: relative;
                top: -1rem;
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

        #button {
            border-radius: 20px;
            padding: 15px 50px;
            font-size: 16px;
            line-height: 16px;
        }
    </style>
@endpush
@section('content')
    <section class="">
        <div class="block no-padding">
            <div class="container fluid">
                <div class="tw-h-[40rem] bg-overlay"></div>
                <div>
                    <div class="container job-search-sec">
                        <div class="row job-search">
                            <div class="col-md-6 align-self-center padding-t1 mobile_mt ">
                                <div class="">
                                    <h3 class="text-white h1">Mükemmel İş</h3>
                                    <h3 class="text-white h2">Mükemmel Yetenek</h3>
                                    <span class="tw-font-light l text-white h4">Aradığınız
                                    güvenilir işi ve işçiyi
                                    bulmanın en kolay yolu.</span>

                                </div>
                                <div class="d-flex justify-content-between padding-t">
                                    <h3 class="text-white h7">82.324 <span class="lead">Is Iiani</span></h3>
                                    <h3 class="text-white px-6 h7">8.54323 <span class="lead">Is Arayan</span></h3>
                                </div>
                            </div>
                            <div class="col-md"></div>
                            <div class="col-md-4 mobile_mt2 mx-auto">
                                <form method="get" action="{{route('job.index')}}" class="">
                                    <div class="job-field pb-2 m-0">
                                        <select data-placeholder="Şehir" name="city_id" class="chosen-city ">
                                            @forelse($cities as $city)
                                                <option @if($city->id == $selectedCity?->id) selected
                                                        @endif value="{{$city->id}}">{{$city->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <i class="la la-map-marker"></i>
                                    </div>
                                    <div class="">
                                        <div class="job-field pb-2 m-0">
                                            <select data-placeholder="Şehir" name="category_id[]" class="chosen-city">
                                                @forelse($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            <i class=" la la-keyboard-o"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit">
                                            <div class="tw-flex tw-justify-center">
                                                <i class="la la-search tw-mr-[0.5rem] tw-text-white"></i>
                                                <p class=" tw-font-semibold tw-text-white">
                                                    İlanları Görüntüle</p>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        currentLocation="{{ucfirst(strtolower($selectedCity->name))}}'d{{is_last_letter_bold($selectedCity->name) ? 'a' : 'e'}}ki iş ilanları">
                    </classifiedsec>
                </div>
            </div>
            <script src="{{asset('js/app.js')}}"></script>
            <div class="container">
                <div class="tw-flex tw-justify-center tw-mt-8 tw-mb-8">
                    <div class="browse-all-cat ">
                        <a href="{{route('job.index')}}" title="" class="style2">Daha fazla iş ilanı
                            görüntüleyin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="tw-bg-white tw-grid lg:tw-grid-cols-2 tw-text-white">
            <div class="tw-grid tw-grid-rows-2 tw-justify-items-center pb-3" style="background-color: #ebf3ff;">
                <img class="tw-pt-6 tw-row-span-1" width="250" height="250"
                     src="{{asset('assets/images/bakerworker.png')}}">
                <div class="tw-space-y-1 tw-text-center  tw-row-span-1 tw-pt-8">
                    <div class="px-3">
                        <h1 style="font-size: 28px;font-weight:600" class="tw-text-red-600">İş Arayanlar</h1>

                        <h3 class="tw-mt-4 text-dark w-75 ml-5"
                            style="font-size: 16px;font-weight:bold; width: 95%;">
                            Türkiye'nin her yerinden eleman arayan fırıncılara {{env('APP_NAME')}} ile ulaşın.
                            Sokak sokak iş aramakla zaman kaybetmeyin.
                            Hemen şimdi kayıt olun ve iş ilanları sahipleriyle iletişime geçin!
                        </h3>
                    </div>
                    <a id="button"  href="{{route('job.index')}}"
                       class="tw-bg-red-600 tw-mt-12 p-3 tw-rounded-lg fs-22 btn btn-danger font-weight-bold " style="margin-top: 65px">
                        İş İlanlarını İnceleyin
                    </a>
                </div>
            </div>

            <div class="tw-grid tw-grid-rows-2 tw-justify-items-center pb-3" style="background-color: #ece6ff;">
                <img class="tw-pt-6 tw-row-span-1" width="250" height="250" src="{{asset('assets/images/baker.png')}}">
                <div class="tw-space-y-1 tw-text-center  tw-row-span-1 tw-pt-8">
                    <div class="px-5">
                        <h1 style="font-size: 28px;font-weight:600" class="text-primary">İş Arayanlar</h1>
                        <h3 class="tw-mt-4 text-dark w-80 ml-3" style="font-size: 16px;font-weight:bold;">
                            Türkiye'nin her yerinden eleman arayan fırıncılara {{env('APP_NAME')}} ile ulaşın.
                            Sokak sokak iş aramakla zaman kaybetmeyin.
                            Hemen şimdi kayıt olun ve iş ilanları sahipleriyle iletişime geçin!
                        </h3>
                    </div>
                    <a id="button" href="{{route('job.index')}}"
                       class="tw-bg-blue-600 tw-mt-12 p-3 tw-rounded-lg fs-22 btn btn-danger font-weight-bold mt-5 ">
                        İş İlanlarını İnceleyin
                    </a>
                </div>
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
                                                            <img
                                                                src="{{$blog->cover_image ?? 'https://place-hold.it/360x200'}}"
                                                                alt="{{$blog->title}}"/></a>
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
                                        <img src="{{$review->cover_image}}" alt="{{$review->review}}"/>
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
                                        <input type="text" placeholder="Geçerli bir email adresinizi yazın"/>
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
