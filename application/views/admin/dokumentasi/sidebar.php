<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="light">
    <div class="container-fluid">
        <!-- Tambahkan Button untuk CRUD Menu -->
        <button class="p-3 mt-3 btn btn-square btn-ghost-link fs-4 crud-menu" data-bs-toggle="modal"
            data-bs-target="#menuModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            </svg>
            Kelola Menu
        </button>
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
        <a class="d-block d-lg-none" href="<?= base_url(); ?>Admin/dashboard" class="px-0 nav-link" title="Dashboard"
            data-bs-toggle="tooltip" data-bs-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
            </svg>
        </a>
        <a href="?theme=dark" class="px-0 nav-link hide-theme-dark d-block d-lg-none" title="Enable dark mode"
            data-bs-toggle="tooltip" data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
            </svg>
        </a>
        <a href="?theme=light" class="px-0 nav-link hide-theme-light d-block d-lg-none" title="Enable light mode"
            data-bs-toggle="tooltip" data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
            </svg>
        </a>

        <div class="collapse navbar-collapse fs-5" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3 fs-5">
                <?php
                // Variabel untuk menyimpan menu yang sedang aktif
                $active_menu_ids = array_column($breadcrumb, 'menu_id');

                foreach ($menu_data as $menu):
                    // Periksa apakah menu adalah parent dan sedang aktif
                    $is_active = in_array($menu['menu_id'], $active_menu_ids);
                    ?>
                    <?php if ($menu['menu_parent_id'] == null): ?>
                        <!-- Parent menu -->
                        <li
                            class="fs-5 nav-item <?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?> <?= $is_active ? 'active' : ''; ?>">
                            <a class="fs-5 nav-link <?= $menu['menu_type'] == 'dropdown' ? 'dropdown-toggle' : ''; ?>"
                                href="<?= $menu['menu_type'] == 'content' ? base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $menu['menu_link']) : '#'; ?>"
                                data-bs-toggle="<?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>"
                                data-bs-auto-close="false">
                                <!-- Check active_st and display appropriate span -->
                                <?php if ($menu['active_st'] == 1): ?>
                                    <span class="status status-green fs-5 nav-link-title"><?= $menu['menu_nm']; ?></span>
                                <?php else: ?>
                                    <span class="status status-red fs-5 nav-link-title"><?= $menu['menu_nm']; ?></span>
                                <?php endif; ?>
                            </a>
                            <?php if ($menu['menu_type'] == 'dropdown'): ?>
                                <div class="dropdown-menu fs-5">
                                    <div class="dropdown-menu-columns fs-5">
                                        <div class="dropdown-menu-column fs-5">
                                            <?php
                                            // Call the recursive function for child menus
                                            echo generate_submenus($menu['menu_id'], $menu_data, $fasyankes_kode, $active_menu_ids);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>


<?php
function generate_submenus($parent_id, $menu_data, $fasyankes_kode)
{
    $submenu_html = '';

    // Loop over all menu_data and find submenus based on parent_id
    foreach ($menu_data as $submenu) {
        if ($submenu['menu_parent_id'] == $parent_id) {
            // Jika menu type 'content', tampilkan sebagai link biasa
            if ($submenu['menu_type'] == 'content') {
                if ($submenu['active_st'] == 1) {
                    $submenu_html .= '<a class="fs-5 dropdown-item" href="' . base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_link']) . '"><span class="fs-5 status status-green">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                } else {
                    $submenu_html .= '<a class="fs-5 dropdown-item" href="' . base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_link']) . '"><span class="fs-5 status status-red">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                }
            }

            // Jika menu type 'dropdown', buat nested dropdown
            if ($submenu['menu_type'] == 'dropdown') {
                if ($submenu['active_st'] == 1) {
                    $submenu_html .= '<div class="dropend">';
                    $submenu_html .= '<a class="fs-5 dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false"><span class="fs-5 status status-green">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                    $submenu_html .= '<div class="dropdown-menu show">';
                } else {
                    $submenu_html .= '<div class="dropend">';
                    $submenu_html .= '<a class="fs-5 dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false"><span class="fs-5 status status-red">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                    $submenu_html .= '<div class="dropdown-menu show">';
                }
                // Panggil fungsi ini lagi untuk submenu-nya (rekursif)
                $submenu_html .= generate_submenus($submenu['menu_id'], $menu_data, $fasyankes_kode);

                $submenu_html .= '</div>';
                $submenu_html .= '</div>';
            }
        }
    }

    return $submenu_html;
}


?>