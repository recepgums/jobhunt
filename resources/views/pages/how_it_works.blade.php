@extends('layout.app')

@section('content')
    <section class="overlape">
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
                                    <h3>Bir hesap kaydettirme</h3>
                                    <p>ın Job, Türkiye'nin önde gelen ve en uzun soluklu online işe alım şirketidir. İş
                                        arayanların bize sadece bir iş için değil, profesyonellerini gerçekleştirme
                                        fırsatı için geldiklerini anlıyoruz.</p>
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
                                    <h3>İşinizi Belirtin ve Arayın</h3>
                                    <p>Başvuruları e-posta yoluyla alacaksınız. İşleri ve adayları Indeed panonuzdan da
                                        yönetebilirsiniz. Başvuruları gözden geçirin, görüşmeleri planlayın ve önerilen
                                        adayları tek bir yerden görüntüleyin.</p>
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
                                    <h3>İş Başvurusu Yap</h3>
                                    <p>ın Job, Türkiye'nin önde gelen ve en uzun soluklu online işe alım şirketidir. İş
                                        arayanların bize sadece bir iş için değil, aynı zamanda profesyonellerini
                                        gerçekleştirme fırsatı için geldiklerini anlıyoruz.</p>
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
