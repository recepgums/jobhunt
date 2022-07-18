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
                            <h3>İş İlanları</h3>
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
                    <aside class="col-lg-3 column border-right">
                        <form action="{{route('job.index')}}" method="get">
                            <div class="widget">
                                <div class="search_widget_job ">
                                    <div class="field_w_search">
                                        <input type="text" name="keyword" value="{{request()->get('keyword')}}"
                                               placeholder="Ara..."/>
                                        <i class="la la-search"></i>
                                    </div>
                                    <div class="field_w_search">
                                        <select name="city_id" data-placeholder="Uzmanlık Seçin"
                                                class="chosen" onchange="cityChangedMethod(this)">
                                            <option value></option>
                                            @forelse($cities as $city)
                                                <option
                                                    @if(request()->has('city_id'))
                                                        @if(request()->get('city_id') == $city->id)
                                                            selected
                                                        @endif
                                                        @else
                                                            @if($selectedCity->id == $city->id)
                                                                selected
                                                            @endif
                                                        @endif
                                                    value="{{$city->id}}"
                                                >
                                                    {{$city->name}}
                                                </option>
                                                    @empty
                                                    @endforelse
                                        </select>
                                    </div>
                                    <div class="field_w_search" id="districtSelect">
                                        <select name="district_id[]" data-placeholder="İlçe Seçin"
                                                class="chosen-city district" multiple>
                                            <option value></option>
                                            @isset($selectedDistricts)
                                                @forelse($selectedDistricts as $selectedDistrict)
                                                    <option @if(request()->has('district_id') && is_array(request()->get('district_id')))
                                                            @if(in_array($selectedDistrict->id,request()->get('district_id')))
                                                            selected
                                                            @endif
                                                            @endif
                                                        value="{{$selectedDistrict->id}}">{{$selectedDistrict->name}}</option>
                                                @empty
                                                @endforelse
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="sb-title open">Uzmanlığı</h3>
                                <div class="specialism_widget">
                                    <div class="simple-checkbox scrollbar">
                                        @isset($categories)
                                            @forelse($categories as $key => $category)
                                                <p>
                                                    <input type="checkbox" value="{{$category->id}}" name="category_id[]" id="categoty_{{$key}}"
                                                    @if(request()->has('category_id'))
                                                        @if( in_array($category->id,request()->get('category_id')))
                                                        checked
                                                        @endif
                                                    @endif
                                                    >
                                                    <label for="categoty_{{$key}}">{{$category->name}}</label>
                                                </p>
                                            @empty
                                            @endforelse
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="sb-title open">Maaş Aralığı</h3>
                                <div class="specialism_widget">
                                    <div class="simple-checkbox">
                                        <p><input type="checkbox" name="sallary" value="0_5500" id="salary-3">
                                            <label for="salary-3">0 - 5500 ₺</label>
                                        </p>
                                        <p><input type="checkbox" name="smplechk" value="5500_6500" id="salary-4">
                                            <label for="salary-4">5500₺ - 6500₺</label>
                                        </p>
                                        <p><input type="checkbox" name="smplechk" value="6500_7500" id="salary-5">
                                            <label for="salary-5">6500₺ - 7500₺</label>
                                        </p>
                                        <p><input type="checkbox" name="smplechk" value="7500_8500" id="salary-6">
                                            <label for="salary-6">7500₺ - 8500₺</label>
                                        </p>
                                        <p><input type="checkbox" name="smplechk" value="8500_9500" id="salary-7">
                                            <label for="salary-7">8500₺ - 9500₺</label>
                                        </p>
                                        <p><input type="checkbox" name="smplechk" value="9500_1000000" id="salary-8">
                                            <label for="salary-8">9500₺ +</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="sb-title closed">İlan Tarihi</h3>
                                <div class="posted_widget">
                                    <input type="radio"  @if(request()->get('created_at') == 24) checked @endif name="created_at" value="24" id="wwqe"><label for="wwqe">Son 24
                                        Saat</label><br/>
                                    <input type="radio"   @if(request()->get('created_at') == 168) checked @endif name="created_at" value="168" id="erewr"><label for="erewr">Son
                                        7 Gün</label><br/>
                                    <input type="radio"  @if(request()->get('created_at') == 336) checked @endif  name="created_at" value="336" id="qwe"><label for="qwe">Son 14
                                        Gün</label><br/>
                                    <input type="radio"  @if(request()->get('created_at') == 720) checked @endif  name="created_at" value="720" id="wqe"><label for="wqe">Son 30
                                        Gün</label><br/>
                                    <input type="radio" @if(!request()->has('created_at')) checked @endif  name="created_at" id="qweqw">
                                    <label class="nm" for="qweqw">Hepsi</label><br/>
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="sb-title closed">Çalışma Türü</h3>
                                <div class="type_widget">
                                    @forelse($workTypes as $key => $workType)
                                        <p class="ftchek">
                                            <input type="checkbox" value="{{$workType->id}}" name="work_type_id"
                                                   id="33r{{$key}}">
                                            <label for="33r{{$key}}">
                                                {{$workType->name}}
                                            </label>
                                        </p>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="sb-title closed">Cinsiyet</h3>
                                <div class="specialism_widget">
                                    <div class="simple-checkbox">
                                        <p><input type="radio" value="1" name="gender_id" id="13"><label
                                                for="13">Erkek</label></p>
                                        <p><input type="radio" value="2" name="gender_id" id="14"><label
                                                for="14">Kadın</label></p>
                                        <p><input type="radio" value="" name="gender_id" id="15"><label
                                                for="15">Hepsi</label></p>
                                    </div>
                                </div>
                            </div>

                            <div class="widget" >
                                <button type="submit">Ara</button>
                            </div>
                        </form>
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="modrn-joblist">
                            <div class="tags-bar">
                                @isset($keywords)
                                    @forelse($keywords as $keyword)
                                        <span>{{$keyword}}<i class="close-tag">x</i></span>
                                    @empty
                                    @endforelse
                                @endisset
                                @auth
                                    <div class="action-tags">
                                        <a href="#" title=""><i class="la la-cloud-download"></i> Kaydet</a>
                                        <a href="#" title=""><i class="la la-trash-o"></i> Temizle</a>
                                    </div>
                                @endauth
                            </div><!-- Tags Bar -->
                            <div class="filterbar">
                                @auth
                                    <span class="emlthis">
                                        <a href="mailto:example.com" title=" ">
                                            <i class="la la-envelope-o"></i>
                                            Bu tarz ilanları bana mail olarak gönder
                                        </a>
                                    </span>
                                @endauth
                                <div class="sortby-sec">
                                    <span>Sıralama</span>
                                    <select onchange="sortTypeChangedMethod(this)" name="order_by" data-placeholder="Most Recent" class="chosen">
                                        <option value="created_at">En Yeni</option>
                                        <option value="view_counter">En Çok Görüntülenen</option>
                                    </select>
                                    <select name="per_page" data-placeholder="20 Per Page" class="chosen">
                                        <option value="30">Sayfa başı 10 iş ilanı</option>
                                        <option value="40">Sayfa başı 20 iş ilanı</option>
                                        <option value="50">Sayfa başı 30 iş ilanı</option>
                                        <option value="60">Sayfa başı 50 iş ilanı</option>
                                    </select>
                                </div>
                                @if(isset($jobs) && $jobs->total() > 0 )<h5>{{$jobs->total()}} İş İlanı &
                                    Açık Pozisyonlar</h5>@endif
                            </div>
                        </div><!-- MOdern Job LIst -->
                        <div class="job-list-modern">
                            <div class="job-listings-sec">
                                @forelse($jobs as $job)
                                    <div class="job-listing wtabs">
                                        <div class="job-title-sec ">
                                            <div class="c-logo mr-3 pl-3">
                                                <img src="{{$job->cover_image}}" alt=""/>
                                                <span class="job-is ft">{{$job->workType->name}}</span>
                                            </div>

                                            <h3><a href="{{route('job.show',$job->slug)}}" title="">{{$job->title}}</a>
                                            </h3>
                                            <span>{{$job->user->name}}</span>
                                            <div class="job-lctn"><i
                                                    class="la la-map-marker"></i>{{optional($job->district)->name}},
                                                {{optional($job->city)->name}}
                                            </div>

                                        </div>
                                        <div class="job-style-bx">
                                            <a href="{{route('job.show',$job->slug)}}"><span class="job-is ft">Detayları Gör</span></a>
                                            <i>{{$job->created_at->diffForHumans()}}</i>
                                        </div>
                                    </div>
                                @empty
                                    <div class="container mx-auto text-center mt-5">
                                        <span class="mx-auto text-center">
                                            Aradığınız özelliklerde iş ilanı bulunamadı.
                                        </span>
                                    </div>
                                    <div class="mx-auto text-center mt-5">
                                        <a href="{{route('job.index',['city_id' =>null])}}" class="post-job-btn"
                                           style="float: initial"><i class="la la-plus"></i>
                                            Tüm İş İlanlarını Gör
                                        </a>
                                    </div>

                                @endforelse
                            </div>
                            {{$jobs->links('vendor.pagination.custom')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
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

        function sortTypeChangedMethod(element){
            let href = new URL(window.location.href);
            href.searchParams.set('order_by', element.value);

            window.location.href = href;
        }

    </script>

@endpush
