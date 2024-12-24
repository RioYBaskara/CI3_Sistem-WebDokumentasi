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

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <?php foreach ($menu_data as $menu): ?>
                    <?php if ($menu['menu_parent_id'] == null): ?>
                        <!-- Parent menu -->
                        <li class="nav-item <?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>">
                            <a class="nav-link <?= $menu['menu_type'] == 'dropdown' ? 'dropdown-toggle' : ''; ?>"
                                href="<?= base_url($menu['menu_link']); ?>"
                                data-bs-toggle="<?= $menu['menu_type'] == 'dropdown' ? 'dropdown' : ''; ?>"
                                data-bs-auto-close="false">
                                <span class="nav-link-title"><?= $menu['menu_nm']; ?></span>
                            </a>
                            <?php if ($menu['menu_type'] == 'dropdown'): ?>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <?php foreach ($menu_data as $submenu): ?>
                                                <?php if ($submenu['menu_parent_id'] == $menu['menu_id']): ?>
                                                    <?php if ($submenu['menu_type'] == 'dropdown'): ?>
                                                        <div class="dropend">
                                                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                                data-bs-auto-close="false">
                                                                <?= $submenu['menu_nm']; ?>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <!-- Recursive dropdown for nested items -->
                                                                <?php foreach ($menu_data as $subsubmenu): ?>
                                                                    <?php if ($subsubmenu['menu_parent_id'] == $submenu['menu_id']): ?>
                                                                        <a class="dropdown-item"
                                                                            href="<?= base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $subsubmenu['menu_nm']); ?>">
                                                                            <?= $subsubmenu['menu_nm']; ?>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url('admin/dokumentasi/' . $fasyankes_kode . '/' . $submenu['menu_nm']); ?>">
                                                            <?= $submenu['menu_nm']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($menu['menu_type'] == 'content'): ?>
                                <a class="nav-link" href="<?= base_url($menu['menu_link']); ?>">
                                    <span class="nav-link-title"><?= $menu['menu_nm']; ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>