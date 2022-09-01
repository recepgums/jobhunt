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
                <input type="checkbox" name="cb" id="cb1"><label for="cb1">Beni hatırla</label>
            </p>
            <a href="#" title="">Şifreni mi unuttun?</a>
            <button id="loginSubmitButton" type="submit">Giriş Yap</button>

        </form>
        <div class="extra-login">
            <span>ya da</span>
            <a class="tw-login" href="{{route('socialite.redirect','google')}}" title="">
                <div class='g-sign-in-button'>
                    <div class=content-wrapper>
                        <div class='logo-wrapper'>
                            <img src='https://developers.google.com/identity/images/g-logo.png'>
                        </div>
                        <span class='text-container'>
                          <span>
                              Google ile giriş yap
                          </span>
                        </span>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>

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
