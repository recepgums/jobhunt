@extends('layout.app')

@section('content')


    <section>
        <div class="block no-padding overlape">

            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec style3">
                            <ul class="main-slider-sec style3 text-arrows">
                                <li><img src="https://creativelayers.net/themes/jobhunt-html/images/resource/sn1.jpg" alt="" /></li>
                                <li><img src="https://www.gidahatti.com/wp-content/uploads/2015/09/unilever-india.jpg" alt="" /></li>
                            </ul>
                            <div class="job-search-sec style3">
                                <div class="job-search style2">
                                    <h3>Mükemmel İş</h3>
                                    <h3>Mükemmel Yetenek</h3>
                                    <span>Aradığınız güvenilir işi ve işçiyi bulmanın en kolay yolu.</span>
                                    <div class="search-job2 style2">
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
                                                        <select data-placeholder="İlçe" name="district_id"
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
                    <div class="col-lg-9 column">
                        <div class="heading left">
                            <h2>Şehrinizdeki iş ilanları</h2>
                        </div><!-- Heading -->
                        <div class="job-listings-sec style2">
                            @forelse($locationRecentJobs as $job)
                            <div class="job-listing">
                                <div class="job-title-sec">
                                    <div class="c-logo">
                                        <img src="{{$job->cover_image ?? 'https://place-hold.it/235x115'}}"
                                             alt="{{$job->title}}"/>
                                    </div>
                                    <h3 class="px-2">
                                        <a href="{{route('job.show',$job->slug)}}" title="">
                                            {{$job->title}}
                                        </a>
                                    </h3>
                                    @if(optional($job->district)->name)
                                        <span class="pl-2">{{$job->district->name}}</span>
                                    @endif
                                    <span class="job-lctn">{{$job->city->name}}</span>
                                </div>
                                <a href="{{route('job.show',$job->slug)}}" title="" class="aply-btn">Şimdi Başvur</a>
                                <span class="job-is ft">{{optional($job->workType)->name}}</span>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-3 column d-none d-md-block">
                        <div class="heading left">
                            <h2>Güncel İlanlar</h2>
                        </div><!-- Heading -->
                        <div class="job-grid-sec">
                            <div class="row">
                                @forelse($recentJobs as $job)
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="job-grid style2">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="https://place-hold.it/235x115" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>Massimo Artemisis</span>
                                        </div>
                                        <span class="job-lctn">Sacramento, California</span>
                                        <p>Offer strategic and technical health and nutrition advice to headquarters and field staff, as well as training</p>
                                        <div class="grid-info-box">
                                            <span class="job-is">Full Time</span>
                                            <a  href="#" title="">APPLY NOW</a>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        </div>
                                    </div><!-- JOB Grid -->
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="{{route('job.index')}}" title="" class="style2">Daha fazla iş ilanı
                                görüntüleyin</a>
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
                                    <a href="{{route('register-user')}}" title="" class="style2">İş ilanlarını inceleyin</a>
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

                                @forelse($blogs as $blog)
                                    <div class="col-lg-4">
                                        <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                    <img src="{{$blog->cover_image ?? 'https://place-hold.it/360x200'}}"
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
                                                <p>{{$blog->summary}}</p>
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
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column">
                        <div class="heading left">
                            <h2>Frequently Asked Questions?</h2>
                        </div><!-- Heading -->
                        <div id="toggle-widget" class="experties">
                            <h2>How We Share Information?</h2>
                            <div class="content">
                                <p>Book your car, all you need is a credit or debit card. When you pick the car up, you’ll need Different car hire companies have different requirements, so please make sure you check the car’s terms and conditions as well.</p>
                            </div>
                            <h2>In Which We Explain How And With Whom We Share Your Information?</h2>
                            <div class="content">
                                <p>Book your car, all you need is a credit or debit card. When you pick the car up, you’ll need Different car hire companies have different requirements, so please make sure you check the car’s terms and conditions as well.</p>
                            </div>
                            <h2>Special Provisions Applicable To Employer?</h2>
                            <div class="content">
                                <p>Book your car, all you need is a credit or debit card. When you pick the car up, you’ll need Different car hire companies have different requirements, so please make sure you check the car’s terms and conditions as well.</p>
                            </div>
                            <h2>How Do I Find Contact Information For Harvard Students, Faculty?</h2>
                            <div class="content">
                                <p>Book your car, all you need is a credit or debit card. When you pick the car up, you’ll need Different car hire companies have different requirements, so please make sure you check the car’s terms and conditions as well.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column">
                        <div class="reviews-sec" id="reviews">
                            <div class="col-lg-6">
                                <div class="reviews style2">
                                    <img src="https://place-hold.it/101x101" alt="" />
                                    <h3>Augusta Silva <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews style2">
                                    <img src="https://place-hold.it/101x101" alt="" />
                                    <h3>Ali Tufan <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews style2">
                                    <img src="https://place-hold.it/101x101" alt="" />
                                    <h3>Augusta Silva <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
                                </div><!-- Reviews -->
                            </div>
                            <div class="col-lg-6">
                                <div class="reviews style2">
                                    <img src="https://place-hold.it/101x101" alt="" />
                                    <h3>Ali Tufan <span>Web designer</span></h3>
                                    <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
                                </div><!-- Reviews -->
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

    <script>
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
