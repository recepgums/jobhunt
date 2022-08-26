<div class="tw-visible lg:tw-hidden">

    @auth
    <nav
        class="tw-fixed tw-bottom-0 tw-inset-x-0 tw-bg-red-500 tw-flex tw-justify-between tw-text-sm tw-text-white tw-uppercase tw-z-50">

        <a href="#"
            class="tw-w-full tw-block tw-py-5 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-file tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">İlanlarım</h1>
        </a>

        <a href="#"
            class="tw-w-full tw-block tw-py-5 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-plus-circle tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">İş İlanı Ver</h1>
        </a>

        <a href="#"
            class="tw-w-full tw-block tw-py-5 tw-px-3 tw-text-center hover:tw-bg-red-400 hover:tw-text-red-600 transition duration-300">
            <i class="la la-user tw-text-[30px] tw-font-medium"></i>
            <h1 class="tw-font-semibold">Hesabım</h1>
        </a>
    </nav>
    @endauth

    @guest

    <div class="tw-fixed tw-bottom-0 tw-inset-x-0 tw-bg-white  tw-text-sm tw-font-semibold tw-text-black tw-z-50 px-5 ">
        <div class="tw-flex tw-justify-between tw-py-8">
            <h1>İş mi Arıyorsun?</h1>
            <div class="tw-flex tw-space-x-3">
                <a>
                    Giriş Yap
                </a>
                <div class="tw-w-0.5 tw-h-4 tw-pt-1 tw-bg-black"></div>
                <a>
                    Kayıt Ol
                </a>
            </div>
        </div>

    </div>
    @endguest
    <!-- fixed nav -->


</div>
