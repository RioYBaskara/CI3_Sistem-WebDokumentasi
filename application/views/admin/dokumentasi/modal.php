<div class="modal modal-blur fade" id="modal-search" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" class="form-control" name="search" placeholder="Cari Menu atau Submenu"
                        autofocus>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <a href="" class="p-0 btn w-100 card">
                            <div class=" w-100 card-body">
                                <div class="p-0 overflow-auto card-body w-100 text-start">
                                    <h3 class="opacity-80 card-title">Sejarah SIMRS</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="p-0 btn w-100 card">
                            <div class=" w-100 card-body">
                                <div class="p-0 overflow-auto card-body w-100 text-start">
                                    <h3 class="opacity-80 card-title">Sejarah Rumkit</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="p-0 btn w-100 card">
                            <div class=" w-100 card-body">
                                <div class="p-0 overflow-auto card-body w-100 text-start">
                                    <h3 class="opacity-80 card-title">Sejarah Indonesia</h3>
                                </div>
                            </div>
                        </a>
                    </div>
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

<!-- Modal Daftar Menu -->
<div class="modal fade modal-blur" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">Kelola Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <div class="mb-3">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                        Tambah Menu Parent Root
                    </button>
                </div>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Parent</th>
                            <th>Nama Menu</th>
                            <th>Link Content</th>
                            <th>Jenis</th>
                            <th>Urutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($menu_data)): ?>
                            <?php
                            // Fungsi untuk menampilkan menu secara rekursif dengan indentasi
                            function displayMenu($menu_data, $parent_id = null, $indent = 0)
                            {
                                foreach ($menu_data as $menu) {
                                    if ($menu['menu_parent_id'] == $parent_id) {
                                        echo '<tr>';
                                        echo '<td class="fs-2"><kbd>' . str_repeat('&nbsp;', $indent * 4) . ($indent + 1) . '</kbd></td>'; // Menambahkan indentasi
                                        echo '<td style="padding-left: ' . ($indent * 50) . 'px;">' . ($menu['menu_parent_id'] ? '-> ' . $menu['nama_parent'] : '<mark>--Menu Parent--</mark>') . '</td>';
                                        if ($menu['active_st'] == 1) {
                                            echo '<td><span class="status status-green">' . $menu['menu_nm'] . '</span></td>';
                                        } else {
                                            echo '<td><span class="status status-red">' . $menu['menu_nm'] . '</span></td>';
                                        }
                                        echo '<td>' . ($menu['menu_link'] ?: '-') . '</td>';
                                        echo '<td>';
                                        if ($menu['menu_type'] == 'dropdown') {
                                            echo '<strong><span class="status status-blue status-lite"><span class="status-dot"></span>' . ucfirst($menu['menu_type']) . '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-select"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M9 11l3 3l3 -3" /></svg></span></strong>';
                                        } else {
                                            echo '<span class="status status-yellow status-lite"><span class="status-dot"></span>' . ucfirst($menu['menu_type']) . '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bubble-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10h10" /><path d="M9 14h5" /><path d="M12.4 3a5.34 5.34 0 0 1 4.906 3.239a5.333 5.333 0 0 1 -1.195 10.6a4.26 4.26 0 0 1 -5.28 1.863l-3.831 2.298v-3.134a2.668 2.668 0 0 1 -1.795 -3.773a4.8 4.8 0 0 1 2.908 -8.933a5.33 5.33 0 0 1 4.287 -2.16" /></svg></span>';
                                        }
                                        echo '</td>';
                                        echo '<td><strong>' . $menu['menu_order'] . '</strong></td>';
                                        echo '<td>';
                                        echo '<button class="m-1 btn btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editMenuModal_' . $menu['menu_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></button>';

                                        echo ' <a href="' . base_url('admin/deleteMenu/' . $menu['menu_id'] . '/' . $menu['fasyankes_kode']) . '" class="m-1 btn btn-danger btn-icon" onclick="return confirm(\'Yakin ingin menghapus menu ini?\');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm3 9h-6l-.117 .007a1 1 0 0 0 .117 1.993h6l.117 -.007a1 1 0 0 0 -.117 -1.993z" /></svg></a>';

                                        if ($menu['menu_type'] === 'dropdown') {
                                            echo '<button class="m-1 btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#addSubmenuModal_' . $menu['menu_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm0 7a1 1 0 0 0 -1 1v2h-2a1 1 0 0 0 -1 1a1 1 0 0 0 1 1h2v2a1 1 0 0 0 1 1a1 1 0 0 0 1 -1v-2h2a1 1 0 0 0 1 -1a1 1 0 0 0 -1 -1h-2v-2a1 1 0 0 0 -1 -1z" /></svg></button>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                        // Panggil rekursif untuk submenu
                                        displayMenu($menu_data, $menu['menu_id'], $indent + 1);
                                    }
                                }
                            }
                            // Panggil fungsi untuk menampilkan menu
                            displayMenu($menu_data);
                            ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada menu.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah Menu -->
<!-- Modal Tambah Menu Parent -->
<div class="modal fade modal-blur" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/addMenu') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Tambah Menu Parent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="fasyankes_kode" value="<?= $this->uri->segment(3); ?>">

                    <div class="mb-3">
                        <label for="menu_nm" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" name="menu_nm" required>
                    </div>

                    <label class="form-label">Jenis Menu</label>
                    <div class="mb-3 form-selectgroup-boxes row" id="menuTypeGroup">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="menu_type" value="dropdown" class="form-selectgroup-input"
                                    <?= (@$menu['menu_type'] == 'dropdown') ? 'checked' : '' ?> id="menuTypeDropdown">
                                <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="d-block text-secondary">Dropdown</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="menu_type" value="content" class="form-selectgroup-input"
                                    <?= (@$menu['menu_type'] == 'content') ? 'checked' : '' ?> id="menuTypeContent">
                                <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="d-block text-secondary">Content</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Field "Link" -->
                    <div class="mb-3" id="menuLinkField">
                        <label for="menu_link" class="form-label">Link Content</label>
                        <input type="text" class="form-control" name="menu_link" id="menuLink">
                    </div>

                    <div class="mb-3">
                        <label for="menu_order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" name="menu_order" required>
                    </div>
                    <label class="form-label">Active?</label>
                    <div class="mb-3 form-selectgroup-boxes row">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="active_st" value="1" class="form-selectgroup-input"
                                    <?= (@$menu['active_st'] == 1) ? 'checked' : '' ?>>
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
                                    <?= (@$menu['active_st'] == 0) ? 'checked' : '' ?>>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Submenu -->
<?php foreach ($menu_data as $menu): ?>
    <div class="modal fade modal-blur" id="addSubmenuModal_<?php echo $menu['menu_id']; ?>" tabindex="-1"
        aria-labelledby="addSubmenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubmenuModalLabel">Tambah Submenu untuk "<?php echo $menu['menu_nm']; ?>"
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url('admin/addSubmenu'); ?>" method="POST">
                    <input type="hidden" name="fasyankes_kode" value="<?= $this->uri->segment(3); ?>">
                    <div class="modal-body">
                        <input type="hidden" name="menu_parent_id" value="<?php echo $menu['menu_id']; ?>">
                        <div class="mb-3">
                            <label for="menu_nm_<?php echo $menu['menu_id']; ?>" class="form-label">Nama Submenu</label>
                            <input type="text" class="form-control" id="menu_nm_<?php echo $menu['menu_id']; ?>"
                                name="menu_nm" required>
                        </div>
                        <div class="mb-3">
                            <label for="menu_type_<?php echo $menu['menu_id']; ?>" class="form-label">Jenis</label>
                            <select class="form-select menu-type-selector" id="menu_type_<?php echo $menu['menu_id']; ?>"
                                name="menu_type" data-menu-id="<?php echo $menu['menu_id']; ?>">
                                <option value="content">Content</option>
                                <option value="dropdown">Dropdown</option>
                            </select>
                        </div>
                        <div class="mb-3 submenu-link-container" id="menu_link_container_<?php echo $menu['menu_id']; ?>">
                            <label for="menu_link_<?php echo $menu['menu_id']; ?>" class="form-label">Link Content</label>
                            <input type="text" class="form-control" id="menu_link_<?php echo $menu['menu_id']; ?>"
                                name="menu_link">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal Edit Menu note: belum ada pilihan ganti parent menu, agar lebih mudah mengelola -->
<?php foreach ($menu_data as $menu): ?>
    <div class="modal fade modal-blur" id="editMenuModal_<?= $menu['menu_id']; ?>" tabindex="-1"
        aria-labelledby="editMenuModalLabel_<?= $menu['menu_id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="<?= base_url('admin/editMenu'); ?>" method="POST">
                    <input type="hidden" name="fasyankes_kode" value="<?= $this->uri->segment(3); ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMenuModalLabel_<?= $menu['menu_id']; ?>">Edit Menu
                            "<?= $menu['menu_nm'] ?>"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="menu_id" value="<?= $menu['menu_id']; ?>">
                        <div class="mb-3">
                            <label for="menu_nm_<?= $menu['menu_id']; ?>" class="form-label">Nama Menu</label>
                            <input type="text" name="menu_nm" id="menu_nm_<?= $menu['menu_id']; ?>" class="form-control"
                                value="<?= $menu['menu_nm']; ?>" required>
                        </div>
                        <label class="form-label">Jenis Menu</label>
                        <div class="mb-3 form-selectgroup-boxes row">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="menu_type" value="dropdown" class="form-selectgroup-input menu-type"
                                        data-menu-id="<?= $menu['menu_id']; ?>" <?= ($menu['menu_type'] === 'dropdown') ? 'checked' : '' ?>>
                                    <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="d-block text-secondary">Dropdown</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="menu_type" value="content" class="form-selectgroup-input menu-type"
                                        data-menu-id="<?= $menu['menu_id']; ?>" <?= ($menu['menu_type'] === 'content') ? 'checked' : '' ?>>
                                    <span class="p-3 form-selectgroup-label d-flex align-items-center">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="d-block text-secondary">Content</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3" id="menuLinkField_<?= $menu['menu_id']; ?>" style="display: <?= ($menu['menu_type'] === 'content') ? 'block' : 'none'; ?>">
                            <label for="menu_link_<?= $menu['menu_id']; ?>" class="form-label">Link Content</label>
                            <input type="text" name="menu_link" id="menu_link_<?= $menu['menu_id']; ?>" class="form-control"
                                value="<?= $menu['menu_link']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="menu_order_<?= $menu['menu_id']; ?>" class="form-label">Urutan Menu</label>
                            <input type="number" name="menu_order" id="menu_order_<?= $menu['menu_id']; ?>" class="form-control"
                                value="<?= $menu['menu_order']; ?>" required>
                        </div>
                        <label class="form-label">Active?</label>
                        <div class="mb-3 form-selectgroup-boxes row">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="active_st" value="1" class="form-selectgroup-input"
                                        <?= ($menu['active_st'] == 1) ? 'checked' : '' ?>>
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
                                        <?= ($menu['active_st'] == 0) ? 'checked' : '' ?>>
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- konten -->
<div class="modal fade modal-blur" id="contentModal" tabindex="-1" aria-labelledby="contentModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="<?= base_url('admin/saveContent') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="contentModalLabel">Edit Konten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="content_id" id="content_id">
                    <input type="hidden" name="menu_id" id="menu_id">
                    <textarea id="tinymce-default" name="content_body"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

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