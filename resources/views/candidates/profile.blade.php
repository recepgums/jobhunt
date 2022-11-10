@extends('layout.app')

@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9">

                        @if(session()->has('message'))
                            <div class="alert alert-success mt-5">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form method="post" action="{{route('candidate.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="padding-left">
                                <div class="profile-title">
                                    <h3 class="text-center">Profilim</h3>
                                    <div class="upload-img-bar">
                                        <span class="round">
                                            <img style="width: 150px;height: 150px" src="{{strlen($user->getFirstMediaUrl('images')) > 0 ? $user->getFirstMediaUrl('images') : 'https://placehold.jp/1600x800'}}"
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
                                                @error('about')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <textarea name="about"
                                                    placeholder="İşverenler buraya yazdığınızı görecek. Kendiniz ve iş deneyimleriniz hakkında bilgi verin...">{{$user->about}}</textarea>
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
                                                <input type="tel" id="phone" placeholder="5XXXXXXXXX"
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
                                                            @if($user->city_id == $city->id)
                                                            selected
                                                            @endif

                                                            value="{{$city->id}}">{{$city->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">İş Alanlarınız (Birden fazla seçebilirsiniz)</span>
                                            <div class="pf-field no-margin">
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <select multiple style="min-height: 150px" name="category_id[]" id="search-field"
                                                        data-placeholder="İş alanları";
                                                        class="chosen">
                                                    <option value=""></option>
                                                    @forelse($categories as $category)
                                                        <option value="{{$category->id}}"
                                                        @if(in_array($category->id,$user->categories->pluck('category_id')->toArray()))
                                                            selected
                                                        @endif
                                                        >
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

                                                <select name="is_searchable_for_job" data-placeholder="Allow In Search"
                                                        class="chosen">
                                                    <option @if($user->is_searchable_for_job == 1) selected
                                                            @endif value="1">Evet
                                                    </option>
                                                    <option @if($user->is_searchable_for_job == 0) selected
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
                                                       value="{{$user->experience_year}}"
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
                                                       value="{{$user->expected_salary}}"
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
                                                       value="{{$user->age}}" name="age"/>
                                            </div>
                                        </div>
                                        @if($user->hasRole('employee'))
                                            <div class="col-lg-6">
                                                <span class="pf-title">Şirket İsminiz</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="Şirket İsminiz"
                                                           value="{{$user->company_name}}" name="company_name"/>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12 mb-5">
                                            <button type="submit" class="tw-bg-red-500 btn w-full text-white py-2 px-4 mx-auto">Güncelle</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function thisFileUpload(e) {
            e.preventDefault()
            document.getElementById("file").click();
        }
    </script>
@endpush
