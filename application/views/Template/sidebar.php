<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="<?= base_url(); ?>assets/img/logoitm.png" width="110" height="32" alt="SIMRS ITM"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="flex-row navbar-nav d-lg-none">
            <div class="d-none d-lg-flex">
                <a href="?theme=dark" class="px-0 nav-link hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="px-0 nav-link hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
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
            <button class="p-0 border-0 search btn" title="Search" data-bs-toggle="tooltip" data-bs-placement="left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-pengantar" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-title">
                            <!-- fieldmarkmenudropdown -->
                            Pengantar
                        </span>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="url">
                                    <!-- fieldmarksubmenu -->
                                    Tentang
                                </a>
                                <a class="dropdown-item" href="url">
                                    <!-- fieldmarksubmenu -->
                                    Arsitektur
                                </a>
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#sidebar-pelayanan"
                                        data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                                        aria-expanded="false">
                                        <!-- fieldmarksubmenudropdown -->
                                        Pelayanan
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="url" class="dropdown-item">
                                            <!-- fieldmarksubmenu -->
                                            Pendaftaran
                                        </a>
                                        <a href="url" class="dropdown-item">
                                            <!-- fieldmarksubmenu -->
                                            Pembayaran
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-instalasi" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-title">
                            <!-- fieldmarkmenudropdown -->
                            Instalasi
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="url">
                                    <!-- fieldmarksubmenu -->
                                    Persiapan
                                </a>
                                <a class="dropdown-item" href="url">
                                    <!-- fieldmarksubmenu -->
                                    Persiapan
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>