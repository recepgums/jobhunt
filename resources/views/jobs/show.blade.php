@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/bo-slider.min.css')}}" />
@endpush
@section('content')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header d-none d-md-block">
                            <h3>{{$job->user?->company_name}}</h3>
                        </div>

                        <div class="inner-header d-block d-md-none" >
                            <h3 style="width: 100%;float: initial" class="mx-auto">{{$job->user?->company_name}}</h3>
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
                            @if($job->getFirstMedia('images'))
                                <div class="card-title mx-auto text-center">
                                    <ul class="bo-slider">
                                        @forelse($job->getMedia('images') as $media)
                                            <li data-url="{{$media->getUrl()}}" data-type="image"></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif


                            <div class="job-single-head2">
                                <div class="job-title2"><h3>{{$job->title}}</h3>
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
                                    <li>
                                        <i class="la la-calendar-o"></i>
                                        Yayınlanma Tarihi:
                                        {{$job->created_at->diffForHumans()}}
                                    </li>
                                    <li>
                                        <i class="la la-calendar-o"></i>
                                       Çalışma Türü
                                        <span>{{$job->workType->name}}</span>
                                    </li>
                                </ul>
                                @if(optional($job->category)->name)
                                    <span>
                                    <strong>Aranıyor</strong>
                                    : {{optional($job->category)->name}}
                                </span>
                                @endif
                            </div>
                                <h2>İş tanımı</h2>
                            <div class="job-details" style="border-bottom: 1px solid #e8ecec;padding-bottom: 10px">
                                {!! $job->tasks !!}
                            </div>
                                <h2>Karşılığında alacağınız</h2>
                            <div class="job-details" style="border-bottom: 1px solid #e8ecec;padding-bottom: 10px">
                                {!! $job->benefits !!}
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
                                        <h3>Görüntüleyen Kişi Sayısı</h3><span>{{$job->view_counter}}</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column">
                        <div class="job-single-head style2">
                            <div class="job-thumb">
                                <img style="width: 30%"
                                    src="{{optional($job->user)->profile_image_url ?? 'https://place-hold.it/124x124'}}"/>
                            </div>
                            <div class="job-head-info" id="job-head-info">
                                <h4>{{optional($job->user)->name}}</h4>

                            </div>
                            @auth
                                <span style="cursor: pointer;padding: 20px 5px" id="show_contact_info_button_auth"
                                      onclick="showContact(event,`{{$job->slug}}`)"
                                      title="" class="apply-job-btn">
                                    <i class="la la-paper-plane"></i>
                                    İletişim Bilgilerini Görüntüle
                                </span>
                                <br>
                            @endauth

                            @guest
                                <a href="#" title="" class="apply-job-btn signup-popup"
                                   style="cursor: pointer;padding: 20px 0px"><i
                                        class="la la-paper-plane"></i>
                                    İletişim Bilgilerini Görüntüle
                                </a>
                            @endguest
                            <a href="{{route('user.show',$job->user->username)}}" title="" class="viewall-jobs">İş sahibinin profilini görüntüle</a>
                        </div><!-- Job Head -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bo-slider.min.js')}}" type="text/javascript"></script>

    <script>
        $(function(){
            $('.bo-slider').boSlider();
        });

        function showContact(e, slug) {
            e.preventDefault();
            $('#show_contact_info_button_auth').text('Yükleniyor . . . ')

            let url = "{{route('job.get_contact_info',":slug")}}";
            url = url.replace(':slug', slug);

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    let html = `<h4>${response?.name}</h4><p><i class="la la-phone"></i>`
                    html += response?.phone ? `${response?.phone}</p><p><i class="la la-envelope-o"></i>` : 'Kullanicinin telefon numarasi bulunmuyor </p><p><i class="la la-envelope-o"></i>'
                    html += response?.email ? `${response?.email}</p>` : 'Kullanicinin mail adresi bulunmuyor</p>';

                    $('#job-head-info').fadeOut(300, function () {
                        $(this).html(html).fadeIn(300);
                    });

                    $('#show_contact_info_button_auth').css('display', 'none')
                },
                error: function (response) {
                    alert('Bizden kaynakli bir hata olustu. Lutfen bizimle iletisime gecip durumu bildirin');
                },
            });
        }
    </script>
@endpush
