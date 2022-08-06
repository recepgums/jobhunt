@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
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
                        <section>
                            <div class="block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading">
                                                <h2>Buy Our Plans And Packeges</h2>
                                                <span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
                                            </div><!-- Heading -->
                                            <div class="plans-sec">
                                                <div class="row">
                                                    @forelse($packages as $package)
                                                        <div class="col-lg-4">
                                                            <div class="pricetable @if($package->is_highlighted) active @endif">
                                                                <div class="pricetable-head">
                                                                    <h3>{{$package->name}}</h3>
                                                                    <h2><i>₺ </i>{{$package->price}}</h2>
                                                                    <span>{{$package->expire_day}} Gün</span>
                                                                </div><!-- Price Table -->
                                                                <ul>
                                                                    <li>1 job posting</li>
                                                                    <li>İş ilanınız {{$package->expire_day}} gün boyunca yayında</li>
                                                                    <li>7/24 Premium Destek</li>
                                                                </ul>
                                                                <a href="{{route('job.price.post',['job'=>$job->slug,'package'=>$package->id])}}" title="">SEÇ</a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
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
@endpush
