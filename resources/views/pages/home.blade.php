@extends('layout.app')
@push('styles')
    <!-- Link Swiper's CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
        .swiper {
            width: 100%;
            height: 100%;
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


    <section>
        <div class="block no-padding overlape">

            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec style3" style="">
                            <ul class="main-slider-sec style3 text-arrows">
                                <li><img src="https://creativelayers.net/themes/jobhunt-html/images/resource/sn1.jpg" alt="" /></li>
                                <li><img src="https://www.gidahatti.com/wp-content/uploads/2015/09/unilever-india.jpg" alt="" /></li>
                            </ul>
                            <div class="job-search-sec style3">
                                <div class="job-search style2">
                                    <h3>Mükemmel İş</h3>
                                    <h3>Mükemmel Yetenek</h3>
                                    <span>Aradığınız güvenilir işi ve işçiyi bulmanın en kolay yolu.</span>
                                    <div class="search-job2 style2 d-none d-md-block">
                                        <form method="get" action="{{route('job.index')}}">
                                            <div class="row no-gape">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="job-field">
                                                        <label>Anahtar kelime</label>
                                                        <input type="text" placeholder="Ara... (Kara firin, Hamurker)" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="job-field">
                                                        <label>Şehir</label>

                                                        <select data-placeholder="Şehir" name="city_id"
                                                                onchange="cityChangedMethod(this)" class="chosen-city">
                                                            @forelse($cities as $city)
                                                                <option @if($city->id == $selectedCity?->id) selected
                                                                        @endif value="{{$city->id}}">{{$city->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="job-field">
                                                        <label>Şehir</label>
                                                        <select data-placeholder="İlçe" name="district_id[]"
                                                                class="chosen-city" id="districtSelect">
                                                            <option value selected></option>
                                                            @forelse($districts as $district)
                                                                <option
                                                                    value="{{$district?->id}}">{{$district?->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                    <button type="submit"><i class="la la-search"></i> İŞ BUL </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- Job Search 2 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block gray" style="padding-top: 6rem">

            <div class="container">
                <div class="row">
                <div class="col">
                    <div class="col-lg-9 column">
                        <div class="heading left">
                            <h2>
                                {{ucfirst(strtolower($selectedCity->name))}}'d{{is_last_letter_bold($selectedCity->name) ? 'a' : 'e'}}ki iş ilanları</h2>
                            <div class="tab-sec">
                                <br>
                                <div style="width: 100%; height: 1px;background-color: gray;width: 133%"></div>
                                <div id="job_nav" class="tab-content current my-1 bg-white">
                                    <div class="job-listings-sec style2" style="padding-top: 15px">
                                        @forelse($locationRecentJobs as $job)
                                            <div style="width: 133%" class="job-listing text-left">
                                                <div class="row">
                                                    <div class="col-md-9 job-title-sec">
                                                        <div class="c-logo">
                                                            <img src="{{$job->cover_image ?? 'https://place-hold.it/235x115'}}"
                                                                 alt="{{$job->title}}"/>
                                                        </div>
                                                        <h3 class="px-2">
                                                            <a href="{{route('job.show',$job->slug)}}" >
                                                                {{$job->title}}
                                                            </a>
                                                        </h3>
                                                        <div class="col text-left">
                                                           <div class="row">
                                                               <div class="col-sm">
                                                                   <p class="job-lctn pl-2">
                                                                       @if(optional($job->district)->name)
                                                                           {{$job->district->name}}
                                                                       @endif
                                                                       {{$job->city->name}}
                                                                   </p>
                                                               </div>
                                                               <div class="col-sm">
                                                                   <span class="job-is ft">
                                                                       {{optional($job->workType)->name}}
                                                                   </span>
                                                               </div>
                                                           </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="{{route('job.show',$job->slug)}}" class="aply-btn" style="font-size: 18px;padding: 20px;border-radius:5px;font-weight: 700 ">Şimdi Başvur</a>

                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <div id="rjobsa" class="tab-content  my-5">

                            </div>
                            </div>
                        </div>
                        </div><!-- Heading -->

                    </div>

                    <div class="col-lg-3 column d-none d-md-block">
                        <div class="heading left text-center">
                            <h2>Yıldızlı ilanlar</h2>
                        </div><!-- Heading -->
                        <div class="job-grid-sec">
                            <div class="row">
                                @forelse($highlightedLocationJobs as $job)
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid style2">
                                        <div class="job-title-sec">
                                            <div class="c-logo" style="padding: 0">
                                                <img src="{{$job->cover_image ?? 'https://place-hold.it/235x115'}}"
                                                     alt="{{$job->title}}"/>
                                            </div>
                                            <h3>
                                                <a href="{{route('job.show',$job->slug)}}" >
                                                    {{\Illuminate\Support\Str::limit($job->title,40)}}
                                                </a>
                                            </h3>
                                            <span>Massimo Artemisis</span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <p>Offer strategic and technical health and nutrition advice to headquarters and field staff, as well as training</p>
                                        <div class="grid-info-box">
                                            <span class="job-is">Full Time</span>
                                            <a  href="#" title="">APPLY NOW</a>
                                        </div>
                                    </div><!-- JOB Grid -->
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="browse-all-cat" style="margin-top: 0">
                            <a href="{{route('job.index')}}" title="" class="style2">Daha fazla iş ilanı
                                görüntüleyin</a>
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
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Nasıl Çalışıyor</h2>
                            <span>Her ay, 850 kişiden fazla {{env('APP_TARGET_JOB_NAME')}}, {{env('APP_NAME')}} sayesinde iş buluyor. İşi için gerekli olan tüm bağlantılar için bizi tercih ediyor. <br/>
                                {{env('APP_NAME')}} ile iş bulun ya da işinizi büyütün.
							</span>
                        </div><!-- Heading -->

                        <div class="tab-sec">
                            <ul class="nav nav-tabs my-5">
                                <li><a class="current" data-tab="fjobs">İşçiyim</a></li>
                                <li><a data-tab="rjobs">İşverenim</a></li>
                            </ul>
                            <div id="fjobs" class="tab-content current my-5">
                                <div class="how-to-sec d-none d-md-block">
                                    <div class="how-to">
                                        <a href="{{route('register-user')}}">
                                            <span class="how-icon"><i class="la la-user"></i></span>
                                            <h3>Hesap Oluşturun</h3>
                                            <p>
                                                İş ilanı verenler ile iletişime geçmek için hesap açın. Bilgilerinizi
                                                doğru girdiğinizden emin olun.
                                            </p>
                                        </a>
                                    </div>
                                    <div class="how-to">
                                        <a href="{{route('job.index')}}">
                                            <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                            <h3>İş ilanlarını arayın</h3>
                                            <p>İş ilanları sayfasından size uygun iş ilanlarını inceleyin</p>
                                        </a>
                                    </div>
                                    <div class="how-to">
                                        <a href="{{route('job.index')}}">
                                            <span class="how-icon"><i class="la la-list"></i></span>
                                            <h3>İş ilanlarına başvurun</h3>
                                            <p>İlan detaylarından, iş sahibinin numarasını arayın.</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="reviews-sec d-block d-md-none" id="reviews-carousel">
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('register-user')}}">
                                                <span class="how-icon"><i class="la la-user"></i></span>
                                                <h3>Hesap Oluşturun</h3>
                                                <p>
                                                    İş ilanı verenler ile iletişime geçmek için hesap açın. Bilgilerinizi
                                                    doğru girdiğinizden emin olun.
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('job.index')}}">
                                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                                <h3>İş ilanlarını arayın</h3>
                                                <p>İş ilanları sayfasından size uygun iş ilanlarını inceleyin</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('job.index')}}">
                                                <span class="how-icon"><i class="la la-list"></i></span>
                                                <h3>İş ilanlarına başvurun</h3>
                                                <p>İlan detaylarından, iş sahibinin numarasını arayın.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="browse-all-cat">
                                    <a href="{{route('job.index')}}" title="" class="style2">İş ilanlarını inceleyin</a>
                                </div>
                            </div>
                            <div id="rjobs" class="tab-content mt-5">
                                <div class="how-to-sec d-none d-md-block">
                                    <div class="how-to">
                                        <a href="{{route('register-user')}}">
                                            <span class="how-icon"><i class="la la-user"></i></span>
                                            <h3>Hesap Oluşturun</h3>
                                            <p>
                                                İş ilanı vermek için hesap açın. Bilgilerinizi eksiksiz ve
                                                doğru girdiğinizden emin olun.
                                            </p>
                                        </a>
                                    </div>
                                    <div class="how-to">
                                        <a href="{{route('job.index')}}">
                                            <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                            <h3>İş İlanlanınızı Yayınlayın</h3>
                                            <p>Doğru kişiye ulaşmak için çalışma şartlarınızı ve çalışandan beklediğiniz tüm özellikleri belirtin.</p>
                                        </a>
                                    </div>
                                    <div class="how-to">
                                        <a href="{{route('job.index')}}">
                                            <span class="how-icon"><i class="la la-list"></i></span>
                                            <h3>Telefonunuz Susmasın</h3>
                                            <p>Dakikalar içerinde iş başvuruları almaya başlayın</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="reviews-sec d-block d-md-none" id="reviews-carousel-2">
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('register-user')}}">
                                                <span class="how-icon"><i class="la la-user"></i></span>
                                                <h3>Hesap Oluşturun</h3>
                                                <p>
                                                    İş ilanı vermek için hesap açın. Bilgilerinizi eksiksiz ve
                                                    doğru girdiğinizden emin olun.
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('job.index')}}">
                                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                                <h3>İş İlanlanınızı Yayınlayın</h3>
                                                <p>Doğru kişiye ulaşmak için çalışma şartlarınızı ve çalışandan beklediğiniz tüm özellikleri belirtin.</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 how-to-sec">
                                        <div class="how-to">
                                            <a href="{{route('job.index')}}">
                                                <span class="how-icon"><i class="la la-list"></i></span>
                                                <h3>Telefonunuz Susmasın</h3>
                                                <p>Dakikalar içerinde iş başvuruları almaya başlayın</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="browse-all-cat">
                                    <a href="{{route('job.create')}}" title="" class="style2">İş ilanlanı yayınlayın</a>
                                </div>
                            </div>
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
                                                        <h3 >
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
            autoplay:{
              delay:3000
            },
            loop:true,
            breakpoints: {
                545: {
                    slidesPerView: 2,
                    autoplay:{
                        delay:3000
                    },
                },
                768: {
                    slidesPerView: 2,
                    autoplay:{
                        delay:3000
                    },
                },
                992: {
                    slidesPerView: 3,
                    autoplay:{
                        delay:3000
                    },
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    autoplay:{
                        delay:3000
                    },
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    autoplay:{
                        delay:3000
                    },
                }
            },
        });


        function cityChangedMethod(element) {
            let url = '{{ route("city.districts", ":city") }}';
            url = url.replace(':city', element.value);

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    let html = '<select name="district_id" data-placeholder="All Regions" class="chosen-city">';

                    $.each(response, function (key, value) {
                        html += `<option value="${value.id}">${value.name}</option>`
                    });

                    html += '</select>';

                    $("#districtSelect").html(html)

                    $('.chosen-city').trigger("chosen:updated");
                }
            });
        }

    </script>
@endpush
