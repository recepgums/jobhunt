<div class="tw-visible lg:tw-hidden">

    @auth
    <nav style="background-color: rgb(95,101,158)"
        class="tw-fixed tw-bottom-0 tw-inset-x-0 tw-bg-red-500 tw-flex tw-justify-between tw-text-sm tw-text-white tw-z-50">
        <a href="{{route('job.index')}}"
            class="tw-w-full tw-block tw-py-1 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-file tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">İlanlar</h1>
        </a>
        <a href="{{route('candidate.shortlist')}}"
            class="tw-w-full tw-block tw-py-1 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-bell tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">Bildirimler</h1>
        </a>
        <a href="{{route('job.create')}}"
           style="color: rgb(95,101,158)"
            class="tw-w-full tw-block tw-py-1 tw-px-3 tw-text-center tw-bg-white hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-plus-circle tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">İlan Ver</h1>
        </a>
        <a href="{{route('candidate.shortlist')}}"
           class="tw-w-full tw-block tw-py-1 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-file tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">İlanlarım</h1>
        </a>
        <a href="{{route('dashboard')}}"
            class="tw-w-full tw-block tw-py-1 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-user tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">Hesabım</h1>
        </a>
    </nav>
    @endauth

    @guest

    <div class="tw-fixed tw-bottom-0 tw-inset-x-0 tw-bg-white  tw-text-sm tw-font-semibold tw-text-black tw-z-50 px-5 " style="background-color: rgb(95,101,158)">
        <div class="tw-flex tw-justify-between py-4 text-white">
            @if (Request::route()->getName() == "job.show")
            <h1>İletisime gecmek icin</h1>
            @else
                <h1>İş mi Arıyorsun?</h1>
            @endif
            <div class="tw-flex tw-space-x-3">
                <a href="{{route('login')}}">
                    Giriş Yap
                </a>
                <div class="tw-w-0.5 tw-h-4 tw-pt-1 tw-bg-black"></div>
                <a href="{{route('register-user')}}">
                    Kayıt Ol
                </a>
            </div>
        </div>

    </div>
    @endguest
    <!-- fixed nav -->
</div>

<style>
    nav a{
        font-size: 80%;
    }
</style>
