<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Run Master Software — race-day management with open APIs, plug-and-play interfaces, and cost-effective tools for organizers.">
    <meta name="author" content="Run Master Software">

    <title>Run Master Software</title>

    <base href="<?= base_url() ?>">
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/landing-page.css') ?>" rel="stylesheet">
    <link href="<?= base_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav brand-lockup" href="#">
                <svg class="brand-mark" width="22" height="22" viewBox="0 0 40 40" aria-hidden="true" focusable="false">
                    <circle cx="20" cy="20" r="18" fill="none" stroke="currentColor" stroke-width="2.5"/>
                    <path d="M8 24c4-10 8-14 12-14s6 8 12 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="28" cy="14" r="2.5" fill="currentColor"/>
                </svg>
                <span>Run Master</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#features">Features</a></li>
                <li><a href="#apis">APIs</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="intro-header" id="about">
    <div class="intro-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <p class="brand-hero">
                        <svg class="brand-mark brand-mark--hero" width="40" height="40" viewBox="0 0 40 40" aria-hidden="true" focusable="false">
                            <circle cx="20" cy="20" r="18" fill="none" stroke="currentColor" stroke-width="2.5"/>
                            <path d="M8 24c4-10 8-14 12-14s6 8 12 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="28" cy="14" r="2.5" fill="currentColor"/>
                        </svg>
                        Run Master
                    </p>
                    <h1>Software that finishes every race with you</h1>
                    <p class="intro-lead">Manage events, open your data to developers, and drop race tools straight onto your site — without burning the budget.</p>
                    <div class="intro-actions">
                        <a href="#features" class="btn btn-primary btn-lg btn-pace">Explore features</a>
                        <a href="#contact" class="btn btn-default btn-lg btn-ghost">Talk to us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="content-section-a reveal" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <p class="feature-kicker">01 — Management</p>
                <h2 class="section-heading">Quick and easy software management</h2>
                <p class="lead">Stand up registrations, timing boards, and volunteer checklists from one calm dashboard. Less admin, more race day.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive feature-photo" src="<?= base_url('img/feature-manage.jpg') ?>" alt="Runner racing along a scenic road">
            </div>
        </div>
    </div>
</section>

<section class="content-section-b reveal" id="apis">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
                <p class="feature-kicker">02 — Developers</p>
                <h2 class="section-heading">Open APIs for developers</h2>
                <p class="lead">Connect leaderboards, CRM tools, and custom race apps with documented REST endpoints built for speed and reliability.</p>
            </div>
            <div class="col-lg-5 col-sm-pull-6 col-sm-6">
                <img class="img-responsive feature-photo" src="<?= base_url('img/feature-api.jpg') ?>" alt="Marathon runners moving through a city course">
            </div>
        </div>
    </div>
</section>

<section class="content-section-a reveal">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <p class="feature-kicker">03 — Integration</p>
                <h2 class="section-heading">Plug and play with your site</h2>
                <p class="lead">Embed registration, live results, and athlete lookups with a few lines of code. Your brand stays front and center.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive feature-photo" src="<?= base_url('img/feature-plug.jpg') ?>" alt="Group of runners training on a track">
            </div>
        </div>
    </div>
</section>

<section class="content-section-b reveal">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
                <p class="feature-kicker">04 — Value</p>
                <h2 class="section-heading">Cost effective from mile one</h2>
                <p class="lead">Scale from local 5Ks to city marathons with pricing that respects nonprofits, clubs, and growing race series.</p>
            </div>
            <div class="col-lg-5 col-sm-pull-6 col-sm-6">
                <img class="img-responsive feature-photo" src="<?= base_url('img/feature-cost.jpg') ?>" alt="Running shoes ready for race day">
            </div>
        </div>
    </div>
</section>

<a name="login"></a>
<section class="content-section-a reveal auth-section" id="login">
    <div class="container">
        <?php if (! empty($load_error) && $load_error === 'true'): ?>
        <div class="row">
            <div class="col-sm-12 alert alert-danger">
                <?php if (! empty($error_message)): ?>
                    <?= esc($error_message) ?>
                <?php else: ?>
                    <?= validation_list_errors() ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <p class="feature-kicker">Account</p>
                <h2 class="section-heading">Login</h2>
                <?php
                echo form_open(site_url('login'));
                echo form_input([
                    'name'        => 'username',
                    'id'          => 'login_username',
                    'class'       => 'form-control',
                    'placeholder' => 'Email',
                    'value'       => set_value('username'),
                    'type'        => 'email',
                ]);
                echo form_password([
                    'name'        => 'password',
                    'id'          => 'login_password',
                    'class'       => 'form-control',
                    'placeholder' => 'Password',
                    'value'       => '',
                ]);
                echo form_submit('submit', 'Login', ['class' => 'btn btn-default btn-auth']);
                echo form_close();
                ?>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <div class="create-panel">
                    <h2 class="section-heading create-heading">Create Account</h2>
                    <?php
                    echo form_open(site_url('create'), ['class' => 'create-form']);
                    echo form_input([
                        'name'        => 'username',
                        'id'          => 'create_username',
                        'class'       => 'form-control',
                        'placeholder' => 'Enter Username',
                        'value'       => set_value('username'),
                    ]);
                    echo form_password([
                        'name'        => 'password',
                        'id'          => 'create_password',
                        'class'       => 'form-control',
                        'placeholder' => 'Enter Password',
                        'value'       => '',
                    ]);
                    echo form_password([
                        'name'        => 'password2',
                        'id'          => 'create_password2',
                        'class'       => 'form-control',
                        'placeholder' => 'Retype Password',
                        'value'       => '',
                    ]);
                    echo form_input([
                        'name'        => 'email',
                        'id'          => 'create_email',
                        'class'       => 'form-control',
                        'placeholder' => 'Enter Email',
                        'value'       => set_value('email'),
                        'type'        => 'email',
                    ]);
                    echo form_submit('submit', 'Create Account', ['class' => 'btn btn-default btn-create']);
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner" id="contact">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center banner-copy">
                <h2>Ready to put Run Master on your course?</h2>
                <p>Tell us about your next event and we will help you line up the right tools.</p>
                <a href="mailto:hello@runmaster.software" class="btn btn-primary btn-lg btn-pace">hello@runmaster.software</a>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="#features">Features</a></li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="#apis">APIs</a></li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="#login">Login</a></li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; Run Master Software <?= date('Y') ?>. All Rights Reserved. Photos via <a href="https://unsplash.com/s/photos/marathon" target="_blank" rel="noopener">Unsplash</a>.</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script>
(function () {
    var nodes = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window)) {
        nodes.forEach(function (n) { n.classList.add('is-visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.18 });
    nodes.forEach(function (n) { observer.observe(n); });
})();
</script>

</body>

</html>
