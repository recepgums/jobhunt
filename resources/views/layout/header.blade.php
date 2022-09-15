<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo">
            <a href="{{route('homepage')}}">
                <img style="height: 20px;width: 20px" src="{{asset('assets/images/logo.png')}}" alt=""/>
            </a>

        </div>
        <a style="color: white;font-weight: 600;" href="{{route('homepage')}}"
           class="mx-auto text-center"> {{env('APP_NAME')}}</a>
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

            @if(!request()->is('register') && !request()->is('login'))
                <ul class="account-btns">
                    <li>
                        <a href="{{route('job.create')}}" title="" class="post-job-btn">
                            <div class="row">
                                <div class="col-2">
                                    <i class="la la-plus"></i>
                                </div>
                                <div class="col-10 mt-1">Ücretsiz
                                    ilan Ver
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Giriş Yap</a></li>
                    <li class="signup-popup"><a title=""><i class="la la-key"></i> Kayıt Ol</a></li>
                </ul>
            @endif
        </div>
        <form class="res-search">
            <input type="text" placeholder="Uzmanlık alanı, anahtar kelime ya da ilan başlığı"/>
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
            <ul>
                <li>
                    <a href="{{route('homepage')}}" title="">Anasayfa</a>
                </li>
                <li>
                    <a href="{{route('job.index')}}" title="">İş İlanları</a>
                </li>
                <li>
                    <a href="{{route('blog.index')}}" title="">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<header class="stick-top @if(isset($isHomepage) && $isHomepage) style2 @endif">
    <div class="menu-sec">
        <div class="container fluid">
            <div class="logo">
                <a href="{{route('homepage')}}" title="">
                    <img style="width: 100px" src="{{asset('assets/images/logo.png')}}" alt=""/>
                </a>
            </div><!-- Logo -->
            <div class="btn-extars">
                <a href="{{route('job.create')}}" title="" class="post-job-btn active"><i class="la la-plus"></i>Ücretsiz*
                    ilan Ver</a>

                <ul class="account-btns">
                    @if(!request()->is('register') && !request()->is('login'))
                        @guest
                            <li class="signup-popup"><a title=""><i class="la la-key"></i> Kayıt Ol</a></li>
                            <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Giriş
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


