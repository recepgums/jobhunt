@extends('layout.app')

@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column">
                        <div class="job-single-sec style3">
                            <div class="job-wide-devider">
                                <div class="job-overview divide">
                                    <h3>{{$user->name }} </h3>
                                    <ul>
                                        <li><i class="la la-file-text"></i><h3>Toplam iş ilanı</h3><span>{{count($jobs)}}</span></li>
                                        @foreach($cities as $city)
                                            @if($user->city_id == $city->id)
                                                <li><i class="la la-map"></i><h3>Konum</h3><span>{{$city->name}}</span></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="job-details">
                                    {!! $user->about !!}
                                </div>
                                <div class="recent-jobs">
                                    <h3>İş İlanları</h3>
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
                            <div class="job-thumb"><img
                                    src="{{strlen($user->getFirstMediaUrl('images')) > 0 ? $user->getFirstMediaUrl('images') : 'https://placehold.jp/1600x800'}}"
                                    alt=""/></div>
                            <div class="job-head-info">
                                <h4>{{$user->name}}</h4>
                                @foreach($cities as $city)
                                    @if($user->city_id == $city->id)
                                        <span>{{$city->name}}</span>
                                    @endif
                                @endforeach
                                <p><i class="la la-unlink"></i><a href="{{route('homepage')}}">www.jobhunt.com</a></p>
                                <p><i class="la la-phone"></i><a href="tel:{{$user->phone}}">{{$user->phone}}</a></p>
                                <p><i class="la la-envelope-o"></i><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
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
    <script src="{{asset('assets/js/rslider.js')}}" type="text/javascript"></script>
@endpush
