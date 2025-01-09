<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in Admin - ITM Dokumentasi</title>
    <!-- CSS files -->
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .rotating-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 200vw;
            height: 200vh;
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -2;
            animation: rotateBackground 15s linear forwards, subtleMovement 6s infinite ease-in-out;
            animation-delay: 0s, 15s;
        }

        .rotating-background-light {
            position: fixed;
            opacity: 10%;
            top: 0;
            left: 0;
            width: 190vw;
            height: 190vh;
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -2;
            animation: rotateBackgroundlight 15s linear forwards, subtleMovement 7s infinite ease-in-out;
            animation-delay: 0s, 15s;
        }

        @keyframes rotateBackground {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(25deg);
            }
        }

        @keyframes rotateBackgroundlight {
            0% {
                transform: rotate(50deg);
            }

            100% {
                transform: rotate(25deg);
            }
        }

        /* Animasi untuk gerakan kecil */
        @keyframes subtleMovement {
            0% {
                transform: rotate(25deg) translate(0, 0);
            }

            25% {
                transform: rotate(26deg) translate(2px, -1px);
            }

            50% {
                transform: rotate(25.5deg) translate(-1px, 2px);
            }

            75% {
                transform: rotate(24.8deg) translate(1px, -2px);
            }

            100% {
                transform: rotate(25deg) translate(0, 0);
            }
        }
    </style>

    <style>
        .toggle-theme {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="rotating-background"
        style="background-image: url(<?= base_url(); ?>/assets/tailwind/img/Wireframe.png);"></div>
    <div class="rotating-background-light"
        style="background-image: url(<?= base_url(); ?>/assets/tailwind/img/Wireframedark.png);"></div>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <div class="mb-4 text-center">
                <a href="<?= base_url(); ?>" class="navbar-brand navbar-brand-autodark">
                    <img src="<?= base_url(); ?>/assets/tailwind/img/logoitm.png" width="110" height="32"
                        alt="Indo Techno Medic" class="navbar-brand-image">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-4 text-center h2">Login Admin</h2>
                    <?php if ($this->session->flashdata('error')): ?>
                        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php endif; ?>
                    <form action="<?= site_url('Admin/loginProcess'); ?>" method="POST" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" required class="form-control"
                                autocomplete="one-time-code">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" required class="form-control" id="password-input"
                                    autocomplete="one-time-code">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                                        id="toggle-password">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="toggle-theme">
        <a href="?theme=dark" class="px-0 nav-link hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
            </svg>
        </a>
        <a href="?theme=light" class="px-0 nav-link hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
            </svg>
        </a>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url(); ?>assets/tabler/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo.min.js?1692870487" defer></script>
    <script>
        const passwordInput = document.getElementById('password-input');
        const togglePassword = document.getElementById('toggle-password');

        togglePassword.addEventListener('click', (e) => {
            e.preventDefault();
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.title = 'Hide password';
            } else {
                passwordInput.type = 'password';
                togglePassword.title = 'Show password';
            }
        });
    </script>
</body>

</html>