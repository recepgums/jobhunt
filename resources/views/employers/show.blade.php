@extends('layout.app')

@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Tix Dog</h3>
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
                        <div class="job-single-sec style3">
                            <div class="job-wide-devider">
                                <div class="job-overview divide">
                                    <h3>{{$user->name }} </h3>
                                    <ul>
                                        <li><i class="la la-eye"></i><h3>Viewed </h3><span>164</span></li>
                                        <li><i class="la la-file-text"></i><h3>Toplam iş ilanı</h3><span>4</span></li>
                                        <li><i class="la la-map"></i><h3>Konumları</h3><span>United States, San Diego</span></li>
                                    </ul>
                                </div>
                                <div class="job-details">
                                    {!! $user->about !!}
                                </div>
                                <div class="recent-jobs">
                                    <h3>Jobs from Business Network</h3>
                                    <div class="job-list-modern">
                                        <div class="job-listings-sec no-border">
                                            @forelse($jobs as $job)
                                                <div class="job-listing wtabs noimg">
                                                    <div class="job-title-sec">
                                                        <h3><a href="{{route('job.show',$job->slug)}}">{{$job->title}}</a></h3>
                                                        <span>Massimo Artemisis</span>
                                                        <div class="job-lctn"><i class="la la-map-marker"></i>
                                                            @if(optional($job->district)->name)
                                                                {{$job->district->name}},
                                                            @endif
                                                            {{$job->city->name}}
                                                        </div>
                                                    </div>
                                                    <div class="job-style-bx">
                                                        <span class="job-is ft">
                                                            {{optional($job->workType)->name}}
                                                        </span>
                                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                        <i>
                                                            {{$job->created_at->diffForHumans()}}
                                                        </i>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
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
                            <div class="share-bar">
                                <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="emply-btns">
                                <a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a>
                                <a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a>
                            </div>
                        </div><!-- Job Head -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/rslider.js')}}" type="text/javascript"></script>
@endpush
