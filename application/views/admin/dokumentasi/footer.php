<!-- Libs JS -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
<script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487"
    defer></script>
<script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
<script src="<?= base_url(); ?>assets/tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url(); ?>assets/tabler/dist/js/tabler.min.js?1692870487" defer></script>
<script src="<?= base_url(); ?>assets/tabler/dist/js/demo.min.js?1692870487" defer></script>

<script>
    $(".search").click(function () {
        $('#modal-search').modal('show');
    });

    $('[data-bs-toggle="tooltip"]').tooltip()
</script>

<script type="text/javascript">
    jQuery(function ($) {
        $('#modal-search').on('shown.bs.modal', function () {
            $('input[name="search"]').focus();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editMenuModal = document.getElementById('editMenuModal');
        editMenuModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var menu_id = button.getAttribute('data-menu-id');
            var menu_nm = button.getAttribute('data-menu-nm');
            var menu_link = button.getAttribute('data-menu-link');
            var menu_type = button.getAttribute('data-menu-type');
            var menu_order = button.getAttribute('data-menu-order');

            var modalMenuId = editMenuModal.querySelector('#menu_id');
            var modalMenuNm = editMenuModal.querySelector('#menu_nm');
            var modalMenuLink = editMenuModal.querySelector('#menu_link');
            var modalMenuType = editMenuModal.querySelector('#menu_type');
            var modalMenuOrder = editMenuModal.querySelector('#menu_order');
            var modalActiveSt = editMenuModal.querySelector('#active_st');

            modalMenuId.value = menu_id;
            modalMenuNm.value = menu_nm;
            modalMenuLink.value = menu_link;
            modalMenuType.value = menu_type;
            modalMenuOrder.value = menu_order;

            // Default active status based on input
            modalActiveSt.value = button.getAttribute('data-menu-status') || 1;
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Get fasyankes_kode from the URL
        const fasyankes_kode = window.location.pathname.split("/")[4];
        $('#fasyankesKode').val(fasyankes_kode);

        // Load menu data into the table
        function loadMenus() {
            $.ajax({
                url: '<?= base_url('admin/getMenus'); ?>',
                type: 'POST',
                data: { fasyankes_kode: fasyankes_kode },
                success: function (response) {
                    $('#menuTableBody').html(response);
                }
            });
        }

        // Initial load
        loadMenus();

        // Add menu form submission
        $('#formAddMenu').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('admin/addMenu'); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    loadMenus();
                    $('#modalAddMenu').modal('hide');
                }
            });
        });

        // Hide or show the "Link" field based on the selected menu type
        function toggleMenuLinkField() {
            if ($('input[name="menu_type"]:checked').val() === 'content') {
                $('#menuLinkField').show();
                $('#menuLink').prop('required', true); // Make it required
            } else {
                $('#menuLinkField').hide();
                $('#menuLink').prop('required', false); // Remove required
            }
        }

        // Check initial state when modal is opened
        toggleMenuLinkField();

        // Add change event listener to the radio buttons
        $('input[name="menu_type"]').change(function () {
            toggleMenuLinkField();
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let options = {
            selector: '#tinymce-default',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
</script>

<script>
    document.querySelectorAll('[data-bs-target="#contentModal"]').forEach(button => {
        button.addEventListener('click', function () {
            const menuId = this.getAttribute('data-menu-id');
            const contentId = this.getAttribute('data-content-id');
            const contentBody = this.getAttribute('data-content-body');

            document.querySelector('#content_id').value = contentId || '';
            document.querySelector('#menu_id').value = menuId || '';
            tinymce.get('tinymce-default').setContent(contentBody || '');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Untuk setiap selector jenis menu, tambahkan event listener
        document.querySelectorAll('.menu-type-selector').forEach(function (selector) {
            selector.addEventListener('change', function () {
                let menuId = this.getAttribute('data-menu-id');
                let selectedValue = this.value;
                let linkContainer = document.getElementById('menu_link_container_' + menuId);

                // Tampilkan atau sembunyikan input link berdasarkan jenis menu
                if (selectedValue === 'content') {
                    linkContainer.style.display = 'block';
                } else {
                    linkContainer.style.display = 'none';
                }
            });

            // Trigger perubahan awal untuk menyesuaikan tampilan berdasarkan default value
            selector.dispatchEvent(new Event('change'));
        });

    });
</script>

<script>
    document.querySelectorAll('.menu-type').forEach(function (radio) {
        radio.addEventListener('change', function () {
            const menuId = this.getAttribute('data-menu-id');
            const menuLinkField = document.getElementById(`menuLinkField_${menuId}`);
            if (this.value === 'content') {
                menuLinkField.style.display = 'block';
            } else {
                menuLinkField.style.display = 'none';
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var dropdownItems = document.querySelectorAll('.navbar-nav .nav-item.dropdown');

        dropdownItems.forEach(function (dropdownItem) {
            dropdownItem.classList.add('show');
            var dropdownMenu = dropdownItem.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.add('show');
            }
        });
    });
</script>

</body>

</html>