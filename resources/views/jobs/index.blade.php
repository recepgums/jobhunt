@extends('layout.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1"
            style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
            class="parallax scrolly-invisible no-parallax"></div>
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
<section class="py-5" style="background-color: #f4f5fa">
    <div class="container">

        <div id="app">
            <classifiedsec></classifiedsec>
        </div>
    </div>
</section>
<script src="{{asset('js/app.js')}}"></script>
@endsection

@push('scripts')
<script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
