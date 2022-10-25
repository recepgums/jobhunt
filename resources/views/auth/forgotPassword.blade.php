@extends('layout.app')


@section('content')
    <section class="overlape">
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
                    <div class="col-lg-12">
                        <div class="account-popup-area signin-popup-box static">
                            <div class="account-popup">
                                <h3>Mail Adresinizi Giriniz</h3>
                                @if($errors->any())
                                    {!! implode('', $errors->all('<div class="col-12 text-left text-danger">:message</div>')) !!}
                                @endif
                                <form action="{{route('forgotPassword.post')}}" method="POST">
                                    @csrf
                                    <div class="cfield">
                                        <input autocomplete="nope" name="email" type="email" placeholder="Email Adresiniz" required/>
                                        <i class="la la-user"></i>
                                    </div>
                                    <button type="submit" style="color: white">Mail Gönder</button>
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
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
