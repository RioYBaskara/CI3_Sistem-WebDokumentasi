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

        <div class="collapse navbar-collapse fs-6" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3 fs-6">
                <?php foreach ($menu_data as $menu): ?>
                    <?php if ($menu['menu_parent_id'] == null): ?>
                        <!-- Parent menu -->
                        <li class="fs-6 nav-item <?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>">
                            <a class="fs-6 nav-link <?= $menu['menu_type'] == 'dropdown' ? 'dropdown-toggle' : ''; ?>"
                                href="<?= $menu['menu_type'] == 'content' ? base_url($menu['menu_link']) : '#'; ?>"
                                data-bs-toggle="<?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>"
                                data-bs-auto-close="false">
                                <span class="fs-6 nav-link-title"><?= $menu['menu_nm']; ?></span>
                            </a>
                            <?php if ($menu['menu_type'] == 'dropdown'): ?>
                                <div class="dropdown-menu fs-6">
                                    <div class="dropdown-menu-columns fs-6">
                                        <div class="dropdown-menu-column fs-6">
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
                $submenu_html .= '<a class="fs-6 dropdown-item" href="' . base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_nm']) . '">';
                $submenu_html .= $submenu['menu_nm'];
                $submenu_html .= '</a>';
            }

            // Jika menu type 'dropdown', buat nested dropdown
            if ($submenu['menu_type'] == 'dropdown') {
                $submenu_html .= '<div class="dropend">';
                $submenu_html .= '<a class="fs-6 dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false">';
                $submenu_html .= $submenu['menu_nm'];
                $submenu_html .= '</a>';
                $submenu_html .= '<div class="dropdown-menu">';

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