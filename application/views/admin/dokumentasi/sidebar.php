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

        <div class="collapse navbar-collapse fs-5" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3 fs-5">
                <?php foreach ($menu_data as $menu): ?>
                    <?php if ($menu['menu_parent_id'] == null): ?>
                        <!-- Parent menu -->
                        <li class="fs-5 nav-item <?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>">
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
                                            echo generate_submenus($menu['menu_id'], $menu_data, $fasyankes_kode);
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
                    $submenu_html .= '<a class="fs-5 dropdown-item" href="' . base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_nm']) . '"><span class="fs-5 status status-green">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                } else {
                    $submenu_html .= '<a class="fs-5 dropdown-item" href="' . base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_nm']) . '"><span class="fs-5 status status-red">';
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
                    $submenu_html .= '<div class="dropdown-menu">';
                } else {
                    $submenu_html .= '<div class="dropend">';
                    $submenu_html .= '<a class="fs-5 dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false"><span class="fs-5 status status-red">';
                    $submenu_html .= $submenu['menu_nm'];
                    $submenu_html .= '</span></a>';
                    $submenu_html .= '<div class="dropdown-menu">';
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