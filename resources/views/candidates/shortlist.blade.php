@extends('layout.app')
@push('styles')
    <style>
        .active_mh{
            background-color: #141f72 !important;
            color: white !important;
        }
        .active_mh:hover{
            color: white !important;
        }
    </style>
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
                            <div class="manage-jobs-sec ml-3 mt-2">
                                <ul class="nav nav-tabs d-none d-lg-block d-xs-block d-md-block" id="myTab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active_mh" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="home" aria-selected="true">Yayında Olan
                                            İlanlarım</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab" aria-controls="profile" aria-selected="false">Yayında Olmayan İlanlarım</a>
                                    </li>
                                </ul>
                                <div class="row" style="margin-left: 15px;">
                                    <ul class="nav nav-tabs d-lg-none d-xs-none d-md-none" id="myTab" role="tablist">
                                        <li class="col-4 nav-item">
                                            <a class="nav-link active active_mh" id="home-tabMobile" data-toggle="tab" href="#home"
                                               role="tab" aria-controls="home" aria-selected="true"
                                               style="width: 180px; margin-left: -75px;font-size: 13px; background-color:transparent; padding: 5px;">Yayında
                                                Olan
                                                İlanlarım</a>
                                        </li>
                                        <li class=" col-4 nav-item">
                                            <a class=" nav-link" id="profile-tabMobile" data-toggle="tab" href="#profile"
                                               role="tab" aria-controls="profile" aria-selected="false"
                                               style="width: 196px; margin-left: -26px; font-size: 13px;background-color:transparent;padding: 5px;">Yayında Olmayan İlanlarım</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">

                                        @forelse($jobs as $job)
                                            <div class="job-listing wtabs  d-none d-lg-block d-xs-block d-md-block mb-2 mt-2"
                                                 style="border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 1rem;">
                                                    <a href="{{route('job.show',$job->slug)}}">
                                                        <div class="job-title-sec">
                                                            <div class="c-logo">
                                                                <img src="{{$job->cover_image}}" alt="{{$job->title}}"/>
                                                            </div>
                                                            <h3 class="pl-3">{{$job->title}}</h3>
                                                            <span class="pl-3">{{$job->category->name}}</span>
                                                            <div
                                                                class="job-lctn pl-3">{{$job->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </a>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-primary dropdown-toggle bg-primary"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Secenekler
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form method="POST"
                                                                  action="{{route('candidate.job.passive',$job)}}">
                                                                @csrf
                                                                @method('put')
                                                                <button class="dropdown-item">
                                                                    Yayından Kaldır
                                                                </button>
                                                            </form>
                                                            <a class="dropdown-item" href="{{route('job.edit',$job)}}">Düzenle</a>
                                                            <div class="dropdown-divider"></div>
                                                            <form method="POST"
                                                                  action="{{route('candidate.job.destroy',$job)}}">
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
                                                        <div class="card" style="width: 400px; flex-direction: row;">
                                                            <div class="col-3 px-0">
                                                                <a href="{{route('job.show',$job->slug)}}">
                                                                    <img src="{{$job->cover_image}}"
                                                                         alt="{{$job->title}}"/>
                                                                </a>
                                                            </div>

                                                        <div class="col-6 text-left pl-1"
                                                             style="
                                                                    overflow: hidden;
                                                                    white-space: nowrap;
                                                                    text-overflow: ellipsis;"
                                                        >
                                                            <a href="{{route('job.show',$job->slug)}}">
                                                            <h3 style="font-size: 16px;font-weight: bold">
                                                                 {{$job->title}}
                                                            </h3>
                                                            <div
                                                                class="job-lctn">{{$job->created_at->diffForHumans()}}</div>
                                                            </a>
                                                        </div>
                                                        <div class="col-2 px-0">
                                                            <div class="btn-group ml-3">
                                                                <button type="button"
                                                                        class="btn btn-primary dropdown-toggle bg-primary"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form method="POST"
                                                                          action="{{route('candidate.job.passive',$job)}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item">
                                                                            Yayından Kaldır
                                                                        </button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="{{route('job.edit',$job)}}">Düzenle</a>
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
                                         aria-labelledby="profile-tab">
                                        @forelse($endPubJobs as $endPubJob)
                                            <div class="job-listing wtabs d-none d-lg-block d-xs-block d-md-block mb-2 mt-2"
                                                 style="border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 1rem;">
                                                <div class="job-title-sec">
                                                    <a href="{{route('job.show',$endPubJob->slug)}}">
                                                    <div class="c-logo">
                                                        <img src="{{$endPubJob->cover_image}}"
                                                             alt="{{$endPubJob->title}}"/>
                                                    </div>
                                                    <h3 class="pl-3">{{$endPubJob->title}}</h3>
                                                    <span class="pl-3">{{$endPubJob->category->name}}</span>
                                                    <div
                                                        class="job-lctn pl-3">{{$endPubJob->created_at->diffForHumans()}}</div>
                                                    </a>
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
                                                              action="{{route('candidate.job.active',$endPubJob)}}">
                                                            @csrf
                                                            @method('put')
                                                            <button class="dropdown-item">
                                                                Tekrar Yayınla
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="{{route('job.edit',$endPubJob)}}">Düzenle</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                              action="{{route('candidate.job.destroy',$endPubJob)}}">
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
                                                        <div class="card" style="width: 400px; flex-direction: row;">
                                                            <div class="col-3 px-0">
                                                                <a href="{{route('job.show',$endPubJob->slug)}}">
                                                                    <img src="{{$endPubJob->cover_image}}"
                                                                         alt="{{$endPubJob->title}}"/>
                                                                </a>
                                                            </div>
                                                            <div class="col-6 text-left pl-1" style="
                                                                    overflow: hidden;
                                                                    white-space: nowrap;
                                                                    text-overflow: ellipsis;">
                                                                <a href="{{route('job.show',$endPubJob->slug)}}">
                                                                    <h3 style="font-size: 16px;font-weight: bold;">{{$endPubJob->title}}
                                                                    </h3>
                                                                    <div
                                                                        class="job-lctn">{{$endPubJob->created_at->diffForHumans()}}</div>
                                                                </a>
                                                            </div>
                                                            <div class="col-2 px-0">
                                                                <div class="btn-group ml-3">
                                                                    <button type="button"
                                                                            class="btn btn-primary dropdown-toggle bg-primary"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form method="POST"
                                                                              action="{{route('candidate.job.active',$endPubJob)}}">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="dropdown-item">
                                                                                Tekrar Yayınla
                                                                            </button>
                                                                        </form>
                                                                        <a class="dropdown-item"
                                                                           href="{{route('job.edit',$endPubJob)}}">Düzenle</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <form method="POST"
                                                                              action="{{route('candidate.job.destroy',$endPubJob)}}">
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
                                            </div>
                                        @empty
                                            <p class="text-center mx-auto">
                                                Bu Sayfada süresi geçmiş ilanınız bulunmamakta.
                                            </p>
                                        @endforelse
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
    <script>
        function myFunction() {
            if (confirm("Silmek İstediğinize Eminmisiniz?")) {

            } else {
                return false;
            }
        }
    </script>
    <script>
        $('body').on('click','#home-tab',function (){
            $("#profile-tab").removeClass("active_mh");
            $("#home-tab").addClass("active_mh");
        })
        $('body').on('click','#profile-tab',function (){
            $("#home-tab").removeClass("active_mh");
            $("#profile-tab").addClass("active_mh");
        })
        $('body').on('click','#home-tabMobile',function (){
            $("#profile-tabMobile").removeClass("active_mh");
            $("#home-tabMobile").addClass("active_mh");
        })
        $('body').on('click','#profile-tabMobile',function (){
            $("#home-tabMobile").removeClass("active_mh");
            $("#profile-tabMobile").addClass("active_mh");
        })
    </script>
@endpush
