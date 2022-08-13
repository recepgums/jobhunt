@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
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
                                <h3>Başvurulan İlanlar</h3>
                                <table>
                                    <tbody>
                                    @forelse($jobs as $job)
                                        <tr>
                                            <td width="20%">
                                                <div class="table-list-title">
                                                    <i>{{$job->job->user->name}}</i><br />
                                                    <span><i class="la la-map-marker"></i>
                                                         @if(optional($job->job->district)->name)
                                                            {{$job->job->district->name}},
                                                        @endif
                                                        {{$job->job->city->name}}
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="60%">
                                                <div class="table-list-title">
                                                    <h3><a href="{{route('job.show',$job->job->slug)}}" title="">{{$job->job->title}}</a></h3>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <span>{{$job->job->created_at->diffForHumans()}}</span><br />
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
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
