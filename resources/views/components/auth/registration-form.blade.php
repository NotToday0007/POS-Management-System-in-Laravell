<div class="signup-page">
    <div class="signup-container">

        <!-- Signup Card -->
        <div class="signup-card">

            <!-- Header -->
            <div class="signup-header text-center">
             <div class="signup-logo">
    <img src="{{ asset('images/logo.png') }}" alt="POS Management System">
</div>

                <h2>Create your account</h2>

                <p>
                    Get started with your POS management system
                </p>
            </div>

            <!-- Form -->
            <div class="signup-form">

                <div class="row">

                    <!-- Shop Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shopName">
                                Shop Name <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-shop"></i>
                                <input
                                    id="shopName"
                                    placeholder="Enter your shop name"
                                    class="form-control"
                                    type="text"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- User Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName">
                                User Name <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-person"></i>
                                <input
                                    id="firstName"
                                    placeholder="Enter your name"
                                    class="form-control"
                                    type="text"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">
                                Email Address <span>*</span>
                            </label>

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
                    </div>

                    <!-- Mobile -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">
                                Mobile Number <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-phone"></i>
                                <input
                                    id="mobile"
                                    placeholder="Enter your mobile number"
                                    class="form-control"
                                    type="tel"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">
                                Password <span>*</span>
                            </label>

                            <div class="input-wrapper password-wrapper">
                                <i class="bi bi-lock"></i>

                                <input
                                    id="password"
                                    placeholder="Create a password"
                                    class="form-control"
                                    type="password"
                                />

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword()"
                                >
                                    <i class="bi bi-eye" id="passwordIcon"></i>
                                </button>
                            </div>

                            <small class="form-hint">
                                Use a strong password for better security.
                            </small>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">
                                Role
                                <small>(Optional)</small>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-person-badge"></i>

                                <select id="role" class="form-control">
                                    <option value="">Select your role</option>
                                    <option value="owner">Owner</option>
                                    <option value="manager">Manager</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Terms -->
                <div class="signup-terms">
                    <i class="bi bi-shield-check"></i>
                    <span>
                        Your information is securely stored and protected.
                    </span>
                </div>

                <!-- Submit -->
                <button
                    type="button"
                    onclick="onRegistration()"
                    class="signup-button"
                >
                    Create Account
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

            <!-- Login -->
            <div class="login-section">
                <span>Already have an account?</span>

                <a href="/userLogin">
                    Login here
                </a>
            </div>

        </div>

        <!-- Bottom Text -->
        <div class="signup-footer">
            <span>© {{ date('Y') }} POS Management System</span>
        </div>

    </div>
</div>


<style>

/* =========================================
   SIGNUP PAGE
========================================= */

.signup-page {
    min-height: 100vh;
    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(255, 46, 147, 0.10),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 90%,
            rgba(209, 0, 111, 0.07),
            transparent 30%
        ),
        #fff7fb;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 45px 20px;
}


/* =========================================
   CONTAINER
========================================= */

.signup-container {
    width: 100%;
    max-width: 800px;
}

.signup-logo {
    text-align: center;
    margin-bottom: 8px;
}

.signup-logo img {
    width: 190px;
    height: 75px;
    object-fit: contain;
    display: inline-block;
}

/* =========================================
   CARD
========================================= */

.signup-card {
    background: #ffffff;

    border: 1px solid #f1dce7;
    border-radius: 22px;

    box-shadow:
        0 20px 60px rgba(86, 22, 55, 0.10);

    overflow: hidden;
}


/* =========================================
   HEADER
========================================= */

.signup-header {
     padding: 2px 30px 15px;
}

.signup-icon {
    width: 58px;
    height: 58px;

    margin: 0 auto 17px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: linear-gradient(
        135deg,
        #ff2e93,
        #d1006f
    );

    color: #ffffff;

    font-size: 25px;

    box-shadow:
        0 10px 25px rgba(209, 0, 111, 0.20);
}


.signup-header h2 {
    margin: 0;

    color: #171717;

    font-size: 30px;

    font-weight: 800;

    letter-spacing: -0.6px;
}


.signup-header p {
    margin: 9px 0 0;

    color: #777;

    font-size: 14px;
}


/* =========================================
   FORM
========================================= */

.signup-form {
    padding: 10px 40px 35px;
}


.form-group {
    margin-bottom: 20px;
}


.form-group label {
    display: block;

    margin-bottom: 8px;

    color: #333;

    font-size: 14px;

    font-weight: 700;
}


.form-group label span {
    color: #d1006f;
}


.form-group label small {
    color: #999;

    font-size: 12px;

    font-weight: 500;
}


/* =========================================
   INPUT
========================================= */

.input-wrapper {
    position: relative;
}


.input-wrapper > i {
    position: absolute;

    left: 15px;
    top: 50%;

    transform: translateY(-50%);

    color: #b66a91;

    font-size: 17px;

    z-index: 2;
}


.input-wrapper .form-control {
    height: 48px;

    padding-left: 45px;
    padding-right: 15px;

    border: 1px solid #eadde4;

    border-radius: 10px;

    background: #fff;

    color: #333;

    font-size: 14px;

    box-shadow: none;

    transition: all .2s ease;
}


.input-wrapper .form-control::placeholder {
    color: #aaa;
}


.input-wrapper .form-control:focus {
    border-color: #ff2e93;

    box-shadow:
        0 0 0 3px rgba(255, 46, 147, 0.08);
}


/* =========================================
   SELECT
========================================= */

select.form-control {
    cursor: pointer;

    appearance: auto;
}


/* =========================================
   PASSWORD
========================================= */

.password-wrapper .form-control {
    padding-right: 45px;
}


.password-toggle {
    position: absolute;

    right: 13px;
    top: 50%;

    transform: translateY(-50%);

    border: none;

    background: transparent;

    color: #999;

    padding: 5px;

    cursor: pointer;

    z-index: 3;
}


.password-toggle:hover {
    color: #d1006f;
}


.form-hint {
    display: block;

    margin-top: 6px;

    color: #999;

    font-size: 11px;
}


/* =========================================
   SECURITY INFO
========================================= */

.signup-terms {
    display: flex;

    align-items: center;

    gap: 8px;

    margin: 3px 0 20px;

    padding: 11px 13px;

    border-radius: 9px;

    background: #fff7fb;

    color: #777;

    font-size: 12px;
}


.signup-terms i {
    color: #16a34a;

    font-size: 16px;
}


/* =========================================
   BUTTON
========================================= */

.signup-button {
    width: 100%;

    height: 50px;

    border: none;

    border-radius: 10px;

    background: linear-gradient(
        135deg,
        #ff2e93,
        #d1006f
    );

    color: #fff;

    font-size: 15px;

    font-weight: 700;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    cursor: pointer;

    box-shadow:
        0 8px 20px rgba(209, 0, 111, 0.18);

    transition: all .25s ease;
}


.signup-button:hover {
    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(209, 0, 111, 0.25);
}


.signup-button i {
    font-size: 17px;

    transition: transform .2s ease;
}


.signup-button:hover i {
    transform: translateX(3px);
}


/* =========================================
   LOGIN
========================================= */

.login-section {
    padding: 20px 30px 25px;

    text-align: center;

    border-top: 1px solid #f3e5eb;

    background: #fffafd;

    font-size: 14px;

    color: #777;
}


.login-section a {
    margin-left: 5px;

    color: #d1006f;

    font-weight: 700;

    text-decoration: none;
}


.login-section a:hover {
    color: #a80057;

    text-decoration: underline;
}


/* =========================================
   FOOTER
========================================= */

.signup-footer {
    text-align: center;

    margin-top: 18px;

    color: #999;

    font-size: 12px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .signup-page {
        padding: 25px 15px;
    }

    .signup-header {
        padding: 30px 20px 20px;
    }

    .signup-header h2 {
        font-size: 25px;
    }

    .signup-form {
        padding: 10px 20px 25px;
    }

    .form-group {
        margin-bottom: 17px;
    }

    .signup-card {
        border-radius: 18px;
    }

}

</style>


<script>

async function onRegistration() {

    let email = document.getElementById('email').value;
    let firstName = document.getElementById('firstName').value;
    let mobile = document.getElementById('mobile').value;
    let password = document.getElementById('password').value;
    let role = document.getElementById('role').value;
    let shopName = document.getElementById('shopName').value;

    if (shopName.length === 0) {
        errorToast('Shop Name is required');
    }

    else if (email.length === 0) {
        errorToast('Email is required');
    }

    else if (firstName.length === 0) {
        errorToast('First Name is required');
    }

    else if (mobile.length === 0) {
        errorToast('Mobile is required');
    }

    else if (password.length === 0) {
        errorToast('Password is required');
    }

    else {

        showLoader();

        let res = await axios.post("/user-registration", {
            email: email,
            firstName: firstName,
            mobile: mobile,
            password: password,
            role: role,
            shopName: shopName
        });

        hideLoader();

        if (
            res.status === 200 &&
            res.data['status'] === 'success'
        ) {

            successToast(res.data['message']);

            setTimeout(function () {

                window.location.href = '/userLogin';

            }, 2000);

        }

        else {

            errorToast(res.data['message']);

        }
    }
}


/* =========================================
   PASSWORD SHOW / HIDE
========================================= */

function togglePassword() {

    let password = document.getElementById('password');
    let icon = document.getElementById('passwordIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    }

    else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }
}

</script>
