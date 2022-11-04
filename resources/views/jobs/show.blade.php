@extends('layout.app')
@section('title')
    {{$job->title}}
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/bo-slider.min.css')}}" />
    @if(!$job->getMedia('images')->count() > 1)
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    @endif
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

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
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')

    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax">
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column bg-white p-3">
                        <div class="job-single-sec">
                                <div @if($job->getMedia('images')->count() > 0) class="swiper mySwiper" @endif>
                                    <div @if($job->getMedia('images')->count() > 0) class="swiper-wrapper" @endif>
                                        @forelse($job->getMedia('images') as $media)
                                            @if(str_contains($media->mime_type,"image"))
                                                <div class="swiper-slide">
                                                    <img src="{{$media->getUrl()}}"
                                                         style="max-height: 500px"
                                                         alt="">
                                                </div>
                                            @else
                                                <div class="swiper-slide">
                                                    <video width="320" height="240" controls>
                                                        <source src="{{$media->getUrl()}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            @endif
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>

                            <div class="job-single-head2">
                                <div class="job-title2 pt-3">
                                    <h2 style="font-size: 18px;font-weight: 600;">{{$job->title}}</h2>
                                </div>
                                <ul class="tags-jobs">
                                    <li>
                                        <i class="la la-map-marker"></i> @if(optional($job->district)->name) {{$job->district->name}}
                                        , {{$job->city->name}} @endif</li>
                                    @if($job->fee)
                                        <li>
                                            <i class="la la-money"></i> Aylık Maaş : <span>{{$job->fee}} ₺</span>
                                        </li>
                                    @endif
                                    <li>
                                        <i class="la la-calendar-o"></i>
                                        Yayınlanma Tarihi:
                                        {{$job->created_at->diffForHumans()}}
                                    </li>
                                    <li>
                                        <i class="la la-calendar-o"></i>
                                       Çalışma Türü
                                        <span>{{$job->workType->name}}</span>
                                    </li>
                                </ul>
                                @if(optional($job->category)->name)
                                    <span>
                                    <strong>Aranıyor</strong>
                                    : {{optional($job->category)->name}}
                                </span>
                                @endif
                            </div>
                                <h3>Kazanç</h3>
                            <div class="job-details" style="border-bottom: 1px solid #e8ecec;padding-bottom: 10px">
                                {!! $job->description !!}
                            </div>
                            <div class="job-overview">
                                <ul>
                                    @if($job->fee)
                                        <li><i class="la la-money"></i>
                                            <h3>Teklif Edilen Maaş</h3><span>{{$job->fee}}₺</span></li>
                                    @endif
                                    @if(optional($job->gender)->name)
                                        <li><i class="la la-mars-double"></i>
                                            <h3>Cinsiyet</h3><span>{{$job->gender->name}}</span></li>
                                    @endif
                                    @if(optional($job->category)->name)
                                        <li><i class="la la-puzzle-piece"></i>
                                            <h3>Rol</h3><span>{{optional($job->category)->name}}</span></li>
                                    @endif

                                    @if(optional($job->workType)->name)
                                        <li><i class="la la-clock-o"></i>
                                            <h3>Çalışma Türü</h3><span>{{$job->workType->name}}</span></li>
                                    @endif
                                    <li><i class="la la-location-arrow"></i>
                                        <h3>Konum</h3>
                                        <span>@if(optional($job->district)->name) {{$job->district->name}}
                                            , @endif {{$job->city->name}}</span>
                                    </li>
                                    <li>
                                        <i class="la la-hand-paper-o"></i>
                                        <h3>Sözleşme</h3>
                                        <span>
                                            @if($job->has_contract) Var @else Yok @endif
                                        </span>
                                    </li>
                                    <li>
                                        <i class="la la-eye"></i>
                                        <h3>İletişime Geçen Kişi Sayısı</h3>
                                        <span>
                                            {{$job->view_counter}}
                                        </span>
                                    </li>
                                    @isset($job->user?->company_name)
                                        <li>
                                            <i class="la la-building"></i>
                                            <h3>Şirket adı</h3>
                                            <span>
                                                 {{$job->user?->company_name}}
                                            </span>
                                        </li>
                                    @endisset

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column">
                        <div class="job-single-head style2">
                            <div class="job-thumb">
                                <img style="width: 30%"
                                    src="{{optional($job->user)->profile_image_url ?? 'https://placehold.jp/1600x800'}}"/>
                            </div>
                            <div class="job-head-info" id="job-head-info">
                                <h4>{{optional($job->user)->name}}</h4>
                            </div>
                            @auth
                                <span style="cursor: pointer;padding: 20px 5px" id="show_contact_info_button_auth"
                                      onclick="showContact(event,`{{$job->slug}}`)"
                                      title="" class="apply-job-btn">
                                    <i class="la la-paper-plane"></i>
                                    İletişim Bilgilerini Görüntüle
                                </span>
                                <br>
                                @if(@auth()->id() == $job->user_id && $job->status == \App\Models\Job::STATUS["published"])
                                    <form method="POST"
                                          action="{{route('candidate.job.passive',$job)}}">
                                        @csrf
                                        @method('put')
                                        <button class="apply-job-btn mt-5 d-none d-lg-block"
                                                style="margin-right: 80px; width: 230px;">Yayından Kaldır
                                        </button>
                                    </form>
                                    <a href="{{route('job.edit',$job)}}">
                                        <button class="apply-job-btn mt-5 d-none d-lg-block"
                                                style="width: 230px;">Düzenle
                                        </button>
                                    </a>
                                    <a href="{{route('job.edit',$job)}}">
                                        <button class="apply-job-btn mt-5 d-lg-none"
                                                style="width: 230px;">Düzenle
                                        </button>
                                    </a>
                                    <form method="POST"
                                          action="{{route('candidate.job.passive',$job)}}">
                                        @csrf
                                        @method('put')
                                        <button class="apply-job-btn mt-5 d-lg-none"
                                                style="margin-right: 60px; width: 230px;">Yayından Kaldır
                                        </button>
                                    </form>
                                    <br>
                                @endif
                            @endauth

                            @guest
                                <a href="#" title="" class="apply-job-btn signup-popup"
                                   style="cursor: pointer;padding: 20px 0px"><i
                                        class="la la-paper-plane"></i>
                                    İletişim Bilgilerini Görüntüle
                                </a>
                            @endguest
                            <a href="{{route('user.show',$job->user->username)}}" title="" class="viewall-jobs">
                                <i class="la la-user"></i>
                                İş sahibinin profilini görüntüle
                            </a>
                        </div><!-- Job Head -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bo-slider.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        $(function(){
            $('.bo-slider').boSlider();
        });

        function showContact(e, slug) {
            e.preventDefault();
            $('#show_contact_info_button_auth').text('Yükleniyor . . . ')

            let url = "{{route('job.get_contact_info',":slug")}}";
            url = url.replace(':slug', slug);

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    let html = `<h4>${response?.name}</h4><p><i class="la la-phone"></i>`
                    html += response?.phone ? `<a href="tel:${response?.phone}">${response?.phone}</p><p><i class="la la-envelope-o"></i>` : 'Kullanicinin telefon numarasi bulunmuyor </p><p><i class="la la-envelope-o"></i>'
                    html += response?.email ? `${response?.email}</p>` : 'Kullanicinin mail adresi bulunmuyor</p>';

                    $('#job-head-info').fadeOut(300, function () {
                        $(this).html(html).fadeIn(300);
                    });

                    $('#show_contact_info_button_auth').css('display', 'none')
                },
                error: function (response) {
                    alert('Sunucu kaynakli bir hata olustu. Lutfen bizimle iletisime gecip durumu bildirin');
                },
            });
        }

        @if($job->getMedia('images')->count() > 0 && false)
        var swiper = new Swiper(".mySwiper", {
            /*     autoplay:{
                     delay:3000,
                     disableOnInteraction: false
                 },*/
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
                clickable:true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            spaceBetween: 30,
            loop: true,
        });
       @endif
    </script>
@endpush
