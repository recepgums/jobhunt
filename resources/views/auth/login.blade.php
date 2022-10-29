@extends('layout.app')


@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div>
        </div>
    </section>

    <section class="mt-5">
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signin-popup-box static">
                            <div class="account-popup">
                                <h3>Giriş Yap</h3>
                                <span>Hesabınız yok mu?
                                <a style="color: blue" href="{{route('register-user')}}">Kayıt olun</a>
                                </span>
                                @if($errors->any())
                                    {!! implode('', $errors->all('<div class="col-12 text-left text-danger">:message</div>')) !!}
                                @endif
                                <form action="{{route('login.custom')}}" method="POST">
                                    @csrf
                                    <div class="cfield">
                                        <input autocomplete="nope" name="email" type="email" placeholder="Email Adresiniz" required/>
                                        <i class="la la-user"></i>
                                    </div>
                                    <div class="cfield">
                                        <input type="password" name="password" placeholder="********" required/>
                                        <i class="la la-key"></i>
                                    </div>
                                    <p class="remember-label">
                                        <input type="checkbox" name="remember" id="cb1"><label for="cb1">
                                            Beni hatırla</label>
                                    </p>

                                    <a href="{{route('forgot-password')}}" title="">Şifremi unuttum</a>

                                    <button type="submit" style="color: white">Giriş Yap</button>
                                </form>

                                <div class="extra-login">
                                    <span>Ya da</span>
                                    <br>
                                    <a class="tw-login" href="{{route('socialite.redirect','google')}}" title="">
                                        <div class="g-sign-in-button">
                                            <div class=content-wrapper>
                                                <div class="logo-wrapper">
                                                    <img src='https://developers.google.com/identity/images/g-logo.png'>
                                                </div>
                                                <span class='text-container'>
                                                  <span>
                                                      Google ile giriş yap
                                                  </span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- LOGIN POPUP -->
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
<style>
    *, *:before, *:after {
        box-sizing: border-box;
    }

    .g-sign-in-button {
        margin: 10px;
        display: inline-block;
        width: 240px;
        height: 50px;
        background-color: #4285f4;
        color: #fff;
        border-radius: 1px;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
        transition: background-color .218s, border-color .218s, box-shadow .218s;
    }

    .g-sign-in-button:hover {
        cursor: pointer;
        -webkit-box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
    }

    .g-sign-in-button:active {
        background-color: #3367D6;
        transition: background-color 0.2s;
    }

    .g-sign-in-button .content-wrapper {
        height: 100%;
        width: 100%;
        border: 1px solid transparent;
    }

    .g-sign-in-button img {
        width: 18px;
        height: 18px;
    }

    .g-sign-in-button .logo-wrapper {
        padding: 15px;
        background: #fff;
        width: 48px;
        height: 100%;
        border-radius: 1px;
        display: inline-block;
    }

    .g-sign-in-button .text-container {
        font-family: Roboto,arial,sans-serif;
        font-weight: 500;
        letter-spacing: .21px;
        font-size: 16px;
        line-height: 48px;
        vertical-align: top;
        border: none;
        display: inline-block;
        text-align: center;
        width: 180px;
    }
</style>
