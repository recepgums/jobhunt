<div class="account-popup-area signin-popup-box">
    <div class="account-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>User Login</h3>
        <form id="loginForm">
            <span id="responseMessage">
            </span>
            <div class="cfield">
                <input type="email" placeholder="Email" id="emailInput"/>
                <i class="la la-user"></i>
            </div>
            <div class="cfield">
                <input type="password" placeholder="********" id="passwordInput"/>
                <i class="la la-key"></i>
            </div>
            <p class="remember-label">
                <input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
            </p>
            <a href="#" title="">Forgot Password?</a>
            <button id="loginSubmitButton" type="submit">Giriş Yap</button>
        </form>
        <div class="extra-login">
            <span>Or</span>
            <div class="login-social">
                <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i class="fa fa-google"></i></a>
            </div>
        </div>
    </div>
</div>
