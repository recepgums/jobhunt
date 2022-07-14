@extends('layout.app')

@section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec style2">
                            <ul class="main-slider-sec style2 text-arrows">
                                <li class="slideHome"><img src="https://www.gidahatti.com/wp-content/uploads/2015/09/unilever-india.jpg"
                                                           alt=""/></li>
                                <li class="slideHome"><img src="https://place-hold.it/300x500?text=Something%20Here"
                                                           alt=""/></li>
                                <li class="slideHome"><img src="https://place-hold.it/1920x800" alt=""/></li>
                            </ul>
                            <div class="job-search-sec">
                                <div class="job-search style2">
                                    <h3>Hayırlı bir İş Kapısı</h3>
                                    <span>İş ve işçi bulmanın en kolay yolu</span>
                                    <div class="search-job2">
                                        <form method="get" action="{{route('job.index')}}">
                                            <div class="row no-gape">
                                                <div class="col-lg-4 col-md-3 col-sm-4">
                                                    <div class="job-field">
                                                        <input type="text" name="keyword" placeholder="Ara... (Kara firin, Hamurker)"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg2 col-md-2 col-sm-3">
                                                    <div class="job-field">
                                                        <select data-placeholder="Şehir" name="city_id" onchange="cityChangedMethod(this)" class="chosen-city">
                                                            <option value></option>
                                                            @forelse($cities as $city)
                                                                <option @if($city->id == $selectedCity?->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg2 col-md-2 col-sm-3">
                                                    <div class="job-field" id="districtSelectDiv">
                                                        <select data-placeholder="İlçe" name="district_id" class="chosen-city" id="districtSelect">
                                                            <option value selected></option>
                                                            @forelse($districts as $district)
                                                                <option  value="{{$district?->id}}">{{$district?->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg2 col-md-2 col-sm-3">
                                                    <div class="job-field">
                                                        <select data-placeholder="Any category" class="chosen-city">
                                                            <option>Mechanic</option>
                                                            <option>Web Development</option>
                                                            <option>Car Install</option>
                                                            <option>Shoes Slippers</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg2 col-md-2 col-sm-3">
                                                    <button type="submit">İŞ BUL <i class="la la-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- Job Search 2 -->
                                    <div class="quick-select-sec">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="quick-select">
                                                    <a href="#" title="">
                                                        <i class="la la-bullhorn"></i>
                                                        <span>Design, Art & Multimedia</span>
                                                        <p>(22 open positions)</p>
                                                    </a>
                                                </div><!-- Quick Select -->
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="quick-select">
                                                    <a href="#" title="">
                                                        <i class="la la-graduation-cap"></i>
                                                        <span>Education Training</span>
                                                        <p>(06 open positions)</p>
                                                    </a>
                                                </div><!-- Quick Select -->
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="quick-select">
                                                    <a href="#" title="">
                                                        <i class="la la-line-chart "></i>
                                                        <span>Accounting / Finance</span>
                                                        <p>(03 open positions)</p>
                                                    </a>
                                                </div><!-- Quick Select -->
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="quick-select">
                                                    <a href="#" title="">
                                                        <i class="la la-users"></i>
                                                        <span>Human Resource</span>
                                                        <p>(03 open positions)</p>
                                                    </a>
                                                </div><!-- Quick Select -->
                                            </div>
                                        </div>
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
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Güncel İş İlanları</h2>
                            {{--<span>Leading Employers already using job and talent.</span>--}}
                        </div><!-- Heading -->
                        <div class="job-grid-sec">
                            <div class="row">
                                @forelse($recentJobs as $job)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="job-grid">
                                            <div class="job-title-sec">
                                                <div class="c-logo">
                                                    <img src="{{$job->cover_image ?? 'https://place-hold.it/235x115'}}"
                                                         alt="{{$job->title}}"/>
                                                </div>
                                                <h3><a href="{{route('job.show',$job->slug)}}" title="">{{$job->title}}</a></h3>
                                                <span>{{-- todo {{$category->name}}--}}</span>
                                            </div>
                                            <span
                                                class="job-lctn">@if(optional($job->district)->name) {{$job->district->name}}
                                                , @endif {{$job->city->name}}</span>
                                            <a href="{{route('job.show',$job->slug)}}" title="">Şimdi Başvur</a>
                                        </div><!-- JOB Grid -->
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="{{route('job.index')}}" title="" class="style2">Daha fazla iş ilanı görüntüleyin</a>
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
                            <span class="text-left">Her ay, 850 kişiden fazla {{env('APP_TARGET_JOB_NAME')}}, {{env('APP_NAME')}} sayesinde iş ve işçi buluyor. İşi için gerekli olan tüm bağlantılar için bizi tercih ediyor. <br/> <br> {{env('APP_NAME')}} ile iş bulun
                                ya da işinizi büyütün.
							</span>
                        </div><!-- Heading -->
                        <div class="tab-sec">
                            <ul class="nav nav-tabs my-5">
                                <li><a class="current" data-tab="fjobs">İş Arıyorum</a></li>
                                <li><a data-tab="rjobs">İşçi Arıyorum</a></li>
                            </ul>
                            <div id="fjobs" class="tab-content current my-5">
                                <div class="how-to-sec">
                                    <div class="how-to">
                                        <span class="how-icon"><i class="la la-user"></i></span>
                                        <h3>Hesap Oluşturun</h3>
                                        <p>
                                            İş ilanı verenler ile iletişime geçmek için hesap açın. Bilgilerinizi doğru girdiğinizden emin olun.
                                        </p>
                                    </div>
                                    <div class="how-to">
                                        <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                        <h3>İş ilanlarını arayın</h3>
                                        <p><a href="{{route('job.index')}}">İş ilanları</a> sayfasından size uygun iş ilanlarını inceleyin</p>
                                    </div>
                                    <div class="how-to">
                                        <span class="how-icon"><i class="la la-list"></i></span>
                                        <h3>İş ilanlarına başvurun</h3>
                                        <p>İlan detaylarından, iş sahibinin numarasını arayın.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="rjobs" class="tab-content mt-5">
                                <div class="job-listings-tabs">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Marketing Dairector</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Application Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Social Media and Public</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is fl fill">Freelance</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is pt fill">Part time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                                    <h3><a href="#" title="">Regional Sales Manager South</a></h3>
                                                    <span>Massimo Artemisis</span>
                                                    <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft fill">Full time</span>
                                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                </div>
                                            </div><!-- Job -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="browse-all-cat">
                                <a href="#" title="" class="style2">Load more listings</a>
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
                            <h2>How It Works</h2>
                            <span>Each month, more than 7 million Jobhunt turn to website in their search for work, making over <br/>160,000 applications every day.
							</span>
                        </div><!-- Heading -->
                        <div class="how-to-sec">
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-user"></i></span>
                                <h3>Register an account</h3>
                                <p>Post a job to tell us about your project. We'll quickly match you with the right
                                    freelancers.</p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                                <h3>Specify & search your job</h3>
                                <p>Browse profiles, reviews, and proposals then interview top candidates. </p>
                            </div>
                            <div class="how-to">
                                <span class="how-icon"><i class="la la-list"></i></span>
                                <h3>Apply for job</h3>
                                <p>Use the Upwork platform to chat, share files, and collaborate from your desktop
                                    or on the go.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section>
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>En çok işe alım yapan Şirketler</h2>
                            <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
                        </div><!-- Heading -->
                        <div class="top-company-sec">
                            <div class="row" id="companies-carousel">
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="https://place-hold.it/180x180" alt=""/>
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div><!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="https://place-hold.it/180x180" alt=""/>
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div><!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="https://place-hold.it/180x180" alt=""/>
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div><!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="https://place-hold.it/180x180" alt=""/>
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div><!-- Top Company -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="top-compnay">
                                        <img src="https://place-hold.it/180x180" alt=""/>
                                        <h3><a href="#" title="">Symtech</a></h3>
                                        <span>United States, Los Angeles</span>
                                        <a href="#" title="">4 Open Positon</a>
                                    </div><!-- Top Company -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    <section>
        <div class="block">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1920x1000) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible layer color red"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading light">
                            <h2>Projob Site Stats</h2>
                            <span>Here we list our site stats and how many people we’ve helped find a job and companies have found <br/>recruits. It's a pretty awesome stats area!</span>
                        </div><!-- Heading -->
                        <div class="stats-sec">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="stats">
                                        <span>18</span>
                                        <h5>Jobs Posted</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="stats">
                                        <span>38</span>
                                        <h5>Jobs Filled</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="stats">
                                        <span>67</span>
                                        <h5>Companies</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="stats">
                                        <span>92</span>
                                        <h5>Members</h5>
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
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Quick Career Tips</h2>
                            <span>Found by employers communicate directly with hiring managers and recruiters.</span>
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
                                                    <a>{{$blog->created_at->format('Y')}} <i>{{$blog->created_at->format('M d')}}</i></a>
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
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscription-sec">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Still Need Help ?</h3>
                                    <span>Let us now about your issue and a Professional will reach you out.</span>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <input type="text" placeholder="Enter Valid Email Address"/>
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

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="social-links">
                            <a href="#" title="" class="fb-color"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="#" title="" class="tw-color"><i class="fa fa-twitter"></i> Twitter</a>
                            <a href="#" title="" class="in-color"><i class="la la-instagram"></i> Instagram</a>
                            <a href="#" title="" class="pt-color"><i class="la la-pinterest"></i> Pinterest</a>
                            <a href="#" title="" class="dr-color"><i class="la la-dribbble"></i> Dribbble</a>
                            <a href="#" title="" class="gl-color"><i class="la la-google"></i> Google</a>
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
