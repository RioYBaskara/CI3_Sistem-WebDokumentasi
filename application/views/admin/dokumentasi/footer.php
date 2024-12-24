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
    });

</script>
</body>

</html>