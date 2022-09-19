@extends('layout.app')


@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome {{$user->name}}</h3>
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
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.applied_jobs')}}" title="">
                                                    <i class="la la-briefcase"></i>
                                                    <span>Başvurulan İş İlanları</span>
                                                    <p>14 Başvuru</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.change_password')}}" title="">
                                                    <i class="la la-user"></i>
                                                    <span>Şifre Değiştir</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.profile')}}" title="">
                                                    <i class="la la-file"></i>
                                                    <span>Profilim</span>
                                                    <p>Profilini Görüntüle</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
