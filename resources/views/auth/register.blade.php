@extends('layout.app')


@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div>
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>Kayıt Ol</h3>
                                <form method="post" action="{{route('register.custom')}}" autocomplete="off">
                                    @csrf
                                    <div class="cfield">
                                        <input name="name" type="text" placeholder="İsim Soyisim" />
                                        <i class="la la-user"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="email" type="text" placeholder="Email"  autocomplete="off"/>
                                        <i class="la la-envelope-o"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="password" type="password" placeholder="Şifre" required autocomplete="new-password"/>
                                        <i class="la la-key"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="phone" type="tel" placeholder="Telefon (53XXXXXXXX)" required/>
                                        <i class="la la-phone"></i>
                                    </div>
                                    <div class="select-user">
                                        <span>İş Arayan</span>
                                        <span>İşveren</span>
                                    </div>

                                    <button type="submit">Kayıt Ol</button>
                                </form>
                                <div class="extra-login">
                                    <span>Ya da</span>
                                    <div class="login-social">
                                        <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i class="fa fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- SIGNUP POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
