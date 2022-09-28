@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="inner-header mb-20">
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <h3>Change Password</h3>
                                <div class="change-password">

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="{{route('change_password_post')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Önceki Şifre</span>
                                                <div class="pf-field">
                                                    <input name="old_password" type="password" />
                                                </div>
                                                <span class="pf-title">Yeni Şifre</span>
                                                <div class="pf-field">
                                                    <input name="new_password" type="password" />
                                                </div>
                                                <span class="pf-title">Yeni Şifre Tekrar</span>
                                                <div class="pf-field">
                                                    <input name="new_password_confirmation" type="password" />
                                                </div>
                                                <button type="submit">Güncelle</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <i class="la la-key big-icon"></i>
                                            </div>
                                        </div>
                                    </form>
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

    <script src="{{asset('assets/js/circle-progress.min.js')}}" type="text/javascript"></script>
@endpush
