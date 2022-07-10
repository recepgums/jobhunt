<script>
    var userType=1;
</script>
<div class="account-popup-area signup-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>Sign Up</h3>
        <div class="select-user">
            <span onclick="userType=1">İş Arıyorum</span>
            <span onclick="userType=2">İşverenim</span>
        </div>
        <form id="signupForm" autocomplete="off">
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            @csrf
            <div class="cfield">
                <input id="nameRegisterInput" type="text" placeholder="İsminiz" autocomplete="off"/>
                <i class="la la-user"></i>
            </div>
            <div class="cfield">
                <input id="emailRegisterInput" type="text" placeholder="Email adresiniz..." autocomplete="off"/>
                <i class="la la-envelope-o"></i>
            </div>
            <div class="cfield">
                <input id="passwordRegisterInput" type="password" placeholder="Şifreniz" required min="7" name="password" autocomplete="new-password" />
                <i class="la la-key"></i>
            </div>
            <div class="cfield">
                <input id="phoneRegisterInput" type="text" placeholder="Phone Number" />
                <i class="la la-phone"></i>
            </div>
            <button id="signupSubmitButton" type="submit">Signup</button>
        </form>
        <div class="extra-login">
            <span>Or</span>
            <div class="login-social">
                <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div>
