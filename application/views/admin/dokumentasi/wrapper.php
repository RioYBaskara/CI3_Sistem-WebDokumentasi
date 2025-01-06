<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="mb-3">
                        <ol class="breadcrumb breadcrumb-arrows fs-4" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dokumentasi') ?>">Dokumentasi</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#"><?= $fasyankes_kode ?></a></li>

                            <?php foreach ($breadcrumb as $index => $item): ?>
                                <li class="breadcrumb-item <?= ($index === array_key_last($breadcrumb)) ? 'active' : '' ?>"
                                    <?= ($index === array_key_last($breadcrumb)) ? 'aria-current="page"' : '' ?>>
                                    <?php if ($index === array_key_last($breadcrumb)): ?>
                                        <!-- Jangan gunakan link untuk item terakhir -->
                                        <?= $item['menu_nm'] ?>
                                    <?php else: ?>
                                        <a
                                            href="<?= !empty($item['menu_link']) ? base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $item['menu_link']) : '#' ?>">
                                            <?= $item['menu_nm'] ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                    <!-- Page Title -->
                    <?php if (empty($menu_detail)): ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-title">Tolong buat menu content terlebih dahulu!</h4>
                            <div class="mb-2 text-secondary">Tidak ada menu content yang tersedia</div>
                        </div>
                    <?php else: ?>
                        <button class="p-3 my-3 btn btn-square btn-ghost-link fs-4" data-bs-toggle="modal"
                            data-bs-target="#contentModal" data-menu-id="<?= $menu_detail['menu_id'] ?>"
                            data-content-id="<?= $content_data['content_id'] ?? '' ?>"
                            data-content-body="<?= htmlspecialchars($content_data['content_body'] ?? '') ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-photo-cog">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 8h.01" />
                                <path d="M12 21h-6a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6" />
                                <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" />
                                <path d="M14 14l1 -1c.48 -.461 1.016 -.684 1.551 -.67" />
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19.001 15.5v1.5" />
                                <path d="M19.001 21v1.5" />
                                <path d="M22.032 17.25l-1.299 .75" />
                                <path d="M17.27 20l-1.3 .75" />
                                <path d="M15.97 17.25l1.3 .75" />
                                <path d="M20.733 20l1.3 .75" />
                            </svg>
                            Kelola Konten
                        </button>
                    <?php endif; ?>

                    <h1 class="page-title fs-1">
                        <?= !empty($menu_detail) ? $menu_detail['menu_nm'] : 'Dokumentasi' ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="order-2 col-lg-9 order-lg-1">
                    <div class="card">
                        <div class="card-body">
                            <?php if (!empty($content_data)): ?>
                                <?= $content_data['content_body'] ?>
                            <?php else: ?>
                                <p class="text-muted">Tidak ada konten untuk ditampilkan.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="order-1 mb-3 col-lg-3 order-lg-2">
                    <div class="card sticky-lg-top">
                        <div class="card-body">
                            <div class="mb-3 h3">Daftar isi</div>
                            <div class="">
                                <div>
                                    <ul id="daftar-isi" class="p-0 space-y-2 list-unstyled">
                                        <!-- Daftar isi dinamis akan ditambahkan di sini -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-nav">
        <div class="container-xl">
            <div class="justify-content-between row">
                <div id="prev-button" class="mb-2 col-12 mb-md-0 col-md-4 col-lg-3">
                    <!-- Tombol sebelumnya akan di-generate di sini -->
                </div>
                <div id="next-button" class="col-12 col-md-4 col-lg-3">
                    <!-- Tombol selanjutnya akan di-generate di sini -->
                </div>
            </div>
        </div>
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
<!-- div page -->
</div>