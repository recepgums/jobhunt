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
                    <div class="col-lg-10 mx-auto column">
                        <div class="padding-left">
                            <div class="profile-form-edit mb-5 " id="step_1_div">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif

                                5890040000000016
                                <div class="text-center alert" id="responseMessageJobPost"></div>
                                {!! $form !!}
                                <div id="iyzipay-checkout-form" class="responsive my-5"></div>
                                <div id="ucs-cards"></div>
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.css')}}"/>
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
@endpush
