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
                        Tambah Menu
                    </button>
                </div>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Parent</th>
                            <th>Nama Menu</th>
                            <th>Link</th>
                            <th>Jenis</th>
                            <th>Order</th>
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
                                        echo '<td style="padding-left: ' . ($indent * 50) . 'px;">' . ($menu['menu_parent_id'] ? '-> ' . $menu['menu_nm'] : '<mark>--Menu Parent--</mark>') . '</td>';
                                        echo '<td>' . $menu['menu_nm'] . '</td>';
                                        echo '<td>' . ($menu['menu_link'] ?: '-') . '</td>';
                                        echo '<td>';
                                        if ($menu['menu_type'] == 'dropdown') {
                                            echo '<strong><u><p class="fs-3">' . ucfirst($menu['menu_type']) . '</p></u></strong>';
                                        } else {
                                            echo ucfirst($menu['menu_type']);
                                        }
                                        echo '</td>';
                                        echo '<td><strong>' . $menu['menu_order'] . '</strong></td>';
                                        echo '<td>';
                                        echo '<button class="m-1 btn btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editMenuModal_' . $menu['menu_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></button>';
                                        echo ' <a href="' . base_url('admin/deleteMenu/' . $menu['menu_id'] . '/' . $menu['fasyankes_kode']) . '" class="m-1 btn btn-danger btn-icon" onclick="return confirm(\'Yakin ingin menghapus menu ini?\');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm3 9h-6l-.117 .007a1 1 0 0 0 .117 1.993h6l.117 -.007a1 1 0 0 0 -.117 -1.993z" /></svg></a>';
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
<div class="modal fade modal-blur" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="<?= base_url('admin/addMenu'); ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Tambah Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="fasyankes_kode" value="<?= $fasyankes_kode; ?>">
                    <div class="mb-3">
                        <label for="menu_nm" class="form-label">Nama Menu</label>
                        <input type="text" name="menu_nm" id="menu_nm" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="menu_type" class="form-label">Tipe Menu</label>
                        <select name="menu_type" id="menu_type" class="form-select" required>
                            <option value="dropdown">Dropdown</option>
                            <option value="content">Content</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="menu_order" class="form-label">Urutan Menu</label>
                        <input type="number" name="menu_order" id="menu_order" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="menu_link" class="form-label">Link (Opsional untuk Content)</label>
                        <input type="text" name="menu_link" id="menu_link" class="form-control">
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

<!-- Modal Edit Menu -->
<?php foreach ($menu_data as $menu): ?>
    <div class="modal fade modal-blur" id="editMenuModal_<?= $menu['menu_id']; ?>" tabindex="-1"
        aria-labelledby="editMenuModalLabel_<?= $menu['menu_id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="<?= base_url('admin/editMenu'); ?>" method="POST">
                    <input type="hidden" name="fasyankes_kode" value="<?= $this->uri->segment(3); ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMenuModalLabel_<?= $menu['menu_id']; ?>">Edit Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="menu_id" value="<?= $menu['menu_id']; ?>">
                        <div class="mb-3">
                            <label for="menu_nm" class="form-label">Nama Menu</label>
                            <input type="text" name="menu_nm" id="menu_nm" class="form-control"
                                value="<?= $menu['menu_nm']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="menu_type" class="form-label">Tipe Menu</label>
                            <select name="menu_type" id="menu_type" class="form-select" required>
                                <option value="dropdown" <?= $menu['menu_type'] == 'dropdown' ? 'selected' : ''; ?>>Dropdown
                                </option>
                                <option value="content" <?= $menu['menu_type'] == 'content' ? 'selected' : ''; ?>>Content
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="menu_order" class="form-label">Urutan Menu</label>
                            <input type="number" name="menu_order" id="menu_order" class="form-control"
                                value="<?= $menu['menu_order']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="menu_link" class="form-label">Link (Opsional untuk Content)</label>
                            <input type="text" name="menu_link" id="menu_link" class="form-control"
                                value="<?= $menu['menu_link']; ?>">
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