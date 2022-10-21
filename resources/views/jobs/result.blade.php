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
{{--                            <h3>Welcome Tera Planer</h3>--}}
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
                    <div class="col-lg-10 mx-auto column">
                        <section>
                            <div class="block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading">
                                                <h2>Ödeme Sonucunuz</h2>
                                                <span>Paranız çekildiği halde işlemin başarısız olduğunu düşünüyorsanız bizimle
                                                    <a style="color: dodgerblue"
                                                       href="{{route('contact')}}">İletişime</a> geçebilirsiniz.
                                                </span>
                                            </div><!-- Heading -->

                                            <div class="plans-sec">
                                                <div class="row p-0">
                                                    <div class="col-md-9 col-sm-12 mx-auto">
                                                        @if ($errors->any())
                                                            @foreach ($errors->all() as $error)
                                                                <div class="alert alert-primary" role="alert">
                                                                    {{$error}}
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @isset($success)
                                                            <div class="alert alert-success" role="alert">
                                                                {{$success}}
                                                            </div>

                                                          @if(env('GOOGLE_REKLAMI_ACIK_MI',false))

                                                                    <div class="alert alert-primary mx-auto row" role="alert">
                                                                        <div class="col-sm-7">
                                                                            <img src="{{asset('assets/images/google-reklam.png')}}"
                                                                                 style="width: 400px">
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            İlanınızı Google'da
                                                                            @if(optional($job->category)->name)
                                                                                <b>
                                                                                    {{optional($job->category)->name}}
                                                                                </b>
                                                                            @endif
                                                                            aratan herkese gözükmesi iş ilanınıza 4 kat daha fazla kişinin başvurmasını sağlar
                                                                            <br><br>
                                                                            <a href="" class="btn-primary text-white btn float-right"> Google reklamı ver</a>
                                                                        </div>
                                                                    </div>

                                                                @endif
                                                                    <div class="job-grid-sec mt-2 card p-3" style="background-color: #eee">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="job-single-sec">
                                                                            <div class="swiper mySwiper">
                                                                                <div class="swiper-wrapper">
                                                                                    @forelse($job->getMedia('images') as $media)
                                                                                        @if(str_contains($media->mime_type,"image"))
                                                                                            <div class="swiper-slide">
                                                                                                <img src="{{$media->getUrl()}}" alt="">
                                                                                            </div>
                                                                                        @else
                                                                                            <div class="swiper-slide">
                                                                                                <video width="320" height="240" controls>
                                                                                                    <source src="{{$media->getUrl()}}" type="video/mp4">
                                                                                                    Your browser does not support the video tag.
                                                                                                </video>
                                                                                            </div>
                                                                                        @endif
                                                                                    @empty
                                                                                    @endforelse
                                                                                </div>
                                                                                <div class="swiper-button-next"></div>
                                                                                <div class="swiper-button-prev"></div>
                                                                                <div class="swiper-pagination"></div>
                                                                            </div>

                                                                            <div class="job-single-head2">
                                                                                <div class="job-title2 pt-3">
                                                                                    <h2>{{$job->title}}</h2>
                                                                                    {{--                                    <span class="job-is ft">{{$job->workType->name}}</span>--}}
                                                                                </div>
                                                                                <ul class="tags-jobs">
                                                                                    <li>
                                                                                        <i class="la la-map-marker"></i> @if(optional($job->district)->name) {{$job->district->name}}
                                                                                        , @endif {{$job->city->name}}</li>
                                                                                    @if($job->fee)
                                                                                        <li>
                                                                                            <i class="la la-money"></i> Aylık Maaş : <span>{{$job->fee}} ₺</span>
                                                                                        </li>
                                                                                    @endif

                                                                                    @if(optional($job->category)->name)
                                                                                        <li>
                                                                                            <i class="la la-calendar-o"></i>
                                                                                            {{optional($job->category)->name}}
                                                                                        </li>
                                                                                    @endif
                                                                                    <li>
                                                                                        <i class="la la-calendar-o"></i>
                                                                                        Yayınlanma Tarihi:
                                                                                        {{$job->created_at->diffForHumans()}}
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="job-details" style="border-bottom: 1px solid #e8ecec;padding-bottom: 10px">
                                                                                {!! $job->description !!}
                                                                            </div>
                                                                            <div class="job-overview">
                                                                                <ul>
                                                                                    @if($job->fee)
                                                                                        <li><i class="la la-money"></i>
                                                                                            <h3>Teklif Edilen Maaş</h3><span>{{$job->fee}}₺</span></li>
                                                                                    @endif
                                                                                    @if(optional($job->gender)->name)
                                                                                        <li><i class="la la-mars-double"></i>
                                                                                            <h3>Cinsiyet</h3><span>{{$job->gender->name}}</span></li>
                                                                                    @endif
                                                                                    @if(optional($job->category)->name)
                                                                                        <li><i class="la la-puzzle-piece"></i>
                                                                                            <h3>Rol</h3><span>{{optional($job->category)->name}}</span></li>
                                                                                    @endif

                                                                                    @if(optional($job->workType)->name)
                                                                                        <li><i class="la la-clock-o"></i>
                                                                                            <h3>Çalışma Türü</h3><span>{{$job->workType->name}}</span></li>
                                                                                    @endif

                                                                                    <li><i class="la la-location-arrow"></i>
                                                                                        <h3>Konum</h3><span>@if(optional($job->district)->name) {{$job->district->name}}
                                                                                            , @endif {{$job->city->name}}</span></li>
                                                                                    <li><i class="la la-hand-paper-o"></i>
                                                                                        <h3>Sözleşme</h3><span>@if($job->has_contract) Var @else Yok @endif</span></li>
                                                                                    <li><i class="la la-eye"></i>
                                                                                        <h3>İletişime Geçen Kişi Sayısı</h3><span>{{$job->view_counter}}</span></li>

                                                                                </ul>
                                                                                <a href="{{route('job.show',$job->slug)}}"
                                                                                   title="">İlanı Görüntüle</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endisset
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/tag.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/maps3.js')}}" type="text/javascript"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>

    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.css')}}"/>
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                format: 'mm-dd-yyyy'
            });
        });
    </script>


    <script>
        function cityChangedMethod(element) {
            let url = '{{ route("city.districts", ":city") }}';
            url = url.replace(':city', element.value);

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    let html = '<select name="district_id" data-placeholder="İlçe Seçin" class="chosen-city">';

                    $.each(response, function (key, value) {
                        html += `<option value="${value.id}">${value.name}</option>`
                    });

                    html += '</select>';

                    $("#districtSelect").html(html)

                    $('.chosen-city').trigger("chosen:updated");
                }
            });
        }

    </script>
@endpush
