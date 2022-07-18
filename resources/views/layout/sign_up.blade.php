<script>
    var userType=1;
</script>
<div class="account-popup-area signup-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>Kayıt Ol</h3>
        <form id="signupForm" autocomplete="off">
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            @csrf
            <div class="cfield">
                <input name="name" id="nameRegisterInput" type="text" placeholder="İsim Soyisim" autocomplete="off"/>
                <i class="la la-user"></i>
            </div>
            <div class="cfield">
                <input name="email" id="emailRegisterInput" type="text" placeholder="Email adresiniz..." autocomplete="off"/>
                <i class="la la-envelope-o"></i>
            </div>
            <div class="cfield">
                <input name="password" id="passwordRegisterInput" type="password" placeholder="Şifreniz" required min="7" autocomplete="new-password" />
                <i class="la la-key"></i>
            </div>
            <div class="cfield">
                <input name="phone" id="phoneRegisterInput" type="text" placeholder="Telefon(5XXXXXXXXX)" />
                <i class="la la-phone"></i>
            </div>

            <div class="select-user">
                <span onclick="userType=1">İş Arıyorum</span>
                <span onclick="userType=2">İşverenim</span>
            </div>
            <button id="signupSubmitButton" type="submit">Kayıt Ol</button>
        </form>
        <div class="extra-login">
            <span>Ya da</span>
            <div class="login-social">
                <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i class="fa fa-google"></i></a>
            </div>
        </div>
    </div>
</div>
