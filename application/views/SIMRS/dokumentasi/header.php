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
    <!-- fieldmarktitle -->
    <title>Dokumentasi <?= $fasyankes_data['fasyankes_nm']; ?> - SIMRS ITM</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="assets/css/fontawesome/css/font-awesome.min.css" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/tabler/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/fontawesome/css/font-awesome.min.css" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tabler CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        html {
            scroll-padding-top: 25vh;
            scroll-behavior: smooth;
        }

        #daftar-isi a {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease, font-weight 0.3s ease;

            position: -webkit-sticky;
            position: sticky;
            top: 20px;
            max-height: 80vh;
            overflow-y: auto;
        }

        #daftar-isi a.active {
            color: #007bff;
            font-weight: bold;
            border-left: 3px solid #007bff;
            padding-left: 5px;
        }

        @media (max-width: 768px) {
            h1.logoitm {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    </style>
</head>

<body>
    <script src="<?= base_url(); ?>assets/tabler/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page">