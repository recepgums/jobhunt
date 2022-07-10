@extends('layout.app')


@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Company Name </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column">
                        <div class="job-single-sec">
                            <div class="job-single-head2">
                                <div class="job-title2"><h3>{{$job->title}}</h3><span class="job-is ft">Full time</span><i class="la la-heart-o"></i></div>
                                <ul class="tags-jobs">
                                    <li><i class="la la-map-marker"></i> Sacramento, California</li>
                                    <li><i class="la la-money"></i> Monthly Salary : <span>$3000 - $5000</span></li>
                                    <li><i class="la la-calendar-o"></i> Post Date: {{$job->created_at->diffForHumans()}}</li>
                                </ul>
                                <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span>
                            </div><!-- Job Head -->
                            <div class="job-details">
                                {!! $job->description !!}
                            </div>
                            <div class="job-overview">
                                <h3>Job Overview</h3>
                                <ul>
                                    <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
                                    <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
                                    <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
                                    <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
                                    <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
                                    <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
                                </ul>
                            </div><!-- Job Overview -->
                            <div class="share-bar">
                                <span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column">
                        <div class="job-single-head style2">
                            <div class="job-thumb"> <img src="https://place-hold.it/124x124" alt="" /> </div>
                            <div class="job-head-info">
                                <h4>Tix Dog</h4>
                                <span>274 Seven Sisters Road, London, N4 2HY</span>
                                <p><i class="la la-unlink"></i> www.jobhunt.com</p>
                                <p><i class="la la-phone"></i> +90 538 963 54 87</p>
                                <p><i class="la la-envelope-o"></i> ali.tufan@jobhunt.com</p>
                            </div>
                            <a href="#" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Apply for job</a>
                            <a href="#" title="" class="apply-job-linkedin"><i class="la la-linkedin"></i>Apply with Linkedin</a>
                            <a href="#" title="" class="viewall-jobs">View all Jobs</a>
                        </div><!-- Job Head -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
