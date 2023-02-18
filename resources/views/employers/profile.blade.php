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
                                    <h3 class="text-center">İş yeri bilgileri</h3>
                                    <span class="alert alert-danger">
                                        İş ilanları paylaştığınızda, iş arayanlar bu bilgileri görebilir
                                    </span>
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

                                            <a id="button" onclick="thisFileUpload(event);">Logoyu değiştir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-form-edit">
                                    <div class="row">

                                        @if($user->hasRole('employee'))
                                            <div class="col-lg-6">
                                                <span class="pf-title">Firma adı</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="Firma adı"
                                                           value="{{$user->company_name}}" name="company_name"/>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-lg-6">
                                            <span class="pf-title">İş Telefon numarası</span>
                                            <div class="pf-field">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="tel" id="phone" placeholder="5XXXXXXXXX"
                                                       value="{{$user->phone}}" name="phone"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">İş yerinizin bulunduğu şehir</span>
                                            <div class="pf-field">
                                                @error('city_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <select data-placeholder="İş yerinizin bulunduğu şehir" class="chosen"
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
                                            <span class="pf-title">İş yerim hakkında</span>
                                            <div class="pf-field">
                                                @error('about')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <textarea name="about"
                                                          placeholder="İş arayanlar buraya yazdığınızı görecek. İş yerinizi neden tercih etmeleri gerektiği ve iş yeriniz hakkında genel bilgileri yazınız">{{$user->about}}</textarea>
                                            </div>
                                        </div>
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
