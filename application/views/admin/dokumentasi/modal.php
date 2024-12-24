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

<!-- Modal Edit Menu -->
<div class="modal fade" id="modalEditMenu" tabindex="-1" aria-labelledby="modalEditMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditMenuLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/saveMenu') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="menu_id" id="menu_id">
                    <div class="mb-3">
                        <label for="menu_nm" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" name="menu_nm" id="menu_nm" required>
                    </div>
                    <div class="mb-3">
                        <label for="menu_type" class="form-label">Tipe Menu</label>
                        <select class="form-control" name="menu_type" id="menu_type" required>
                            <option value="dropdown">Dropdown</option>
                            <option value="content">Content</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="menu_link" class="form-label">Link Menu</label>
                        <input type="text" class="form-control" name="menu_link" id="menu_link">
                    </div>
                    <div class="mb-3">
                        <label for="menu_parent_id" class="form-label">Parent Menu</label>
                        <select class="form-control" name="menu_parent_id" id="menu_parent_id">
                            <option value="0">Root</option>
                            <?php foreach ($menus as $menu): ?>
                                <option value="<?= $menu->menu_id ?>"><?= $menu->menu_nm ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="menu_order" class="form-label">Urutan Menu</label>
                        <input type="number" class="form-control" name="menu_order" id="menu_order" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>