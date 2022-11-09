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
                                <h3 class="text-center">İletişime geçtiğim ilanlar</h3>

                                    <div class="row">
                                        @forelse($appliedJobs as $job)
                                        <div class="col-12 col-md-4 mb-1 mt-1">
                                            <a href="{{route('job.show',$job->job->slug)}}">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="{{$job->job->cover_image}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$job->job->user->name}}</h5>
                                                    <p class="card-text">{{$job->job->title}}</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">  @if(optional($job->job->district)->name)
                                                            {{$job->job->district->name}},
                                                        @endif
                                                        {{$job->job->city->name}}</li>
                                                    <li class="list-group-item">{{$job->job->created_at->diffForHumans()}}</li>
                                                </ul>
                                            </div>
                                            </a>
                                        </div>
                                        @empty
                                            <p class="text-center mx-auto" style="min-height: 400px">Hiçbir ilana başvurmadınız.
                                                <br>
                                                <a href="{{route('job.index')}}" class="text-primary mx-auto">
                                                    İlanları gör
                                                </a>
                                            </p>

                                        @endforelse
                                    </div>

{{--                                                                            <tr>--}}
{{--                                            <td width="20%">--}}
{{--                                                <a href="{{route('job.show',$job->job->slug)}}">--}}
{{--                                                <div class="table-list-title">--}}
{{--                                                    <i>{{$job->job->user->name}}</i><br />--}}
{{--                                                    <span><i class="la la-map-marker"></i>--}}
{{--                                                         @if(optional($job->job->district)->name)--}}
{{--                                        {{$job->job->district->name}},--}}
{{--                                                        @endif--}}
{{--                                    {{$job->job->city->name}}--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td width="60%">--}}
{{--                                <div class="table-list-title">--}}
{{--                                    <h3><a href="{{route('job.show',$job->job->slug)}}" title="">{{$job->job->title}}</a></h3>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td width="20%">--}}
{{--                                                <span>{{$job->job->created_at->diffForHumans()}}</span><br />--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

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
