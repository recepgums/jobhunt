@extends('layout.app')
@push('styles')
@endpush

@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            {{--                            <h3>Welcome Ali TUFAN</h3>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <ul class="nav nav-tabs m-3" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-toggle="tab"
                                                data-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">Yayında olan ilanlarım
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-toggle="tab"
                                                data-target="#profile" type="button" role="tab" aria-controls="profile"
                                                aria-selected="false">Süresi geçmiş ilanlarım
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                                data-target="#contact" type="button" role="tab" aria-controls="contact"
                                                aria-selected="false">Ödemesi bekleyen ilanlarım
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active ml-3" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">                                @forelse($jobs as $job)
                                            <div class="job-listing wtabs">
                                                <div class="job-title-sec">
                                                    <div class="c-logo">
                                                        <img src="{{$job->cover_image}}" alt="{{$job->title}}"/>
                                                    </div>
                                                    <h3><a href="#" title="">{{$job->title}}</a></h3>
                                                    <span>{{$job->category->name}}</span>
                                                    <div class="job-lctn">{{$job->created_at->diffForHumans()}}</div>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-primary dropdown-toggle bg-primary"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Secenekler
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Aç</a>
                                                        <a class="dropdown-item" href="#">Düzenle</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item bg-danger text-white" href="#">Sil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center mx-auto">
                                                İlanınız bulunmamakta.
                                                <a style="text-align: center" href="{{route('job.create')}}" title=""
                                                   class="post-job-btn active mx-auto">
                                                    <i class="la la-plus"></i>
                                                    İlan Ver
                                                </a>
                                            </p>
                                        @endforelse
                                    <div class="tab-pane fade ml-3" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">@forelse($endPubJobs as $endPubJob)
                                                <div class="job-listing wtabs">
                                                    <div class="job-title-sec">
                                                        <div class="c-logo">
                                                            <img src="{{$endPubJob->cover_image}}" alt="{{$endPubJob->title}}"/>
                                                        </div>
                                                        <h3><a href="#" title="">{{$endPubJob->title}}</a></h3>
                                                        <span>{{$endPubJob->category->name}}</span>
                                                        <div
                                                            class="job-lctn">{{$endPubJob->created_at->diffForHumans()}}</div>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-primary dropdown-toggle bg-primary"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Secenekler
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Aç</a>
                                                            <a class="dropdown-item" href="#">Düzenle</a>
                                                            <a class="dropdown-item" href="#">Yeniden yayınla</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item bg-danger text-white"
                                                               href="#">Sil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        @empty
                                            <p class="text-center mx-auto">
                                          Bu  Sayfada  süresi geçmiş  ilanınız bulunmamakta.
                                            </p>
                                        @endforelse
                                    </div>
                                    <div class="tab-pane fade ml-3" id="contact" role="tabpanel"
                                         aria-labelledby="contact-tab">Ödemesi bekleyen ilanlarım
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
