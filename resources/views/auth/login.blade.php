@extends('layout.app')


@section('content')

    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Login</h3>
                                <span>Keep up to date with the latest news</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="#" title="">Home</a></li>
                                    <li><a href="#" title="">Pages</a></li>
                                    <li><a href="#" title="">Login</a></li>
                                </ul>
                            </div>
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
                                <span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
                                <form action="{{route('login.custom')}}" method="POST">
                                    @csrf
                                    <div class="cfield">
                                        <input name="email" type="email" placeholder="Email Adresiniz" required/>
                                        <i class="la la-user"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <div class="cfield">
                                        <input type="password" name="password" placeholder="********" required/>
                                        <i class="la la-key"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <p class="remember-label">
                                        <input type="checkbox" name="remember" id="cb1"><label for="cb1">Remember me</label>
                                    </p>
                                    <a href="#" title="">Forgot Password?</a>
                                    <button type="submit">Login</button>
                                </form>
                                <div class="extra-login">
                                    <span>Or</span>
                                    <div class="login-social">
                                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
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
