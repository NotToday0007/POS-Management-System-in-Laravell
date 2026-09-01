

@extends('layout.app')

@section('content')

<style>
    :root {
        --primary: #ff2e93;
        --secondary: #ff6bb5;
        --bg-light: #fff5fa;
        --deep: #d1006f;
        --dark: #171717;
        --muted: #6c757d;
        --border: #f1dce7;
        --success: #16a34a;
    }

    html {
        scroll-behavior: smooth;
    }

   body {
    overflow-x: hidden;
    color: var(--dark);
    padding-top: 66px;
}
   section {
    padding: 90px 0;
    scroll-margin-top: 66px;
}

    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary), var(--deep));
        color: #fff;
        border: none;
        font-weight: 600;
    }

    .bg-gradient-primary:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(209, 0, 111, .22);
    }

    .btn-deep {
        background: var(--deep);
        color: #fff;
        font-weight: 600;
        border: none;
        transition: .25s ease;
    }

    .btn-deep:hover {
        background: #a80057;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(209, 0, 111, .2);
    }

    .btn-outline-deep {
        border: 1px solid var(--deep);
        color: var(--deep);
        background: #fff;
        font-weight: 600;
        transition: .25s ease;
    }

    .btn-outline-deep:hover {
        background: var(--deep);
        color: #fff;
        transform: translateY(-2px);
    }
 .footer-logo {
    width: 220px;
    height: 90px;
    object-fit: contain;
    display: block;
    transform: scale(1.35);
    transform-origin: left center;
}

.navbar {
    height: 75px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    background: #fff !important;
}
.navbar .container {
    height: 100%;
}

.navbar-brand {
    padding: 0;
    height: 66px;
    display: flex;
    align-items: center;
    overflow: visible;
}

.navbar-brand img {
    width: 230px;
    height: 90px;
    object-fit: contain;
    display: block;
}
   .nav-link {
    font-weight: 700;
    font-size: 16px;
    color: #444 !important;
    margin: 0 6px;
    transition: .2s;
}

    .nav-link:hover {
        color: var(--deep) !important;
    }

    .hero-section {
        min-height: 650px;
        display: flex;
        align-items: center;
        background:
            radial-gradient(circle at 90% 10%, rgba(255, 46, 147, .13), transparent 30%),
            radial-gradient(circle at 10% 90%, rgba(209, 0, 111, .07), transparent 25%),
            var(--bg-light);
        position: relative;
        overflow: hidden;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 14px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 50px;
        color: var(--deep);
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
    }

    .hero-title {
        font-size: clamp(2.4rem, 5vw, 4.4rem);
        line-height: 1.08;
        font-weight: 800;
        letter-spacing: -2px;
    }

    .hero-title span {
        color: var(--deep);
    }

    .hero-description {
        font-size: 18px;
        line-height: 1.8;
        max-width: 620px;
    }

    .hero-trust {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        margin-top: 25px;
    }

    .hero-trust-item {
        font-size: 14px;
        color: #555;
        font-weight: 500;
    }

    .hero-trust-item span {
        color: var(--success);
        font-weight: 700;
        margin-right: 5px;
    }

    .dashboard-wrapper {
        position: relative;
        padding: 15px;
    }

    .dashboard-window {
        background: #fff;
        border: 1px solid #eadde4;
        border-radius: 18px;
        box-shadow: 0 25px 70px rgba(86, 22, 55, .16);
        overflow: hidden;
        transform: perspective(1200px) rotateY(-3deg) rotateX(2deg);
        transition: .4s ease;
    }

    .dashboard-window:hover {
        transform: perspective(1200px) rotateY(0) rotateX(0);
    }

    .window-header {
        height: 42px;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
        padding: 0 15px;
        gap: 6px;
    }

    .window-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: #ddd;
    }

    .dashboard-body {
        padding: 18px;
        background: #fafafa;
    }

    .dash-sidebar {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #eee;
        padding: 14px;
        height: 100%;
    }

    .dash-logo {
        height: 32px;
        background: var(--bg-light);
        border-radius: 8px;
        margin-bottom: 18px;
    }

    .dash-menu {
        height: 10px;
        background: #f2e6ec;
        border-radius: 5px;
        margin: 13px 0;
    }

    .dash-menu.active {
        background: var(--primary);
    }

    .dash-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 15px;
        height: 100%;
    }

    .dash-card small {
        color: #888;
    }

    .dash-number {
        font-size: 22px;
        font-weight: 800;
        margin-top: 5px;
    }

    .mini-chart {
        height: 105px;
        border-radius: 10px;
        background:
            linear-gradient(160deg, transparent 45%, rgba(255,46,147,.12) 46%, rgba(255,46,147,.12) 48%, transparent 49%),
            linear-gradient(20deg, transparent 55%, rgba(209,0,111,.10) 56%, rgba(209,0,111,.10) 58%, transparent 59%),
            #fff5fa;
        position: relative;
        overflow: hidden;
    }

    .mini-chart-line {
        position: absolute;
        left: 8%;
        right: 5%;
        top: 50%;
        height: 3px;
        background: var(--primary);
        transform: rotate(-8deg);
        border-radius: 5px;
    }

    .section-title {
        font-weight: 800;
        margin-bottom: 12px;
        letter-spacing: -.5px;
    }

    .section-subtitle {
        max-width: 700px;
        margin: auto;
        line-height: 1.7;
    }

    .eyebrow {
        color: var(--deep);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .stats-section {
        padding: 35px 0;
        background: #fff;
        border-bottom: 1px solid #f3e7ed;
    }

    .stat-box {
        text-align: center;
        border-right: 1px solid #eee;
    }

    .stat-box:last-child {
        border-right: none;
    }

    .stat-number {
        font-size: 27px;
        font-weight: 800;
        color: var(--deep);
    }

    .stat-label {
        color: #777;
        font-size: 14px;
    }

    .feature-card {
        transition: .3s ease;
        border-radius: 16px;
        border: 1px solid #f0e5ea;
        background: #fff;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0,0,0,.08);
        border-color: rgba(255,46,147,.2);
    }

    .feature-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg-light);
        font-size: 25px;
        margin-bottom: 18px;
    }

    .feature-card h5 {
        font-weight: 700;
    }

    .feature-card p {
        line-height: 1.7;
        margin-bottom: 0;
    }

    .module-card {
        padding: 25px;
        border: 1px solid #eee;
        border-radius: 15px;
        background: #fff;
        height: 100%;
        transition: .3s ease;
    }

    .module-card:hover {
        border-color: rgba(209,0,111,.25);
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,.06);
    }

    .module-icon {
        font-size: 28px;
        margin-bottom: 13px;
    }

    .module-card h6 {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .module-card p {
        font-size: 14px;
        line-height: 1.6;
        color: #777;
        margin: 0;
    }

    .workflow-card {
        position: relative;
        padding: 30px 20px;
        text-align: center;
    }

    .workflow-number {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--deep);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        margin: 0 auto 18px;
        box-shadow: 0 8px 20px rgba(209,0,111,.2);
    }

    .workflow-arrow {
        position: absolute;
        top: 42px;
        right: -18px;
        color: var(--secondary);
        font-size: 25px;
    }

    .pricing-card {
        border: 1px solid #eadde4;
        border-radius: 20px;
        padding: 35px 28px;
        background: #fff;
        height: 100%;
        transition: .3s ease;
        position: relative;
    }

    .pricing-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 18px 40px rgba(0,0,0,.09);
    }

    .pricing-card.popular {
        border: 2px solid var(--primary);
        box-shadow: 0 18px 45px rgba(255,46,147,.13);
    }

    .popular-badge {
        position: absolute;
        top: -14px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--deep);
        color: #fff;
        padding: 6px 18px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .price {
        font-size: 42px;
        font-weight: 800;
        color: var(--deep);
        margin: 15px 0 5px;
    }

    .price small {
        font-size: 14px;
        color: #777;
        font-weight: 500;
    }

    .price-description {
        color: #777;
        min-height: 45px;
        font-size: 14px;
    }

    .pricing-list {
        list-style: none;
        padding: 0;
        margin: 25px 0;
    }

    .pricing-list li {
        padding: 8px 0;
        color: #555;
        font-size: 14px;
    }

    .pricing-list li span {
        color: var(--success);
        font-weight: 800;
        margin-right: 8px;
    }

    .pricing-note {
        font-size: 12px;
        color: #888;
        margin-top: 15px;
        text-align: center;
    }

    .included-box {
        background: var(--bg-light);
        border-radius: 22px;
        padding: 45px;
    }

    .included-item {
        display: flex;
        gap: 13px;
        margin-bottom: 18px;
    }

    .included-check {
        width: 28px;
        height: 28px;
        min-width: 28px;
        border-radius: 50%;
        background: #fff;
        color: var(--deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
    }

    .testimonial-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 18px;
        padding: 28px;
        height: 100%;
        transition: .3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,.07);
    }

    .avatar {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #ffe0ef;
    }

    .stars {
        color: #f4a100;
        letter-spacing: 2px;
        font-size: 14px;
    }

    .testimonial-text {
        line-height: 1.8;
        color: #555;
        font-size: 14px;
    }

    .faq-item {
        border: 1px solid #eee;
        border-radius: 12px;
        margin-bottom: 12px;
        overflow: hidden;
        background: #fff;
    }

    .faq-item button {
        width: 100%;
        border: none;
        background: #fff;
        text-align: left;
        padding: 20px;
        font-weight: 700;
        color: #222;
    }

    .faq-item .faq-answer {
        padding: 0 20px 20px;
        color: #777;
        line-height: 1.7;
        font-size: 14px;
    }

    .contact-box {
        background: linear-gradient(135deg, #fff5fa, #fff);
        border: 1px solid #f1dce7;
        border-radius: 22px;
        padding: 45px;
    }

    .contact-info {
        padding: 18px;
        border-radius: 12px;
        background: #fff;
        border: 1px solid #eee;
        margin-bottom: 12px;
    }

    .final-cta {
        background: linear-gradient(135deg, var(--primary), var(--deep));
        color: #fff;
        border-radius: 25px;
        padding: 65px 30px;
        position: relative;
        overflow: hidden;
    }

    .final-cta:before,
    .final-cta:after {
        content: "";
        position: absolute;
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 50%;
    }

    .final-cta:before {
        width: 300px;
        height: 300px;
        right: -100px;
        top: -130px;
    }

    .final-cta:after {
        width: 220px;
        height: 220px;
        left: -100px;
        bottom: -100px;
    }

    .footer-link {
        color: #777;
        text-decoration: none;
        font-size: 14px;
        display: block;
        margin-bottom: 9px;
    }

    .footer-link:hover {
        color: var(--deep);
    }

    @media (max-width: 991px) {
        .hero-section {
            min-height: auto;
            padding: 75px 0;
        }

        .dashboard-wrapper {
            margin-top: 45px;
        }

        .dashboard-window {
            transform: none;
        }

        .stat-box {
            border-right: none;
            margin-bottom: 20px;
        }

        .workflow-arrow {
            display: none;
        }
    }

    @media (max-width: 767px) {
        section {
            padding: 65px 0;
        }

        .hero-title {
            letter-spacing: -1px;
        }

        .hero-description {
            font-size: 16px;
        }

        .hero-trust {
            gap: 10px;
        }

        .included-box,
        .contact-box {
            padding: 28px 20px;
        }

        .pricing-card {
            margin-bottom: 20px;
        }

        .dashboard-body {
            padding: 10px;
        }

        .dash-sidebar {
            display: none;
        }

        .dash-number {
            font-size: 17px;
        }

        .mini-chart {
            height: 75px;
        }
    }
</style>


<!-- =========================================================
     NAVBAR
========================================================= -->
<nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light bg-white py-2">
    <div class="container">

     <a class="navbar-brand" href="#home">
    <img src="{{asset('/images/logo.png')}}" alt="POS Solution">
</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#why">Why Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#pricing">Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Reviews</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>

            <a href="{{url('/userRegistration')}}"
               class="btn btn-deep ms-lg-3 mt-3 mt-lg-0 px-4 py-2">
                🚀 Start Sale
            </a>

        </div>
    </div>
</nav>


<!-- =========================================================
     HERO
========================================================= -->
<section id="home" class="hero-section">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="hero-badge mb-4">
                    ✨ Smart POS for Modern Businesses
                </div>

                <h1 class="hero-title">
                    Run Your Business
                    <span>Smarter & Faster.</span>
                </h1>

                <p class="hero-description text-muted mt-4">
                    A complete POS solution built to manage your sales,
                    inventory, customers, expenses and business reports
                    from one simple platform.
                </p>

                <p class="text-muted">
                    Perfect for retail stores, clothing shops, boutiques,
                    supermarkets and growing businesses.
                </p>

                <div class="mt-4 d-flex flex-wrap gap-2">

                    <a href="{{url('/userRegistration')}}"
                       class="btn btn-deep px-4 py-3">
                        🚀 Start Your Business
                    </a>

                    <a href="#pricing"
                       class="btn btn-outline-deep px-4 py-3">
                        View Pricing
                    </a>

                </div>

                <div class="hero-trust">

                    <div class="hero-trust-item">
                        <span>✓</span> Easy to use
                    </div>

                    <div class="hero-trust-item">
                        <span>✓</span> Mobile friendly
                    </div>

                    <div class="hero-trust-item">
                        <span>✓</span> Secure & reliable
                    </div>

                    <div class="hero-trust-item">
                        <span>✓</span> Regular updates
                    </div>

                </div>

            </div>


            <!-- POS DASHBOARD PREVIEW -->
            <div class="col-lg-6">

                <div class="dashboard-wrapper">

                    <div class="dashboard-window">

                        <div class="window-header">
                            <div class="window-dot"></div>
                            <div class="window-dot"></div>
                            <div class="window-dot"></div>
                        </div>

                        <div class="dashboard-body">

                            <div class="row g-3">

                                <div class="col-3">
                                    <div class="dash-sidebar">

                                        <div class="dash-logo"></div>

                                        <div class="dash-menu active"></div>
                                        <div class="dash-menu"></div>
                                        <div class="dash-menu"></div>
                                        <div class="dash-menu"></div>
                                        <div class="dash-menu"></div>
                                        <div class="dash-menu"></div>

                                    </div>
                                </div>

                                <div class="col-9">

                                    <div class="row g-2 mb-3">

                                        <div class="col-4">
                                            <div class="dash-card">
                                                <small>Today's Sales</small>
                                                <div class="dash-number">৳48.5K</div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="dash-card">
                                                <small>Orders</small>
                                                <div class="dash-number">126</div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="dash-card">
                                                <small>Profit</small>
                                                <div class="dash-number">৳12.8K</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="dash-card mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <strong>Sales Overview</strong>
                                            <small>This Month</small>
                                        </div>

                                        <div class="mini-chart">
                                            <div class="mini-chart-line"></div>
                                        </div>
                                    </div>

                                    <div class="row g-2">

                                        <div class="col-6">
                                            <div class="dash-card">
                                                <small>Low Stock</small>
                                                <div class="dash-number">08</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="dash-card">
                                                <small>Customers</small>
                                                <div class="dash-number">1,248</div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     QUICK STATS
========================================================= -->
<div class="stats-section">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Business Access</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Business Control</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <div class="stat-number">12+</div>
                    <div class="stat-label">Business Modules</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-box">
                    <div class="stat-number">৳</div>
                    <div class="stat-label">Built for Bangladesh</div>
                </div>
            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     ABOUT
========================================================= -->
<section id="about">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">About Our POS</div>

            <h2 class="section-title">
                Everything Your Business Needs in One Place
            </h2>

            <p class="text-muted section-subtitle">
                Managing a business should not mean maintaining multiple
                notebooks, spreadsheets and disconnected systems.
                Our POS brings your daily business operations together
                in one simple and organized platform.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">⚡</div>

                    <h5>Sell Faster</h5>

                    <p class="text-muted">
                        Create bills quickly, search products instantly,
                        manage discounts and complete customer purchases
                        without unnecessary steps.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">📦</div>

                    <h5>Control Your Stock</h5>

                    <p class="text-muted">
                        Know what is available, what is selling and what
                        needs to be restocked. Inventory updates automatically
                        when sales and purchases are recorded.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">📊</div>

                    <h5>Understand Your Business</h5>

                    <p class="text-muted">
                        Get sales, expenses, profit, customer and inventory
                        information through clear reports and dashboards.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     WHY US
========================================================= -->
<section id="why" style="background: var(--bg-light);">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">Why Choose Us</div>

            <h2 class="section-title">
                Built for Real Business Owners
            </h2>

            <p class="text-muted section-subtitle">
                We focus on making everyday business management simple,
                fast and reliable — so you can spend less time managing
                paperwork and more time growing your business.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">⚡</div>

                    <h5>Ultra Fast Billing</h5>

                    <p class="text-muted">
                        Create invoices in seconds with product search,
                        barcode support, discounts and simple checkout.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">📦</div>

                    <h5>Smart Inventory</h5>

                    <p class="text-muted">
                        Automatically track stock movement, available
                        quantities, purchases, sales and low-stock products.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">💰</div>

                    <h5>Profit & Expense Tracking</h5>

                    <p class="text-muted">
                        Understand where your money is going and how much
                        your business is actually earning.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">👥</div>

                    <h5>Employee & Roles</h5>

                    <p class="text-muted">
                        Create staff accounts and control what each employee
                        can access based on their role and responsibility.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">📱</div>

                    <h5>Works Across Devices</h5>

                    <p class="text-muted">
                        Access your business system from desktop, laptop,
                        tablet or mobile with a responsive interface.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card p-4">

                    <div class="feature-icon">🔄</div>

                    <h5>Continuous Improvements</h5>

                    <p class="text-muted">
                        We continue improving the platform with maintenance,
                        fixes and new features to keep your business system
                        up to date.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     KEY MODULES
========================================================= -->
<section id="features">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">Powerful Modules</div>

            <h2 class="section-title">
                Everything You Need to Run Your Store
            </h2>

            <p class="text-muted section-subtitle">
                From the first customer purchase to end-of-day reporting,
                manage your complete business operation from one system.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">🧾</div>
                    <h6>POS Billing</h6>
                    <p>
                        Fast checkout, invoice generation, discounts,
                        payments and complete sales records.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">📦</div>
                    <h6>Product Management</h6>
                    <p>
                        Manage products, categories, prices, SKU,
                        stock quantities and product information.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">🏷️</div>
                    <h6>Barcode Support</h6>
                    <p>
                        Quickly find and sell products using barcode
                        scanning and product identification.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">👤</div>
                    <h6>Customer Management</h6>
                    <p>
                        Store customer information, purchase history,
                        outstanding balances and customer activity.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">🚚</div>
                    <h6>Supplier Management</h6>
                    <p>
                        Keep supplier information organized and track
                        purchases and supplier-related transactions.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">↩️</div>
                    <h6>Sales Return</h6>
                    <p>
                        Handle returned products and keep sales and
                        inventory records synchronized.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">💸</div>
                    <h6>Expense Management</h6>
                    <p>
                        Record daily business expenses and understand
                        your actual operating costs.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">📈</div>
                    <h6>Profit & Loss</h6>
                    <p>
                        Track revenue, expenses and profit to understand
                        the financial performance of your business.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">📊</div>
                    <h6>Business Reports</h6>
                    <p>
                        Analyze sales, products, customers, inventory,
                        expenses and business performance.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">👥</div>
                    <h6>Employee Management</h6>
                    <p>
                        Manage employees, roles and permissions while
                        keeping business operations organized.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">🏪</div>
                    <h6>Store Management</h6>
                    <p>
                        Organize your store information and maintain
                        your daily operational records.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="module-icon">🔐</div>
                    <h6>Role-Based Access</h6>
                    <p>
                        Give the right access to administrators, managers,
                        cashiers and other staff members.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
========================================================= -->
<section style="background: var(--bg-light);">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">Simple Process</div>

            <h2 class="section-title">
                Start Managing Your Business in 4 Steps
            </h2>

            <p class="text-muted section-subtitle">
                No complicated process. Set up your products, start selling
                and let the system handle the records for you.
            </p>

        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="workflow-card">

                    <div class="workflow-number">1</div>

                    <h5 class="fw-bold">Add Products</h5>

                    <p class="text-muted">
                        Add your products, prices, categories and opening stock.
                    </p>

                    <div class="workflow-arrow">→</div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="workflow-card">

                    <div class="workflow-number">2</div>

                    <h5 class="fw-bold">Make Sales</h5>

                    <p class="text-muted">
                        Select products, apply discounts and complete customer orders.
                    </p>

                    <div class="workflow-arrow">→</div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="workflow-card">

                    <div class="workflow-number">3</div>

                    <h5 class="fw-bold">Stock Updates</h5>

                    <p class="text-muted">
                        Your inventory records are updated as your business transactions happen.
                    </p>

                    <div class="workflow-arrow">→</div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="workflow-card">

                    <div class="workflow-number">4</div>

                    <h5 class="fw-bold">View Reports</h5>

                    <p class="text-muted">
                        Check sales, expenses, profit and business performance.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CLOTHING BUSINESS SECTION
========================================================= -->
<section>

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="eyebrow">Perfect for Retail & Clothing</div>

                <h2 class="section-title">
                    Built With Growing Retail Businesses in Mind
                </h2>

                <p class="text-muted" style="line-height:1.8;">
                    Running a clothing or retail store means managing hundreds
                    of products, different prices, customer purchases,
                    stock movement and daily transactions.
                </p>

                <p class="text-muted" style="line-height:1.8;">
                    Our POS helps bring all of these activities into one
                    organized system so you can spend less time maintaining
                    records and more time serving your customers.
                </p>

                <div class="row mt-4">

                    <div class="col-6 mb-3">
                        <strong>✓ Product Management</strong>
                    </div>

                    <div class="col-6 mb-3">
                        <strong>✓ Fast Billing</strong>
                    </div>

                    <div class="col-6 mb-3">
                        <strong>✓ Inventory Tracking</strong>
                    </div>

                    <div class="col-6 mb-3">
                        <strong>✓ Customer History</strong>
                    </div>

                    <div class="col-6 mb-3">
                        <strong>✓ Sales Reports</strong>
                    </div>

                    <div class="col-6 mb-3">
                        <strong>✓ Profit Tracking</strong>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="included-box">

                    <h4 class="fw-bold mb-4">
                        Your Business, Organized
                    </h4>

                    <div class="included-item">
                        <div class="included-check">✓</div>
                        <div>
                            <strong>Centralized Business Data</strong>
                            <div class="text-muted small">
                                Keep important business information in one place.
                            </div>
                        </div>
                    </div>

                    <div class="included-item">
                        <div class="included-check">✓</div>
                        <div>
                            <strong>Real-Time Stock Visibility</strong>
                            <div class="text-muted small">
                                Know your available products without checking notebooks.
                            </div>
                        </div>
                    </div>

                    <div class="included-item">
                        <div class="included-check">✓</div>
                        <div>
                            <strong>Clear Business Reports</strong>
                            <div class="text-muted small">
                                Make better decisions using your business data.
                            </div>
                        </div>
                    </div>

                    <div class="included-item mb-0">
                        <div class="included-check">✓</div>
                        <div>
                            <strong>Easy Daily Operations</strong>
                            <div class="text-muted small">
                                Designed for practical everyday business use.
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     PRICING
========================================================= -->
<section id="pricing" style="background: var(--bg-light);">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">Simple Pricing</div>

            <h2 class="section-title">
                Choose the Plan That Fits Your Business
            </h2>

            <p class="text-muted section-subtitle">
                Start small or make a one-time investment. Every plan gives
                you access to the core POS system and the tools you need
                to manage your business.
            </p>

        </div>

        <div class="row g-4 justify-content-center">

            <!-- MONTHLY -->
            <div class="col-lg-4 col-md-6">

                <div class="pricing-card">

                    <h4 class="fw-bold">Monthly</h4>

                    <p class="text-muted">
                        Flexible plan for businesses getting started.
                    </p>

                    <div class="price">
                        ৳1,000
                        <small>/ month</small>
                    </div>

                    <div class="price-description">
                        Pay monthly and manage your business without a long-term commitment.
                    </div>

                    <ul class="pricing-list">

                        <li>
                            <span>✓</span> Full POS access
                        </li>

                        <li>
                            <span>✓</span> Product management
                        </li>

                        <li>
                            <span>✓</span> Inventory management
                        </li>

                        <li>
                            <span>✓</span> Customer management
                        </li>

                        <li>
                            <span>✓</span> Business reports
                        </li>

                        <li>
                            <span>✓</span> Regular maintenance
                        </li>

                        <li>
                            <span>✓</span> Feature updates
                        </li>

                    </ul>

                    <a href="{{url('/userRegistration')}}"
                       class="btn btn-outline-deep w-100 py-3">
                        Get Started
                    </a>

                </div>

            </div>


            <!-- YEARLY -->
            <div class="col-lg-4 col-md-6">

                <div class="pricing-card popular">

                    <div class="popular-badge">
                        ⭐ BEST VALUE
                    </div>

                    <h4 class="fw-bold">Yearly</h4>

                    <p class="text-muted">
                        Best choice for growing businesses.
                    </p>

                    <div class="price">
                        ৳10,000
                        <small>/ year</small>
                    </div>

                    <div class="price-description">
                        Save compared with paying month-to-month while keeping full access.
                    </div>

                    <ul class="pricing-list">

                        <li>
                            <span>✓</span> Everything in Monthly
                        </li>

                        <li>
                            <span>✓</span> Full POS access
                        </li>

                        <li>
                            <span>✓</span> Inventory & sales tracking
                        </li>

                        <li>
                            <span>✓</span> Customer & supplier management
                        </li>

                        <li>
                            <span>✓</span> Reports & analytics
                        </li>

                        <li>
                            <span>✓</span> Maintenance & support
                        </li>

                        <li>
                            <span>✓</span> Future feature updates
                        </li>

                    </ul>

                    <a href="{{url('/userRegistration')}}"
                       class="btn btn-deep w-100 py-3">
                        Choose Yearly
                    </a>

                </div>

            </div>


            <!-- LIFETIME -->
            <div class="col-lg-4 col-md-6">

                <div class="pricing-card">

                    <h4 class="fw-bold">Lifetime</h4>

                    <p class="text-muted">
                        One-time investment for long-term use.
                    </p>

                    <div class="price">
                        ৳50,000
                        <small>one-time</small>
                    </div>

                    <div class="price-description">
                        Pay once and receive lifetime access to the POS system.
                    </div>

                    <ul class="pricing-list">

                        <li>
                            <span>✓</span> Lifetime POS access
                        </li>

                        <li>
                            <span>✓</span> All available modules
                        </li>

                        <li>
                            <span>✓</span> Inventory & sales
                        </li>

                        <li>
                            <span>✓</span> Customer & supplier management
                        </li>

                        <li>
                            <span>✓</span> Business reports
                        </li>

                        <li>
                            <span>✓</span> Maintenance & support
                        </li>

                        <li>
                            <span>✓</span> Eligible future updates
                        </li>

                    </ul>

                    <a href="{{url('/userRegistration')}}"
                       class="btn btn-deep w-100 py-3">
                        Get Lifetime Access
                    </a>

                </div>

            </div>

        </div>

        <div class="pricing-note">
            * Pricing and included services can be adjusted based on your final business policy.
        </div>

    </div>

</section>


<!-- =========================================================
     WHAT YOU GET
========================================================= -->
<section>

    <div class="container">

        <div class="included-box">

            <div class="row align-items-center">

                <div class="col-lg-5 mb-4 mb-lg-0">

                    <div class="eyebrow">More Than Software</div>

                    <h2 class="section-title">
                        We Keep Your POS Ready for Your Business
                    </h2>

                    <p class="text-muted" style="line-height:1.8;">
                        Your business changes over time. That's why the goal
                        isn't simply to give you software and leave you alone.
                        The system can continue to receive maintenance,
                        improvements and new features as it evolves.
                    </p>

                </div>

                <div class="col-lg-7">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Full Access</strong>
                                    <div class="text-muted small">
                                        Access the core POS functionality.
                                    </div>
                                </div>
                            </div>

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Maintenance</strong>
                                    <div class="text-muted small">
                                        Keep the platform maintained.
                                    </div>
                                </div>
                            </div>

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Bug Fixes</strong>
                                    <div class="text-muted small">
                                        Improvements for a smoother experience.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Feature Updates</strong>
                                    <div class="text-muted small">
                                        Continue improving the system.
                                    </div>
                                </div>
                            </div>

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Business Support</strong>
                                    <div class="text-muted small">
                                        Help when you need assistance.
                                    </div>
                                </div>
                            </div>

                            <div class="included-item">
                                <div class="included-check">✓</div>
                                <div>
                                    <strong>Long-Term Platform</strong>
                                    <div class="text-muted small">
                                        Designed to grow with your business.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     TESTIMONIALS
========================================================= -->
<section id="testimonials" style="background: var(--bg-light);">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">Customer Experience</div>

            <h2 class="section-title">
                What Business Owners Say
            </h2>

            <p class="text-muted section-subtitle">
                A good POS should make everyday work easier, not more complicated.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="d-flex align-items-center mb-3">

                        <img src="{{asset('/images/man.jpg')}}"
                             class="avatar me-3"
                             alt="Customer">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Rafi Ahmed
                            </h6>

                            <small class="text-muted">
                                Retail Shop Owner
                            </small>
                        </div>

                    </div>

                    <div class="stars mb-3">
                        ★★★★★
                    </div>

                    <p class="testimonial-text">
                        “The billing process is much easier now. I can find
                        products quickly and keep track of my daily sales
                        without maintaining everything manually.”
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="d-flex align-items-center mb-3">

                        <img src="{{asset('/images/woman.jpg')}}"
                             class="avatar me-3"
                             alt="Customer">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Nusrat Jahan
                            </h6>

                            <small class="text-muted">
                                Boutique Business Owner
                            </small>
                        </div>

                    </div>

                    <div class="stars mb-3">
                        ★★★★★
                    </div>

                    <p class="testimonial-text">
                        “Inventory management has become much more organized.
                        I can quickly understand which products are available
                        and what needs attention.”
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="d-flex align-items-center mb-3">

                        <img src="{{asset('/images/man.jpg')}}"
                             class="avatar me-3"
                             alt="Customer">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Mehedi Hasan
                            </h6>

                            <small class="text-muted">
                                Super Shop Manager
                            </small>
                        </div>

                    </div>

                    <div class="stars mb-3">
                        ★★★★★
                    </div>

                    <p class="testimonial-text">
                        “The reports give us a much clearer picture of our
                        business. We can review sales, expenses and overall
                        performance without complicated spreadsheets.”
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FAQ
========================================================= -->
<section id="faq">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">FAQ</div>

            <h2 class="section-title">
                Frequently Asked Questions
            </h2>

            <p class="text-muted section-subtitle">
                Everything you should know before getting started.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                        Can I use the POS from mobile and desktop?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq1" class="collapse show">
                        <div class="faq-answer">
                            Yes. The website is designed to work across
                            desktop, laptop, tablet and mobile screen sizes.
                        </div>
                    </div>

                </div>


                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                        What is included in the POS system?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq2" class="collapse">
                        <div class="faq-answer">
                            The system can include billing, product management,
                            inventory, customers, suppliers, expenses,
                            reports, employees, roles and other business
                            management features.
                        </div>
                    </div>

                </div>


                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                        Do you provide future updates?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq3" class="collapse">
                        <div class="faq-answer">
                            The platform is designed to receive ongoing
                            maintenance, improvements, bug fixes and new
                            features based on the product roadmap and plan.
                        </div>
                    </div>

                </div>


                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq4">
                        What does the Lifetime plan mean?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq4" class="collapse">
                        <div class="faq-answer">
                            The Lifetime plan is a one-time purchase of
                            ৳50,000 for lifetime access to the POS platform,
                            subject to the final terms of your service policy.
                        </div>
                    </div>

                </div>


                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq5">
                        Is this suitable for a clothing business?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq5" class="collapse">
                        <div class="faq-answer">
                            Yes. The system is especially suitable for retail,
                            clothing shops, boutiques and other businesses
                            that need product, stock, sales and customer
                            management.
                        </div>
                    </div>

                </div>


                <div class="faq-item">

                    <button type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq6">
                        Can I add employees to the system?
                        <span class="float-end">+</span>
                    </button>

                    <div id="faq6" class="collapse">
                        <div class="faq-answer">
                            Yes. Employee accounts and role-based permissions
                            can be used to control access for administrators,
                            managers, cashiers and other staff.
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FINAL CTA
========================================================= -->
<section>

    <div class="container">

        <div class="final-cta text-center">

            <div style="position:relative;z-index:2;">

                <h2 class="fw-bold mb-3">
                    Ready to Take Control of Your Business?
                </h2>

                <p class="mb-4" style="opacity:.9;max-width:650px;margin:auto;">
                    Replace manual records with a modern POS system that
                    helps you sell faster, manage stock better and understand
                    your business more clearly.
                </p>

                <div class="d-flex justify-content-center flex-wrap gap-2">

                    <a href="{{url('/userRegistration')}}"
                       class="btn btn-light px-4 py-3 fw-bold">
                        🚀 Start Your POS
                    </a>

                    <a href="#pricing"
                       class="btn btn-outline-light px-4 py-3 fw-bold">
                        View Plans
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CONTACT
========================================================= -->
<section id="contact">

    <div class="container">

        <div class="contact-box">

            <div class="row g-5">

                <div class="col-lg-5">

                    <div class="eyebrow">Get in Touch</div>

                    <h2 class="section-title">
                        Let's Talk About Your Business
                    </h2>

                    <p class="text-muted" style="line-height:1.8;">
                        Have questions about the POS system, pricing,
                        features or setup? Send us a message and our team
                        will help you understand the best option for your business.
                    </p>

                    <div class="contact-info">
                        <strong>📧 Email</strong>
                        <div class="text-muted mt-1">
                            pos_solution@gmail.com
                        </div>
                    </div>

                    <div class="contact-info">
                        <strong>📞 Phone</strong>
                        <div class="text-muted mt-1">
                            +880 123 456 789
                        </div>
                    </div>

                    <div class="contact-info">
                        <strong>💬 Support</strong>
                        <div class="text-muted mt-1">
                            We're here to help your business get started.
                        </div>
                    </div>

                </div>


                <div class="col-lg-7">

                    <form>

                        <div class="row">

                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control mb-3 py-3"
                                    placeholder="Your Name">
                            </div>

                            <div class="col-md-6">
                                <input
                                    type="email"
                                    class="form-control mb-3 py-3"
                                    placeholder="Email Address">
                            </div>

                        </div>

                        <input
                            type="text"
                            class="form-control mb-3 py-3"
                            placeholder="Business Name">

                        <textarea
                            class="form-control mb-3"
                            rows="6"
                            placeholder="Tell us how we can help you..."></textarea>

                        <button
                            type="button"
                            class="btn btn-deep w-100 py-3">
                            Send Message
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FOOTER
========================================================= -->
<footer class="bg-white border-top pt-5 pb-4">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-5">

               <img
    src="{{asset('/images/logo.png')}}"
    class="footer-logo"
    alt="POS Solution">

                <p class="text-muted mt-3"
                   style="max-width:400px;line-height:1.7;">
                    A modern POS solution designed to help businesses
                    manage sales, inventory, customers, expenses and
                    business performance from one platform.
                </p>

            </div>


            <div class="col-6 col-lg-2">

                <h6 class="fw-bold mb-3">
                    Product
                </h6>

                <a href="#features" class="footer-link">
                    Features
                </a>

                <a href="#pricing" class="footer-link">
                    Pricing
                </a>

                <a href="#faq" class="footer-link">
                    FAQ
                </a>

            </div>


            <div class="col-6 col-lg-2">

                <h6 class="fw-bold mb-3">
                    Company
                </h6>

                <a href="#about" class="footer-link">
                    About
                </a>

                <a href="#why" class="footer-link">
                    Why Us
                </a>

                <a href="#contact" class="footer-link">
                    Contact
                </a>

            </div>


            <div class="col-lg-3">

                <h6 class="fw-bold mb-3">
                    Get Started
                </h6>

                <p class="text-muted small">
                    Start managing your business with a smarter POS system.
                </p>

                <a href="{{url('/userRegistration')}}"
                   class="btn btn-deep px-4">
                    🚀 Start Sale
                </a>

            </div>

        </div>

        <hr class="my-4">

        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    text-muted small">

            <div>
                © 2026 POS Solution. All rights reserved.
            </div>

            <div class="mt-2 mt-md-0">
                Built for modern businesses.
            </div>

        </div>

    </div>

</footer>


@endsection
