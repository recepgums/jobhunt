@extends('layout.app')


@section('content')
    <section class="overlape">
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
                                <h3>Candidates Dashboard</h3>
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="{{route('candidate.applied_jobs')}}" title="">
                                                    <i class="la la-briefcase"></i>
                                                    <span>Applied Job</span>
                                                    <p>14 Applications</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category view-resume-list">
                                                <a href="#" title="">
                                                    <i class="la la-eye"></i>
                                                    <span>View Resume</span>
                                                    <p>22 View Statistic</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="#" title="">
                                                    <i class="la la-file-text "></i>
                                                    <span>My Resume</span>
                                                    <p>Create New Resume</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="#" title="">
                                                    <i class="la la-check"></i>
                                                    <span>Appropriate For Me</span>
                                                    <p>(05 Jobs)</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category follow-companies-popup">
                                                <a href="#" title="">
                                                    <i class="la la-user"></i>
                                                    <span>Follow Companies</span>
                                                    <p>56 Companies</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="p-category">
                                                <a href="#" title="">
                                                    <i class="la la-file"></i>
                                                    <span>My Profile</span>
                                                    <p>View Profile</p>
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
