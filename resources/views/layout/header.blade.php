<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo">
            <a href="{{route('homepage')}}">
                @auth
                    <img style="width: 50px" src="{{asset('assets/images/logo.png')}}" alt=""/>
                    <h1 style="font-size: 10px; font-weight: bold; color:white;">
                        Hoşgeldiniz {{auth()->user()->name}}</h1>
                @endauth
                @guest
                    <img style="width: 100px" src="{{asset('assets/images/logo.png')}}" width="100"
                         height="71" alt=""/>
                @endguest
            </a>

        </div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="{{asset('assets/images/icon.png')}}" alt=""/> Menü
            </div>
            <div class="res-closemenu">
                <img src="{{asset('assets/images/icon2.png')}}" alt=""/> Kapat
            </div>
        </div>
    </div>
    <div class="responsive-opensec">

        <div class="btn-extars">
            <ul class="account-btns">
                @guest
                    <li class="ml-5"><a title="" href="{{route('login')}}"><i class="la la-external-link-square"></i>
                            Giriş Yap</a>
                    </li>
                    <li class="ml-5"><a title="" href="{{route('register-user')}}"><i class="la la-key"></i> Kayıt
                            Ol</a></li>
                @endguest
                <a href="{{route('job.create')}}" class="tw-bg-red-500 btn w-full text-white p-2 mt-4 ml-5 w-75"
                   style="font-weight: 600;">
                    Ücretsiz İlan Ver
                </a>
            </ul>
        </div>

        <form class="res-search" method="post">
            @csrf
            <input type="text"  placeholder="Uzmanlık alanı, anahtar kelime ya da ilan başlığı"/>
            <button type="submit" ><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
            <ul>
                <li>
                    <a href="{{route('homepage')}}" title="">Anasayfa</a>
                </li>
                <li>
                    <a href="{{route('job.index')}}" title="">İş İlanları</a>
                </li>
                @auth
                    <li>
                        <a href="{{route('signout')}}" title="">Çıkış Yap</a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{route('blog.index')}}" title="">Blog</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>

<header class="stick-top @if(isset($isHomepage) && $isHomepage) style2 @endif">
    <div class="menu-sec">
        <div class="container fluid">
            <div class="logo">
                <a href="{{route('homepage')}}" title="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                @auth
                                    <img style="width: 100px" src="{{asset('assets/images/logo.png')}}" width="100"
                                         height="71" alt=""/>
                            </div>
                            <div class="col-lg-9">

                                <h1 style="font-size: 25px; font-weight: bold; color:white;">
                                    Hoşgeldiniz {{auth()->user()->name}}</h1>
                                @endauth
                            </div>
                            @guest
                                <img style="width: 100px" src="{{asset('assets/images/logo.png')}}" width="100"
                                     height="71" alt=""/>
                            @endguest
                        </div>
                    </div>
                </a>
            </div><!-- Logo -->
            <div class="btn-extars">
                <a href="{{route('job.create')}}" title="" class="post-job-btn active"><i class="la la-plus"></i>Ücretsiz*
                    ilan Ver</a>

                <ul class="account-btns">
                    @if(!request()->is('register') && !request()->is('login'))
                        @guest
                            <li class=""><a title="" href="{{route('register-user')}}"><i class="la la-key"></i> Kayıt
                                    Ol</a></li>
                            <li class=""><a title="" href="{{route('login')}}"><i
                                        class="la la-external-link-square"></i> Giriş
                                    Yap</a>
                            </li>
                        @endguest
                        @auth
                            <li><a href="{{route('dashboard')}}"><i class="la la-user"></i> {{auth()->user()->name}}</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div><!-- Btn Extras -->
            <nav>
                <ul>
                    <li>
                        <a href="{{route('homepage')}}" title="">Anasayfa</a>
                    </li>
                    <li>
                        <a href="{{route('job.index')}}" title="">İş İlanları</a>
                    </li>{{--
                    <li>
                        <a href="{{route('candidates.index')}}" title="">İş Arayanlar</a>
                    </li>--}}
                    <li>
                        <a href="{{route('blog.index')}}" title="">Blog</a>
                    </li>
                    {{--
                    <li>
                        <a href="{{route('employer.index')}}" title="">İşverenler</a>
                    </li>--}}
                </ul>
            </nav>
        </div>
    </div>
</header>


