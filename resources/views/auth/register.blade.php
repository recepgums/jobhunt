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
                                <span>
                                    Zaten bir hesabın mı var?
                                    <a style="color: blue" href="{{route('login')}}">Giriş yap</a>
                                </span>
                                <form method="post" action="{{route('register.custom')}}" autocomplete="off">
                                    @csrf
                                    <div class="cfield">
                                        <input name="name" type="text" placeholder="İsim Soyisim"/>
                                        <i class="la la-user"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="email" type="text" placeholder="Email" autocomplete="off"/>
                                        <i class="la la-envelope-o"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="password" type="password" placeholder="Şifre" required
                                               autocomplete="new-password"/>
                                        <i class="la la-key"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="phone" type="tel" placeholder="Telefon (53XXXXXXXX)" required/>
                                        <i class="la la-phone"></i>
                                    </div>
                                    <div class="select-user">
                                        <span id="jobSeeker" onclick="document.getElementById('role').value=1">İş Arayan</span>
                                        <span onclick="document.getElementById('role').value=2">İşveren</span>
                                        <input type="hidden" id="role" name="type" value="1">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-3">
                                            <p class="remember-label" style="font-size: 11.22px">
                                                <input type="checkbox"  name="remember" id="cb3"><label for="cb3">
                                                   <span class="font-weight-bold">Hizmet Sözleşmesini</span> Onaylıyorum</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 11.22px">
                                                <input type="checkbox"  name="remember" id="cb2"><label for="cb2">
                                                    İletişim bilgilerime e-ileti gönderilmesine izin veriyorum.</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 10.70px">
                                                <input type="checkbox"  name="remember" id="cb1">
                                                <label for="cb1">
                                                    Verilerimin <span class="font-weight-bold">Açık Rıza Metni'nde</span> belirtilen şekilde işlenmesine onay veriyorum..</label>
                                            </p>
                                        </div>
                                    </div>
                                    <button type="submit" style="color: white">Kayıt Ol</button>
                                </form>
                                <div class="extra-login">
                                    <span>Ya da</span>
                                    <div class="login-social">
                                        <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i
                                                class="fa fa-google"></i></a>
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
    <script>
        $(document).on('ready', function () {
            document.getElementById("jobSeeker").click();
        })
    </script>
@endpush
