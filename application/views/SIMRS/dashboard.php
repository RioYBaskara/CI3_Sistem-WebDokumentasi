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
    <title>Dashboard - SIMRS ITM</title>
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
        }
    </style>

    <style>
        .search-fasyankes {
            position: fixed;
            bottom: 80px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body>
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo-theme.min.js?1692870487"></script>

    <!-- search Fasyankes -->
    <button class="p-3 mt-3 btn btn-square btn-ghost-link fs-4 search-fasyankes" data-bs-toggle="modal"
        data-bs-target="#modal-search-fasyankes">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-report-search">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
            <path d="M18 12v-5a2 2 0 0 0 -2 -2h-2" />
            <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
            <path d="M8 11h4" />
            <path d="M8 15h3" />
            <path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
            <path d="M18.5 19.5l2.5 2.5" />
        </svg>
        Cari Fasyankes
    </button>

    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href=".">
                        <img src="<?= base_url(); ?>assets/img/logoitm.png" width="110" height="32" alt="SIMRS ITM"
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="gap-3 px-1 d-flex d-block d-lg-none">
                    <a href="?theme=dark" class="px-0 nav-link hide-theme-dark d-block d-md-none"
                        title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="px-0 nav-link hide-theme-light d-block d-md-none"
                        title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                </div>
                <div class="flex-row navbar-nav order-md-last d-none d-md-flex">
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="px-0 nav-link hide-theme-dark" title="Enable dark mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="px-0 nav-link hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="./">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <div class="page-pretitle">
                                SIMRS
                            </div>
                            <h1 class="page-title">
                                Dashboard
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <h4 class="mb-0 text-secondary"><?= $total_rows ?> Fasyankes Tersedia</h4>
                        <!-- Looping data fasyankes -->
                        <?php foreach ($fasyankes as $main): ?>
                            <div class="col-sm-6 col-lg-4" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Klik untuk pergi ke halaman dokumentasi">
                                <a href="<?= base_url('/SIMRS/dokumentasi') ?>/<?= $main['fasyankes_kode'] ?>"
                                    style="cursor: pointer" class="card">
                                    <div class="card-body w-100 h-100 justify-content-between">
                                        <div class="mb-2 d-flex align-items-center">
                                            <div class="subheader"><?= $main['fasyankes_tipe']; ?></div>
                                            <div class="ms-auto lh-1">
                                                <div class="text-secondary"><strong><?= $main['fasyankes_kode']; ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <h1><?= $main['fasyankes_nm']; ?></h1>
                                        </div>
                                        <div>
                                            <div class="d-flex">
                                                <h4 class="m-0"><span class="text-secondary">BPJS:
                                                    </span><?= $main['fasyankes_bpjs_kode'] ?: '-'; ?></h4>
                                            </div>
                                            <div class="d-flex">
                                                <h4 class="m-0"><span class="text-secondary">Alamat:
                                                    </span><?= $main['fasyankes_alamat_lengkap']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2 card-body w-100">
                                        <div class="justify-content-between d-flex">
                                            <div class="d-flex align-items-center">
                                                <h6 class="m-0 text-secondary text-start">
                                                    Updated:
                                                    <strong><?= date('Y-m-d', strtotime($main['updated_at'])); ?></strong>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <?php if ($main['active_st'] == 0): ?>
                                                    <span class="status-indicator status-red status-indicator-animated">
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="status-indicator status-green status-indicator-animated">
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!empty($pagination)): ?>
                    <div class="my-5 container-xl">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $pagination; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>


            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="flex-row-reverse text-center row align-items-center">
                        <div class="mt-3 col-12 col-lg-auto mt-lg-0">
                            <ul class="mb-0 list-inline list-inline-dots">
                                <li class="list-inline-item">
                                    Copyright &copy; <?= date("Y"); ?>
                                    <a href="." class="link-secondary">Indo Techno Medic</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Search -->
    <div class="modal modal-blur fade" id="modal-search-fasyankes" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Fasyankes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" class="form-control" id="search-fasyankes"
                            placeholder="Cari Fasyankes berdasarkan nama..." autofocus>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row" id="fasyankes-results">
                        <!-- Populate search results here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Libs JS -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487"
        defer></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487"
        defer></script>
    <!-- Tabler Core -->
    <script src="<?= base_url(); ?>assets/tabler/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo.min.js?1692870487" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pageLinks = document.querySelectorAll('.digit-link a');
            pageLinks.forEach(function (link) {
                link.classList.add('page-link');
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(function ($) {
            $('#modal-search-fasyankes').on('shown.bs.modal', function () {
                $('input[id="search-fasyankes"]').focus();
            });
        });
    </script>

    <!-- search fasyankes -->
    <script>
        $(document).ready(function () {
            $('#search-fasyankes').on('input', function () {
                const query = $(this).val();

                if (query === '') {
                    $('#fasyankes-results').html('');
                    return;
                }

                $.ajax({
                    url: "<?= base_url('SIMRS/searchFasyankes') ?>",
                    type: "POST",
                    data: {
                        search: query
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#fasyankes-results').html('');

                        if (data.length > 0) {
                            data.forEach(function (item) {
                                const html = `
                            <div class="mb-1 col-sm-12" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Klik untuk pergi ke halaman dokumentasi">
                                <a href="<?= base_url('/SIMRS/dokumentasi') ?>/${item.fasyankes_kode}"
                                    style="cursor: pointer" class="card">
                                    <div class="card-body w-100 h-100 justify-content-between">
                                        <div class="mb-2 d-flex align-items-center">
                                            <div class="subheader">${item.fasyankes_tipe}</div>
                                            <div class="ms-auto lh-1">
                                                <div class="text-secondary">${item.fasyankes_kode}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <h1>${item.fasyankes_nm}</h1>
                                        </div>
                                        <div>
                                            <div class="d-flex">
                                                <h4 class="m-0"><span class="text-secondary">Alamat:
                                                    </span>${item.fasyankes_alamat_lengkap}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                                $('#fasyankes-results').append(html);
                            });
                        } else {
                            $('#fasyankes-results').html('<p class="text-center text-muted">Tidak ada hasil ditemukan.</p>');
                        }
                    },
                    error: function () {
                        $('#fasyankes-results').html('<p class="text-center text-danger">Terjadi kesalahan. Silakan coba lagi.</p>');
                    }
                });
            });
        });
    </script>


</body>

</html>