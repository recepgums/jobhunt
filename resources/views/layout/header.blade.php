<div class="responsive-header" style="  position: fixed;
  left: 0;
  top: 0;
  width: 100vw;
  background-color: @if(isset($isHomepage) && $isHomepage) rgba(184, 24, 40, 0.88) @else rgb(54 61 115) @endif;
  opacity: 0.9;
  ">
    <!--TODO-->
    <div class="responsive-menubar">
        <div class="res-logo">
            <a href="{{route('homepage')}}">
{{--                    <img style="width: 50px" src="{{asset('assets/images/logo.png')}}" alt="{{env('APP_NAME')}}"/>--}}
                <span style="font-size: 20px;font-weight: bolder;color:white;">
                    {{env('APP_NAME')}}
                </span>
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
    <div class="responsive-opensec" style=" background-color: @if(isset($isHomepage) && $isHomepage) rgba(184, 24, 40, 0.88) @else rgb(54 61 115) @endif;
  ">

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

<header class="stick-top p-1 @if(isset($isHomepage) && $isHomepage) style2 @endif" style="  position: fixed;
  left: 0;
  top: 0;
  width: 100vw;
  background-color: @if(isset($isHomepage) && $isHomepage) rgba(184, 24, 40, 0.88) @else rgb(54 61 115) @endif;
  opacity: 0.9;
  ">
    <div class="menu-sec" style="margin: 0">
        <div class="container fluid">
            <div class="logo">
                <a href="{{route('homepage')}}" title="">
                    <div class="container">
                        <div class="col">
                            <!--                            <img style="width: 75px" src="{{asset('assets/images/logo.png')}}" width="100"
                                 height="71" alt=""/>-->
                            <span style="font-size: 30px;font-weight: bolder;color:white;">
                    {{env('BASE_NAME')}}
                                <small>
                                    /{{env('APP_SUB')}}
                                </small>
                </span>
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


