@extends('layout.app')
@push('styles')
@endpush

@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div>
        </div>
    </section>

    <section class="mt-5" style="margin-bottom: 100px">
        <div class="block remove-top">
            <div class="container px-1">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec ml-3 mt-5">

                                <ul class="nav nav-tabs d-none d-lg-block d-xs-block d-md-block" id="myTab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="home" aria-selected="true">Yayında Olan
                                            İlanlarım</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab" aria-controls="profile" aria-selected="false">Süresi Geçmiş
                                            İlanlarım</a>
                                    </li>
                                </ul>
                                <div class="row" style="margin-right: 15px">
                                    <ul class="nav nav-tabs d-lg-none d-xs-none d-md-none" id="myTab" role="tablist">
                                        <li class="col-4 nav-item">
                                            <a class=" nav-link" id="home-tab" data-toggle="tab" href="#home"
                                               role="tab" aria-controls="home" aria-selected="true"
                                               style="width: 180px; margin-left: -75px;font-size: 14px; background-color:transparent; padding: 5px;">Yayında
                                                Olan
                                                İlanlarım</a>
                                        </li>
                                        <li class=" col-4 nav-item">
                                            <a class=" nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               role="tab" aria-controls="profile" aria-selected="false"
                                               style="width: 180px; margin-left: -20px; font-size: 14px;background-color:transparent;padding: 5px;">Süresi
                                                Geçmiş
                                                İlanlarım</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">    @forelse($jobs as $job)
                                            <div class="job-listing wtabs  d-none d-lg-block d-xs-block d-md-block">
                                                <div class="job-title-sec">
                                                    <div class="c-logo">
                                                        <img src="{{$job->cover_image}}" alt="{{$job->title}}"/>
                                                    </div>
                                                    <h3 class="pl-3"><a href="#" title="">{{$job->title}}</a></h3>
                                                    <span class="pl-3">{{$job->category->name}}</span>
                                                    <div
                                                        class="job-lctn pl-3">{{$job->created_at->diffForHumans()}}</div>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-primary dropdown-toggle bg-primary"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Secenekler
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form method="POST"
                                                              action="{{route('candidate.job.passive',$job->id)}}">
                                                            @csrf
                                                            @method('put')
                                                            <button class="dropdown-item">
                                                                Yayından Kaldır
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="#">Düzenle</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                              action="{{route('candidate.job.destroy',$job->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button onclick="return myFunction()"
                                                                    class="dropdown-item bg-danger text-white">
                                                                Sil
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-listing wtabs  d-lg-none d-xs-none d-md-none">
                                                <div class="job-title-sec">
                                                    <div class="row">
                                                        <div class="col-3 px-0">
                                                            <img src="{{$job->cover_image}}" alt="{{$job->title}}"/>
                                                        </div>
                                                        <div class="col-6 text-left pl-1"
                                                             style="
                                                                    overflow: hidden;
                                                                    white-space: nowrap;
                                                                    text-overflow: ellipsis;"
                                                        >
                                                            <h3><a href="#" title=""
                                                                   style="font-size: 16px;font-weight: bold"
                                                                 >{{$job->title}}</a>
                                                            </h3>
                                                            <div
                                                                class="job-lctn">{{$job->created_at->diffForHumans()}}</div>
                                                        </div>
                                                        <div class="col-2 px-0">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                        class="btn btn-primary dropdown-toggle bg-primary"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form method="POST"
                                                                          action="{{route('candidate.job.passive',$job->id)}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item">
                                                                            Yayından Kaldır
                                                                        </button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="#">Düzenle</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <form method="POST"
                                                                          action="{{route('candidate.job.destroy',$job->id)}}">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button onclick="return myFunction()"
                                                                                class="dropdown-item bg-danger text-white">
                                                                            Sil
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        @empty
                                            <div class="mx-auto text-center">
                                                <p class="text-center mx-auto">
                                                    İlanınız bulunmamakta.
                                                    <a style="text-align: center;color: dodgerblue"
                                                       href="{{route('job.create')}}">
                                                        İlan Ver
                                                    </a>
                                                </p>
                                            </div>
                                        @endforelse</div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">@forelse($endPubJobs as $endPubJob)
                                            <div class="job-listing wtabs d-none d-lg-block d-xs-block d-md-block">
                                                <div class="job-title-sec">
                                                    <div class="c-logo">
                                                        <img src="{{$endPubJob->cover_image}}"
                                                             alt="{{$endPubJob->title}}"/>
                                                    </div>
                                                    <h3 class="pl-3"><a href="#" title="">{{$endPubJob->title}}</a></h3>
                                                    <span class="pl-3">{{$endPubJob->category->name}}</span>
                                                    <div
                                                        class="job-lctn pl-3">{{$endPubJob->created_at->diffForHumans()}}</div>
                                                </div>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-primary dropdown-toggle bg-primary"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Secenekler
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form method="POST"
                                                              action="{{route('candidate.job.active',$endPubJob->id)}}">
                                                            @csrf
                                                            @method('put')
                                                            <button class="dropdown-item">
                                                                Tekrar Yayınla
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="#">Düzenle</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                              action="{{route('candidate.job.destroy',$endPubJob->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button onclick="return myFunction()"
                                                                    class="dropdown-item bg-danger text-white">
                                                                Sil
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-listing wtabs  d-lg-none d-xs-none d-md-none">
                                                <div class="job-title-sec">
                                                    <div class="row">
                                                        <div class="col-3 px-0">
                                                            <img src="{{$endPubJob->cover_image}}"
                                                                 alt="{{$endPubJob->title}}"/>
                                                        </div>
                                                        <div class="col-6 text-left pl-1" style="
                                                                    overflow: hidden;
                                                                    white-space: nowrap;
                                                                    text-overflow: ellipsis;">
                                                            <h3><a href="#" title=""
                                                                   style="font-size: 16px;font-weight: bold;">{{$endPubJob->title}}</a>
                                                            </h3>
                                                            <div
                                                                class="job-lctn">{{$endPubJob->created_at->diffForHumans()}}</div>
                                                        </div>
                                                        <div class="col-2 px-0">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                        class="btn btn-primary dropdown-toggle bg-primary"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form method="POST"
                                                                          action="{{route('candidate.job.active',$endPubJob->id)}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item">
                                                                            Tekrar Yayınla
                                                                        </button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="#">Düzenle</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <form method="POST"
                                                                          action="{{route('candidate.job.destroy',$endPubJob->id)}}">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button onclick="return myFunction()"
                                                                                class="dropdown-item bg-danger text-white">
                                                                            Sil
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center mx-auto">
                                                Bu Sayfada süresi geçmiş ilanınız bulunmamakta.
                                            </p>
                                        @endforelse</div>
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
    <script>
        function myFunction() {
            if (confirm("Silmek İstediğinize Eminmisiniz?")) {

            } else {
                return false;
            }
        }
    </script>
@endpush
