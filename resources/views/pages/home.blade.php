@extends('layout.app')
@section('title')
    {{env('APP_NAME')}}
@endsection
@push('styles')
    <script src="{{asset('js/app.js')}}" type="module" async></script>

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>--}}
    <style>
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
        @media only screen and (max-width: 768px) {
            .padding-t {
                padding-top: 25px;
            }
            .homepage-slider{
                padding-top: 0
            }

            .px-6 {
                padding-right: 1rem;
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
            url("{{ asset('assets/images/'.env('APP_SUB').'/bg.webp') }}") 0 0 no-repeat fixed;
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
                            <div class="col-md-6 align-self-center padding-t1 ">
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
                            <div class="col-md-4 mx-auto">
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
        <div class="gray homepage-slider">
            <div id="app">
                <job-list :isLoggedIn="'{{auth()->check()}}'"></job-list>
            </div>
            <div class="container">
                <div class="mx-auto text-center">
                    <div class="browse-all-cat ">
                        <a href="{{route('job.index')}}" title="" style="background-color: #fb236a;color: white" class="style2">Daha fazla iş ilanı
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
                        <h1 style="font-size: 28px;font-weight:600" class="text-primary">Eleman Arayanlar</h1>
                        <h3 class="tw-mt-4 text-dark w-80 ml-3" style="font-size: 16px;font-weight:bold;">
                            Türkiye'nin her yerinden eleman arayan fırıncılara {{env('APP_NAME')}} ile ulaşın.
                            Sokak sokak iş aramakla zaman kaybetmeyin.
                            Hemen şimdi kayıt olun ve iş ilanları sahipleriyle iletişime geçin!
                        </h3>
                    </div>
                    @guest
                        <a id="button" href="{{route('job.create')}}"
                           class="tw-bg-blue-600 tw-mt-12 p-3 tw-rounded-lg fs-22 btn font-weight-bold "
                           style="margin-top: 65px">
                            İş İlanı vermek için kayıt olun
                        </a>
                    @endguest
                    @auth
                        <a id="button" href="{{route('job.create')}}"
                           class="tw-bg-blue-600 tw-mt-12 p-3 tw-rounded-lg fs-22 btn font-weight-bold "
                           style="margin-top: 65px">
                            İş İlanı verin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mx-auto column">
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
                                <div class="col-lg-8 mx-auto text-center">
                                    <h3>Sorunla mı karşılaşıyorsunuz?</h3>
                                    <p>Sorununuz hakkında profesyonel çalışanlarımızın sizinle iletişime geçmesini
                                        sağlayın.</p>

                                    <a href="mailto:{{env('CONTACT_EMAIL_ADDRESS')}}" >{{env('CONTACT_EMAIL_ADDRESS')}}</a>
                                    adresi üzerinden bizimle iletişime geçin!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
