<div class="modal modal-blur fade" id="modal-search" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search Menu...</h5>
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
                    <!-- populate search pakai ajax -->
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