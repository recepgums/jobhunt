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
                            <div class="container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overlape">
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cand-single-user">
                            <div class="share-bar circle">
                            </div>
                            <div class="can-detail-s">
                                <div class="cst"><img style="width: 150px;height: 150px"
                                                      src="{{strlen($user->getFirstMediaUrl('images')) > 0 ? $user->getFirstMediaUrl('images') : 'https://placehold.jp/1600x800'}}"
                                                      alt=""/></div>
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->email}}</p>
                                <p>Üyelik Tarihi, {{$user->created_at->format('Y')}}</p>
                                @foreach($cities as $city)
                                    @if($user->city_id == $city->id)
                                        <p><i class="la la-map-marker"></i>{{$city->name}}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="download-cv">
                            </div>
                        </div>
                        <ul class="cand-extralink">
                            <li><a href="#about" title="">About</a></li>
                            <li><a href="#education" title="">Education</a></li>
                            <li><a href="#experience" title="">Work Experience</a></li>
                            <li><a href="#portfolio" title="">Portfolio</a></li>
                            <li><a href="#skills" title="">Professional Skills</a></li>
                            <li><a href="#awards" title="">Awards</a></li>
                        </ul>
                        <div class="cand-details-sec">
                            <div class="row">
                                <div class="col-lg-8 column">
                                    <div class="cand-details" id="about">
                                        <h2>Aday Hakkında</h2>
                                        <p>{{$user->about}} </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 column">
                                    <div class="job-overview">
                                        <h3>İşe Genel Bakış</h3>
                                        <ul>
                                            <li><i class="la la-money"></i>
                                                <h3>Maaş Beklentisi</h3><span>{{$user->expected_salary}} ₺</span></li>
                                            <li><i class="la la-mars-double"></i>
                                                <h3>Yaşı</h3><span>{{$user->age}}</span></li>
                                            <li><i class="la la-sort-numeric-asc"></i>
                                                <h3>Numarası</h3><span>{{$user->phone}}</span></li>
                                            <li><i class="la la-puzzle-piece"></i>
                                                <h3>Çalışmaya Açık mı ?</h3><span>
                                                    @if($user->is_searchable_for_job == 0)
                                                        Hayır
                                                    @else
                                                        Evet
                                                    @endif
                                                </span></li>
                                            <li><i class="la la-shield"></i>
                                                <h3>Deneyim Yılı</h3><span>{{$user->experience_year}}</span></li>
                                            <li><i class="la la-line-chart "></i>
                                                <h3>Aradığı iş türü</h3>
                                                    @foreach ($user->categories as $categories)
                                                        <span>{{$categories->category->name}}</span>
                                                    @endforeach
                                                </li>
                                        </ul>
                                    </div><!-- Job Overview -->
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
    <script src="{{asset('assets/js/rslider.js')}}" type="text/javascript"></script>
@endpush
