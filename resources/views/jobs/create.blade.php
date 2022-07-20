@extends('layout.app')
@push('styles')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            height: 600,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            language:"tr",
            toolbar: 'language|insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',

        });
    </script>
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
                        <div class="inner-header">
                            <h3>İlan Oluştur</h3>
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
                        @auth
                        <div class="widget">
                            <div class="tree_widget-sec">
                                <ul>
                                    <li><a href="employer_profile.html" title=""><i class="la la-file-text"></i>Company
                                            Profile</a></li>
                                    <li><a href="employer_manage_jobs.html" title=""><i class="la la-briefcase"></i>Manage
                                            Jobs</a></li>
                                    <li><a href="employer_transactions.html" title=""><i class="la la-money"></i>Transactions</a>
                                    </li>
                                    <li><a href="employer_resume.html" title=""><i class="la la-paper-plane"></i>Resumes</a>
                                    </li>
                                    <li><a href="employer_packages.html" title=""><i class="la la-user"></i>Packages</a>
                                    </li>
                                    <li><a href="employer_post_new.html" title=""><i class="la la-file-text"></i>Post a
                                            New Job</a></li>
                                    <li><a href="employer_job_alert.html" title=""><i class="la la-flash"></i>Job Alerts</a>
                                    </li>
                                    <li><a href="employer_change_password.html" title=""><i class="la la-lock"></i>Change
                                            Password</a></li>
                                    <li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        @endauth
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Yeni İş İlanı Ver</h3>
                                <div class="steps-sec">
                                    <div class="step active" id="step_1" next="step_2">
                                        <p><i class="la la-info"></i></p>
                                        <span>İş Detayı</span>
                                    </div>
                                    <div class="step" id="step_2" next="step_3" prev="step_1">
                                        <p><i class="la la-cc-mastercard"></i></p>
                                        <span>Paket Seçimi ve Ödeme</span>
                                    </div>
                                    <div class="step" id="step_3" prev="step_2">
                                        <p><i class="la  la-check-circle"></i></p>
                                        <span>İlanınız Yayında!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-form-edit mb-5 " id="step_1_div" >
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif
                                    <div class="text-center alert" id="responseMessageJobPost"></div>
                                <form method="post" action="{{route('job.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 mx-auto">
                                            <div class="pf-field no-margin">
                                                <img style="height: 150px;width: 150px" id="preview-image" class="form-control mx-auto" src="{{'https://via.placeholder.com/150'}}">

                                                <input id="image" type="file" name="cover_image"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Başlık</span>
                                            <div class="pf-field">
                                                <input name="title" type="text" placeholder="Başlık"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Açıklama</span>
                                            <div class="pf-field">
                                                <textarea id="mytextarea"  name="description" placeholder="İlan detayları..." cols="30"
                                                          rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Çalışma Türü</span>
                                            <div class="pf-field">
                                                <select name="work_type_id" data-placeholder="Please Select Specialism"
                                                        class="chosen">
                                                    @forelse($workTypes as $workType)
                                                        <option value="{{$workType->id}}">{{$workType->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Kategori</span>
                                            <div class="pf-field">
                                                <select name="category_id" data-placeholder="Kategori Seçiniz"
                                                        class="chosen">
                                                    <option value></option>
                                                    @forelse($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Şehir</span>
                                            <div class="pf-field">
                                                <select name="city_id" data-placeholder="Please Select Specialism"
                                                        class="chosen" onchange="cityChangedMethod(this)">
                                                    <option value></option>
                                                    @forelse($cities as $city)
                                                        <option @if($selectedCity->id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">İlçe</span>
                                            <div class="pf-field" id="districtSelect">
                                                <select name="district_id" data-placeholder="İlçe Seçin"
                                                        class="chosen-city">
                                                    <option value></option>
                                                    @forelse($selectedDistricts as $selectedDistrict)
                                                        <option value="{{$selectedDistrict->id}}">{{$selectedDistrict->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Ücret</span>
                                            <div class="pf-field">
                                                <input name="fee" type="number" placeholder="Ucret" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Cinsiyet</span>
                                            <div class="pf-field">
                                                <select name="gender_id" data-placeholder="Please Select Specialism" class="chosen">
                                                    @forelse($genders as $gender)
                                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit">Next</button>
                                        </div>
                                    </div>
                                </form>
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

    <script src="{{asset('assets/js/tag.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/maps3.js')}}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>

    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.css')}}" />
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script>
        $(function(){
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


    <script type="text/javascript">
        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
