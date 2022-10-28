@extends('layout.app')


@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
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
                                                <a href="{{route('candidate.profile')}}" title="">
                                                    <i class="la la-user"></i>
                                                    <span>Profilim</span>
                                                    <p>Profilini Görüntüle</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.shortlist')}}" title="">
                                                    <i class="la la-file-text"></i>
                                                    <span>İlanlarım</span>
                                                    <p> {{$user->jobs->count()}} Başvuru</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.applied_jobs')}}" title="">
                                                    <i class="la la-hand-paper-o"></i>
                                                    <span>İletişime geçtiğim ilanlar</span>
                                                    <p> {{$user->appliedJobs->count()}} Başvuru</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.payment')}}" title="">
                                                    <i class="la la-money"></i>
                                                    <span>Ödeme geçmişim</span>
                                                    <p>{{$user->transactions->count()}} işlem</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="p-category">
                                                <a href="{{route('candidate.change_password')}}" title="">
                                                    <i class="la la-lock"></i>
                                                    <span>Şifre değiştir</span>
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
