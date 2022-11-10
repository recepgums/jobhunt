@extends('layout.app')

@section('content')
    <section class="overlape mt-5">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>
    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Nasıl Çalışır</h3>
                                <span>Jobhunt'ın sizin için nasıl çalıştığına dair dijital bir tur atın.</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="{{route('homepage')}}" title="">Ana Sayfa</a></li>
                                    <li><a href="{{route('how_it_works')}}" title="">Nasıl Çalışır</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how-works">
                            <div class="how-workimg"><img
                                    src="https://creativelayers.net/themes/jobhunt-html/images/resource/hw1.jpg" alt="">
                            </div>
                            <div class="how-work-detail">
                                <div class="how-work-box">
                                    <span>1</span>
                                    <i class="la la-user"></i>
                                    <h3>Hesap Oluşturun</h3>
                                    <p>İlan açmak ve ilan verenlerle iletişime geçmek için
                                        şimdi <a href="{{route('homepage')}}" style="color: red;">isbull.com</a>’a
                                        kaydolun, gerekli iş gücünü bulun
                                        ve sergileyin! Bu süreçte gerçek bilgilerinizi kullanmanız iş ticaretinizde
                                        yararınıza olacaktır.</p>
                                </div>
                            </div>
                        </div>
                        <div class="how-works flip">
                            <div class="how-workimg"><img
                                    src="https://creativelayers.net/themes/jobhunt-html/images/resource/hw2.jpg" alt="">
                            </div>
                            <div class="how-work-detail">
                                <div class="how-work-box">
                                    <span>2</span>
                                    <i class="la la-file-text"></i>
                                    <h3>İlan Verin</h3>
                                    <p>İki dakika içinde doldurabileceğiniz ilan formunuzu diğerlerinden farklı kılmanız
                                        mümkün! Dilediğiniz özelliklerde işçileri bulmanız ve diğer ilanların önüne
                                        geçmeniz <a href="{{route('homepage')}}" style="color: red;">isbull.com</a>
                                        sayesinde çok kolay!</p>
                                </div>
                            </div>
                        </div>
                        <div class="how-works">
                            <div class="how-workimg"><img
                                    src="https://creativelayers.net/themes/jobhunt-html/images/resource/hw3.jpg" alt="">
                            </div>
                            <div class="how-work-detail">
                                <div class="how-work-box">
                                    <span>3</span>
                                    <i class="la la-pencil"></i>
                                    <h3>İlanlara Başvurun</h3>
                                    <p>İşbull’un seri ve güvenli yapısı aracılığıyla beğendiğiniz ilanların sahibiyle
                                        çabucak iletişime geçin, aradığınız işi bulun.</p>
                                </div>
                            </div>
                        </div>
                        <div class="how-works flip">
                            <div class="how-workimg"><img
                                    src="https://creativelayers.net/themes/jobhunt-html/images/resource/hw2.jpg" alt="">
                            </div>
                            <div class="how-work-detail">
                                <div class="how-work-box">
                                    <span>4</span>
                                    <i class="la la-phone"></i>
                                    <h3>Telefonlarınız Hiç Susmasın!</h3>
                                    <p><a href="{{route('homepage')}}" style="color: red;">isbull.com</a>’da ilan verdiğiniz an büyük
                                        işçi ve iş veren kitlesi sayesinde telefonlarınız artık hiç susmayacak! Acele
                                        edin!</p>
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

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/tag.js')}}" type="text/javascript"></script>
@endpush
