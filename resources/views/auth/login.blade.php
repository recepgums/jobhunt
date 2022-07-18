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
                        <div class="account-popup-area signin-popup-box static">
                            <div class="account-popup">
                                <h3>Giriş Yap</h3>
                                @if($errors->any())
                                    {!! implode('', $errors->all('<div class="col-12 text-left text-danger">:message</div>')) !!}
                                @endif
                                <form action="{{route('login.custom')}}" method="POST">
                                    @csrf
                                    <div class="cfield">
                                        <input name="email" type="email" placeholder="Email Adresiniz" required/>
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

                                    <a href="#" title="">Şifremi unuttum</a>

                                    <button type="submit">Giriş Yap</button>
                                </form>

                                <div class="extra-login">
                                    <span>Ya da</span>
                                    <div class="login-social">
                                        <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i class="fa fa-google"></i></a>
                                    </div>
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
