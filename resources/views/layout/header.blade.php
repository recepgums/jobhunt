<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo"><a href="{{route('homepage')}}" title=""><img src="{{asset('assets/images/logo.png')}}" alt=""/></a>
        </div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="{{asset('assets/images/icon.png')}}" alt=""/> Menu
            </div>
            <div class="res-closemenu">
                <img src="{{asset('assets/images/icon2.png')}}" alt=""/> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars">
            <a href="{{route('job.create')}}" title="" class="post-job-btn"><i class="la la-plus"></i>İş İlanı Ver</a>
            <ul class="account-btns">
                <li class="signup-popup"><a title=""><i class="la la-key"></i> Kayıt Ol</a></li>
                <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Giriş Yap</a></li>
            </ul>
        </div><!-- Btn Extras -->
        <form class="res-search">
            <input type="text" placeholder="Job title, keywords or company name"/>
            <button type="submit"><i class="la la-search"></i></button>
        </form>
        <div class="responsivemenu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="{{route('homepage')}}" title="">Anasayfa</a>
                </li>
                <li><a href="{{route('job.index')}}" title="">İş İlanları</a></li>
               {{-- <li class="menu-item-has-children">
                    <a href="{{route('candidates.index')}}" title="">İş Arayanlar</a>
                </li>--}}
                <li class="menu-item-has-children">
                    <a href="{{route('blog.index')}}" title="">Blog</a>
                </li>{{--
                <li>
                    <a href="{{route('employer.index')}}" title="">İşverenler</a>
                </li>--}}
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
                <a href="{{route('job.create')}}" title="" class="post-job-btn"><i class="la la-plus"></i>İş İlanı
                    Ver</a>

                <ul class="account-btns">
                    @guest

                        <li class="signup-popup"><a title=""><i class="la la-key"></i> Kayıt Ol</a></li>
                        <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Giriş Yap</a>
                        </li>
                    @endguest
                    @auth
                        <li><a href="{{route('dashboard')}}"><i class="la la-dashboard"></i> {{auth()->user()->name}}</a></li>
                    @endauth
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
                    </li>{{--
                    <li>
                        <a href="{{route('employer.index')}}" title="">İşverenler</a>
                    </li>--}}
                </ul>
            </nav>
        </div>
    </div>
</header>


