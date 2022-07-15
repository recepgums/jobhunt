<footer class="gray">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="mega-widget">
                            <div class="logo"><a href="#" title=""><img src="https://place-hold.it/93x40" alt="" /></a></div>
                            <div class="links">
                                <a href="{{route('terms')}}" title="">Şartlar ve Politikalar</a>
                                <a href="{{route('how_it_works')}}" title="">Nasıl Çalışır</a>
                                <a href="{{route('contact')}}" title="">İletişim</a>
                            </div>
                            <span>Eyüp/İstanbul 34050</span>
                            <span>{{env('CONTACT_PHONE_NUMBER')}}</span>
                            <span>{{env('CONTACT_EMAIL_ADDRESS')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-line style2">
        <span>© {{now()->format('Y')}} {{env('APP_NAME')}} tüm hakları saklıdır.</span>
        <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
    </div>
</footer>
