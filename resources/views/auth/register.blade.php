@extends('layout.app')


@section('content')

    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Register</h3>
                                <span>Keep up to date with the latest news</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="#" title="">Home</a></li>
                                    <li><a href="#" title="">Pages</a></li>
                                    <li><a href="#" title="">Register</a></li>
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
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>Sign Up</h3>
                                <span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
                                <div class="select-user">
                                    <span>Candidate</span>
                                    <span>Employer</span>
                                </div>
                                <form method="post" action="{{route('register.custom')}}" autocomplete="off">
                                    @csrf
                                    <div class="cfield">
                                        <input name="name" type="text" placeholder="Name" />
                                        <i class="la la-user"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="password" type="password" placeholder="Şifre" autocomplete="new-password"/>
                                        <i class="la la-key"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="email" type="text" placeholder="Email"  autocomplete="off"/>
                                        <i class="la la-envelope-o"></i>
                                    </div>
                                    <div class="dropdown-field">
                                        <select data-placeholder="Please Select Specialism" class="chosen">
                                            <option>Web Development</option>
                                            <option>Web Designing</option>
                                            <option>Art & Culture</option>
                                            <option>Reading & Writing</option>
                                        </select>
                                    </div>
                                    <div class="cfield">
                                        <input name="phone" type="text" placeholder="Phone Number" />
                                        <i class="la la-phone"></i>
                                    </div>
                                    <button type="submit">Signup</button>
                                </form>
                                <div class="extra-login">
                                    <span>Or</span>
                                    <div class="login-social">
                                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
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
