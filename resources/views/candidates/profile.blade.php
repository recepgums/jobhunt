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
                            <h3>Welcome ALI TUFAN</h3>
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

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form method="post" action="{{route('candidate.update')}}">
                            @csrf
                            <div class="padding-left">
                                <div class="profile-title">
                                    <h3>Profilim</h3>
                                    <div class="upload-img-bar">
                                        <span class="round">
                                            <img src="{{$user->profile_image_url ?? 'https://place-hold.it/140x140'}}"
                                                 alt=""/>
                                        </span>
                                        <div class="upload-info">
                                            <input type="file" id="file" style="display:none;" name="profile_image_file"
                                                   accept="image/*"/>

                                            @error('profile_image_file')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <a id="button" onclick="thisFileUpload(event);">Profil Fotoğrafını
                                                Değiştir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-form-edit">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <span class="pf-title">Hakkımda</span>
                                            <div class="pf-field">
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <textarea name="description"
                                                    placeholder="İşverenler buraya yazdığınızı görecek. Kendiniz ve iş deneyimleriniz hakkında bilgi verin...">{{$user->candidate?->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Tam Adınız</span>
                                            <div class="pf-field">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="text" placeholder="İsim Soyisim" name="name"
                                                       value="{{$user->name}}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span class="pf-title">Telefon Numaranız</span>
                                            <div class="pf-field">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="tel" placeholder="5XXXXXXXXX"
                                                       value="{{$user->phone}}" name="phone"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Email
                                             @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="Email adresiniz" name="email"
                                                       value="{{$user->email}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Yaşadığınız şehir</span>
                                            <div class="pf-field">
                                                @error('city_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <select data-placeholder="Please Select Specialism" class="chosen"
                                                        name="city_id">
                                                    @forelse($cities as $city)
                                                        <option
                                                            @if($user->candidate?->city->id == $city->id)
                                                            selected
                                                            @endif

                                                            value="{{$city->id}}">{{$city->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <span class="pf-title">İş Alanınız</span>
                                            <div class="pf-field no-margin">
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <ul class="tags">
                                                    @isset($user->candidate?->categories)
                                                        @forelse($user->candidate?->categories as $category)
                                                            <li class="addedTag">
                                                                {{$category->category->name}}
                                                                <span
                                                                    onclick="$(this).parent().remove();"
                                                                    class="tagRemove">
                                                            x
                                                        </span>
                                                                <input type="hidden" name="category_id[]"
                                                                       value="{{$category->id}}">
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    @endisset
                                                    <li class="tagAdd taglist">

                                                    </li>
                                                </ul>

                                                <select name="category_id[]" id="search-field"
                                                        data-placeholder="İş alanları";
                                                        class="chosen">
                                                    <option value=""></option>
                                                    @forelse($categories as $category)
                                                        <option value="{{$category->id}}">
                                                            {{$category->name}}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span
                                                class="pf-title">Eleman arayanların sizi görmesini ister misiniz?</span>
                                            <div class="pf-field">
                                                @error('is_searchable')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                                <select name="is_searchable" data-placeholder="Allow In Search"
                                                        class="chosen">
                                                    <option @if($user->candidate?->is_searchable == 1) selected
                                                            @endif value="1">Evet
                                                    </option>
                                                    <option @if($user->candidate?->is_searchable == 0) selected
                                                            @endif value="0">Hayır
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span class="pf-title">Deneyim Süresiniz(Yıl)</span>
                                            <div class="pf-field">
                                                @error('experience_year')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="text" name="experience_year"
                                                       value="{{$user->candidate?->experience_year}}"
                                                       placeholder="Deneyim yılınız">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <span class="pf-title">Çalışacabileceğiniz ücret</span>
                                            <div class="pf-field">
                                                @error('expected_salary')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="number" placeholder="Minimum maaş beklentiniz"
                                                       value="{{$user->candidate?->expected_salary}}"
                                                       name="expected_salary"/>
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <span class="pf-title">Yaşınız</span>
                                            <div class="pf-field">
                                                @error('age')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="number" placeholder="Kaç yaşındasınız"
                                                       value="{{$user->candidate?->age}}" name="age"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit">Güncelle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/circle-progress.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/tag.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/maps3.js')}}" type="text/javascript"></script>
    <script
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
    <script>
        function thisFileUpload(e) {
            e.preventDefault()
            document.getElementById("file").click();
        }
    </script>
@endpush
