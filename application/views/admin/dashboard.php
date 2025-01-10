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
    <title>Dashboard - Admin SIMRS ITM</title>
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
</head>

<body>
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo-theme.min.js?1692870487"></script>
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
                <a href="?theme=dark" class="px-0 nav-link hide-theme-dark d-block d-md-none" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
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
                <a href="<?= base_url(); ?>Admin/logout" class="px-0 nav-link d-block d-md-none" title="Logout"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>
                </a>
                <div class="flex-row navbar-nav order-md-last">
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
                        <a href="<?= base_url(); ?>Admin/logout" class="px-0 nav-link" title="Logout"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
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
                                Admin
                            </div>
                            <h1 class="page-title">
                                Dashboard
                            </h1>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-fasyankes">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Buat Fasyankes Baru
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-fasyankes" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
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
                                title="Klik untuk edit atau ke halaman dokumentasi">
                                <a style="cursor: pointer" class="card" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-fasyankes-<?= $main['fasyankes_kode'] ?>">
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

    <!-- note:modal foreach kurang efektif, karena meload semua modal. kedepannya pakai js agar hanya perlu 1 modal -->
    <?php foreach ($fasyankes as $main): ?>
        <div class="modal modal-blur fade" id="modal-edit-fasyankes-<?= $main['fasyankes_kode'] ?>" tabindex="-1"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Fasyankes <?= $main['fasyankes_nm'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('admin/editfasyankes'); ?>" method="post">
                        <input type="hidden" name="current_fasyankes_kode" value="<?= $main['fasyankes_kode']; ?>">
                        <input type="hidden" name="current_fasyankes_nm" value="<?= $main['fasyankes_nm']; ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label text-secondary">Kode Fasyankes</label>
                                <input required type="text" class="form-control" name="fasyankes_kode"
                                    value="<?= $main['fasyankes_kode'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary">Tipe Fasyankes</label>
                                <input required type="text" class="form-control" name="fasyankes_tipe"
                                    value="<?= $main['fasyankes_tipe'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary">Nama Fasyankes</label>
                                <input required type="text" class="form-control" name="fasyankes_nm"
                                    value="<?= $main['fasyankes_nm'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary">No. BPJS Fasyankes</label>
                                <input type="text" class="form-control" name="fasyankes_bpjs_kode"
                                    value="<?= $main['fasyankes_bpjs_kode'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary">Alamat Fasyankes</label>
                                <input type="text" class="form-control" name="fasyankes_alamat_lengkap"
                                    value="<?= $main['fasyankes_alamat_lengkap'] ?>">
                            </div>
                            <label class="form-label text-secondary">Active?</label>
                            <div class="mb-3 form-selectgroup-boxes row">
                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="active_st" value="1" class="form-selectgroup-input"
                                            <?= ($main['active_st'] == 1) ? 'checked' : '' ?>>
                                        <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="d-block text-secondary">Active</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="active_st" value="0" class="form-selectgroup-input"
                                            <?= ($main['active_st'] == 0) ? 'checked' : '' ?>>
                                        <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="d-block text-secondary">Nonactive</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="deleted_st" name="deleted_st">
                                <label class="form-check-label" for="deleted_st">
                                    Hapus data?
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <a href="<?= base_url(); ?>Admin/dokumentasi/<?= $main['fasyankes_kode'] ?>"
                                class="btn btn-info">
                                Ke Page Dokumentasi
                            </a>
                            <button type="submit" class="btn btn-primary">Edit Fasyankes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- modal add data fasyankes baru -->
    <div class="modal modal-blur fade" id="modal-add-fasyankes" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Fasyankes Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="<?= base_url('admin/tambahfasyankes'); ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label text-secondary">Kode Fasyankes</label>
                            <input required type="text" class="form-control" name="fasyankes_kode"
                                placeholder="Contoh: 3371014">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label text-secondary">Tipe Fasyankes</label>
                            <input required type="text" class="form-control" name="fasyankes_tipe"
                                placeholder="Contoh: RUMAH SAKIT">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary">Nama Fasyankes</label>
                            <input required type="text" class="form-control" name="fasyankes_nm"
                                placeholder="Contoh: RSU TIDAR">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary">No. BPJS Fasyankes</label>
                            <input type="text" class="form-control" name="fasyankes_bpjs_kode" placeholder="Contoh: -">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary">Alamat Fasyankes</label>
                            <input type="text" class="form-control" name="fasyankes_alamat_lengkap"
                                placeholder="Contoh: Jl. Tidar No.30 A, Magelang">
                        </div>
                        <label class="form-label text-secondary">Active?</label>
                        <div class="mb-3 form-selectgroup-boxes row">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="active_st" value="1" class="form-selectgroup-input"
                                        <?= (@$main['active_st'] == 1) ? 'checked' : '' ?>>
                                    <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="d-block text-secondary">Active</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="active_st" value="0" class="form-selectgroup-input"
                                        <?= (@$main['active_st'] == 0) ? 'checked' : '' ?>>
                                    <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="d-block text-secondary">Nonactive</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Fasyankes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- flashdata -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-blur alert-success alert-dismissible position-fixed"
            style="bottom: 70px; right: 20px; z-index: 1050; max-width: 50rem;">
            <div class="d-flex">
                <div>
                    <!-- SVG icon for success (check icon) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </div>
                <div class="ms-2">
                    <h4 class="alert-title">Success!</h4>
                    <div class="text-secondary"><?= $this->session->flashdata('success') ?></div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible position-fixed"
            style="bottom: 70px; right: 20px; z-index: 1050; max-width: 50rem;">
            <div class="d-flex">
                <div>
                    <!-- SVG icon for error (cross icon) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </div>
                <div class="ms-2">
                    <h4 class="alert-title">Error!</h4>
                    <div class="text-secondary"><?= $this->session->flashdata('error') ?></div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('warning')): ?>
        <div class="alert alert-warning alert-dismissible position-fixed"
            style="bottom: 70px; right: 20px; z-index: 1050; max-width: 50rem;">
            <div class="d-flex">
                <div>
                    <!-- SVG icon for warning -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-exclamation-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01m8.66 -4.66a9 9 0 1 1 -13.32 0a9 9 0 0 1 13.32 0z" />
                    </svg>
                </div>
                <div class="ms-2">
                    <h4 class="alert-title">Warning!</h4>
                    <div class="text-secondary"><?= $this->session->flashdata('warning') ?></div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php endif; ?>

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
</body>

</html>