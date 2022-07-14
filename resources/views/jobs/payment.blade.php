@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome Tera Planer</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    <aside class="col-lg-3 column border-right">
                        @auth
                            <div class="widget">
                                <div class="tree_widget-sec">
                                    <ul>
                                        <li><a href="employer_profile.html" title=""><i class="la la-file-text"></i>Company
                                                Profile</a></li>
                                        <li><a href="employer_manage_jobs.html" title=""><i class="la la-briefcase"></i>Manage
                                                Jobs</a></li>
                                        <li><a href="employer_transactions.html" title=""><i class="la la-money"></i>Transactions</a>
                                        </li>
                                        <li><a href="employer_resume.html" title=""><i class="la la-paper-plane"></i>Resumes</a>
                                        </li>
                                        <li><a href="employer_packages.html" title=""><i class="la la-user"></i>Packages</a>
                                        </li>
                                        <li><a href="employer_post_new.html" title=""><i class="la la-file-text"></i>Post
                                                a
                                                New Job</a></li>
                                        <li><a href="employer_job_alert.html" title=""><i class="la la-flash"></i>Job
                                                Alerts</a>
                                        </li>
                                        <li><a href="employer_change_password.html" title=""><i class="la la-lock"></i>Change
                                                Password</a></li>
                                        <li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endauth
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Yeni İş İlanı Ver</h3>
                                <div class="steps-sec">
                                    <div class="step " id="step_1" next="step_2">
                                        <p><i class="la la-info"></i></p>
                                        <span>İş Detayı</span>
                                    </div>
                                    <div class="step active" id="step_2" next="step_3" prev="step_1">
                                        <p><i class="la la-cc-mastercard"></i></p>
                                        <span>Paket Seçimi ve Ödeme</span>
                                    </div>
                                    <div class="step" id="step_3" prev="step_2">
                                        <p><i class="la  la-check-circle"></i></p>
                                        <span>İlanınız Yayında!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-form-edit mb-5 " id="step_1_div">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif

                                5890040000000016
                                <div class="text-center alert" id="responseMessageJobPost"></div>
                                {!! $form !!}
                                <div id="iyzipay-checkout-form" class="responsive my-5"></div>
                                <div id="ucs-cards"></div>
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.css')}}"/>
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
@endpush
