@extends('layout.app')

@section('content')
    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>İletişim</h3>
                                <span>En son haberleri takip edin</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="#" title="">Ana Sayfa</a></li>
                                    <li><a href="#" title="">Sayfalar</a></li>
                                    <li><a href="#" title="">İletişim</a></li>
                                </ul>
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
                    <div class="col-lg-6 column">
                        <div class="contact-form">
                            <h3>İletişiminizi sürdürün</h3>
                            <form method="POST" action="{{route('contact.post')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title">İsim</span>
                                        <div class="pf-field">
                                            <input type="text" name="fullName" placeholder="ALi TUFAN"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Email</span>
                                        <div class="pf-field">
                                            <input type="text" name="surname" placeholder="ALi TUFAN"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Konu</span>
                                        <div class="pf-field">
                                            <input name="subject" type="text" placeholder="ALi TUFAN"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Mesaj</span>
                                        <div class="pf-field">
                                            <textarea name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit">Gönder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 column">
                        <div class="contact-textinfo">
                            <h3>JobHunt Office</h3>
                            <ul>
                                <li><i class="la la-map-marker"></i><span>Jobify Inc. 555 Madison Avenue, Suite F-2 Manhattan, New York 10282 </span>
                                </li>
                                <li><i class="la la-phone"></i><span>Telefon Numarası : 0934 343 343</span></li>
                                <li><i class="la la-fax"></i><span>Fax Numarası: 0934 343 343</span></li>
                                <li><i class="la la-envelope-o"></i><span>Email : info@jobhunt.com</span></li>
                            </ul>
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
