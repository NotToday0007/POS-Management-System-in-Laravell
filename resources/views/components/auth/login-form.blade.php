
<style>
.login-wrapper {
    min-height: calc(100vh - 66px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px 15px;
    background: #fff5fa;
}
   .login-card {
    width: 100%;
    max-width: 480px; /* was 430px */
    min-height: 460px; /* add this */
    background: #fff;
    border: 1px solid #f1dce7;
    border-radius: 14px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}
    .login-header {
        text-align: center;
        padding: 25px 30px 10px;
    }

    .login-logo {
        text-align: center;
        margin-bottom: 8px;
    }

    .login-logo img {
        width: 210px;
        height: 82px;
        object-fit: contain;
        display: inline-block;
    }

    .login-header h2 {
        margin: 5px 0 5px;
        color: #171717;
        font-size: 24px;
        font-weight: 800;
    }

   .login-header {
    text-align: center;
    padding: 30px 35px 15px;
}

.login-form {
    padding: 20px 35px 30px;
}

.form-group {
    margin-bottom: 18px;
}

    .form-group label {
        display: block;
        margin-bottom: 6px;
        color: #333;
        font-size: 13px;
        font-weight: 600;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        font-size: 16px;
        z-index: 2;
    }

    ..input-wrapper .form-control {
    height: 46px;
    padding-left: 42px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 13px;
}

    .input-wrapper .form-control:focus {
        border-color: #ff6bb5;
        box-shadow: 0 0 0 2px rgba(255, 107, 181, 0.10);
    }

    .password-toggle {
        position: absolute;
        right: 14px;
        left: auto !important;
        cursor: pointer;
        color: #777 !important;
    }

    .login-button {
        height: 44px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        margin-top: 5px;
    }

    .login-links {
        text-align: center;
        margin-top: 20px;
        padding-top: 17px;
        border-top: 1px solid #eee;
        font-size: 13px;
    }

    .login-links a {
        color: #d1006f;
        font-weight: 600;
        text-decoration: none;
    }

    .login-links a:hover {
        text-decoration: underline;
    }

    .login-links .divider {
        margin: 0 10px;
        color: #bbb;
    }

    @media (max-width: 576px) {
        .login-wrapper {
            padding: 20px 12px;
        }

        .login-header {
            padding: 20px 20px 8px;
        }

        .login-form {
            padding: 12px 20px 22px;
        }

        .login-logo img {
            width: 135px;
            height: 50px;
        }
    }
</style>


<div class="login-wrapper">

    <div class="login-card animated fadeIn">

        <!-- Logo -->
        <div class="login-header">

            <div class="login-logo">
                <!-- Use the SAME logo path that you use in your navbar -->
                <img src="{{ asset('images/logo.png') }}"
                     alt="POS Management System">
            </div>

            <h2>Welcome Back</h2>
            <p>Login to manage your POS system</p>

        </div>


        <!-- Login Form -->
        <div class="login-form">

            <div class="form-group">
                <label>Email Address</label>

                <div class="input-wrapper">
                    <i class="bi bi-envelope"></i>

                    <input
                        id="email"
                        placeholder="Enter your email"
                        class="form-control"
                        type="email"
                    />
                </div>
            </div>


            <div class="form-group">
                <label>Password</label>

                <div class="input-wrapper">
                    <i class="bi bi-lock"></i>

                    <input
                        id="password"
                        placeholder="Enter your password"
                        class="form-control"
                        type="password"
                    />

                    <i class="bi bi-eye password-toggle"
                       id="togglePassword"
                       onclick="togglePasswordVisibility()"></i>
                </div>
            </div>


            <button
                onclick="SubmitLogin()"
                class="btn w-100 bg-gradient-primary login-button">
                Login
            </button>


            <div class="login-links">

                <span>Don't have an account?</span>

                <a href="{{url('/userRegistration')}}">
                    Sign Up
                </a>

                <span class="divider">|</span>

                <a href="{{url('/sendOtp')}}">
                    Forgot Password?
                </a>

            </div>

        </div>

    </div>

</div>


<script>

    function togglePasswordVisibility() {

        let password = document.getElementById('password');
        let icon = document.getElementById('togglePassword');

        if (password.type === "password") {

            password.type = "text";

            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');

        } else {

            password.type = "password";

            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');

        }
    }


    async function SubmitLogin() {

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {

            errorToast("Email is required");

        }

        else if (password.length === 0) {

            errorToast("Password is required");

        }

        else {

            showLoader();

            let res = await axios.post("/user-login", {
                email: email,
                password: password
            });

            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {

                window.location.href = "/dashboard";

            }

            else {

                errorToast(res.data['message']);

            }
        }
    }

</script>
```
