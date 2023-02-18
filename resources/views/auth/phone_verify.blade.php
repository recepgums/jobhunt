@extends('layout.app')

@section('style')
    <style>
        p{
            font-size: 12px;
            font-weight: 400;
            font-family: Montserrat,Helvetica,Arial,sans-serif;
        }
        .modal-body{
            max-height: 80vh;
            overflow-y: scroll;
        }
    </style>
@endsection
@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div>
        </div>
    </section>

    <section class="mt-5">
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger1">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger2">

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>Telefon Doğrulama</h3>
                                <span>
                                    Bu telefon numarasına tek kullanımlık kod göndereceğiz
                                </span>
                                <form method="post" action="{{route('phone_verify.custom')}}" autocomplete="off">
                                    @csrf
                                    <div class="cfield">
                                        <input name="phone" type="tel" value="{{auth()->user()->phone}}" placeholder="Telefon (53XXXXXXXX)" required></input>
                                        <i class="la la-phone"></i>
                                    </div>
                                    <button type="submit" style="color: white">Kod Gönder</button>
                                </form>

                            </div>
                        </div><!-- SIGNUP POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush

<style>
    *, *:before, *:after {
        box-sizing: border-box;
    }

    .g-sign-in-button {
        margin: 10px;
        display: inline-block;
        width: 240px;
        height: 50px;
        background-color: #4285f4;
        color: #fff;
        border-radius: 1px;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
        transition: background-color .218s, border-color .218s, box-shadow .218s;
    }

    .g-sign-in-button:hover {
        cursor: pointer;
        -webkit-box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
    }

    .g-sign-in-button:active {
        background-color: #3367D6;
        transition: background-color 0.2s;
    }

    .g-sign-in-button .content-wrapper {
        height: 100%;
        width: 100%;
        border: 1px solid transparent;
    }

    .g-sign-in-button img {
        width: 18px;
        height: 18px;
    }

    .g-sign-in-button .logo-wrapper {
        padding: 15px;
        background: #fff;
        width: 48px;
        height: 100%;
        border-radius: 1px;
        display: inline-block;
    }

    .g-sign-in-button .text-container {
        font-family: Roboto,arial,sans-serif;
        font-weight: 500;
        letter-spacing: .21px;
        font-size: 16px;
        line-height: 48px;
        vertical-align: top;
        border: none;
        display: inline-block;
        text-align: center;
        width: 180px;
    }
</style>
