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

<!-- table of content dinamis -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function generateTableOfContents() {
            var toc = document.querySelector('#daftar-isi');
            var contentBody = document.querySelector('.page-body .container-xl .row .col-lg-9 .card-body');

            if (!contentBody) {
                console.error("Konten tidak ditemukan");
                return;
            }

            var headings = contentBody.querySelectorAll('h1, h2, h3, h4, h5');

            toc.innerHTML = '';

            headings.forEach(function (heading) {
                var level = parseInt(heading.tagName[1]);
                var link = document.createElement('a');
                link.href = '#' + heading.id;
                link.classList.add('link-secondary');
                link.textContent = heading.textContent;

                var listItem = document.createElement('li');
                listItem.appendChild(link);

                listItem.style.marginLeft = (level - 1) * 10 + 'px';

                toc.appendChild(listItem);
            });
        }

        setTimeout(generateTableOfContents, 100);
    });
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

<!-- tombol selanjutnya sebelumnya -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua elemen <a> dengan tipe-menu="content" dalam sidebar
        const menuLinks = Array.from(
            document.querySelectorAll('.navbar-nav a[tipe-menu="content"]')
        );

        // Ambil URL halaman saat ini
        const currentUrl = window.location.href;

        // Temukan indeks elemen aktif
        const currentIndex = menuLinks.findIndex(link => link.href === currentUrl);

        // Referensi ke container tombol
        const prevButtonContainer = document.getElementById("prev-button");
        const nextButtonContainer = document.getElementById("next-button");

        // Reset kontainer tombol
        prevButtonContainer.innerHTML = "";
        nextButtonContainer.innerHTML = "";

        // Buat tombol "Sebelumnya" jika ada elemen sebelumnya
        if (currentIndex > 0) {
            const prevLink = menuLinks[currentIndex - 1];
            const prevButton = `
            <a href="${prevLink.href}" class="p-0 btn w-100 card">
                <div class="w-100">
                    <div class="py-2 card-header">
                        <h3 class="opacity-50 card-title"><- Sebelumnya</h3>
                    </div>
                    <div class="opacity-75 card-body w-100 text-start">
                        ${prevLink.textContent.trim()}
                    </div>
                </div>
            </a>
        `;
            prevButtonContainer.innerHTML = prevButton;
        }

        // Buat tombol "Selanjutnya" jika ada elemen berikutnya
        if (currentIndex < menuLinks.length - 1) {
            const nextLink = menuLinks[currentIndex + 1];
            const nextButton = `
            <a href="${nextLink.href}" class="p-0 btn w-100 card">
                <div class="w-100">
                    <div class="py-2 card-header justify-content-end">
                        <h3 class="opacity-50 card-title">Selanjutnya -></h3>
                    </div>
                    <div class="opacity-75 card-body w-100 text-end">
                        ${nextLink.textContent.trim()}
                    </div>
                </div>
            </a>
        `;
            nextButtonContainer.innerHTML = nextButton;
        }
    });

</script>

<script>
    $(document).ready(function () {
        // Tangkap input pencarian
        $('input[name="search"]').on('input', function () {
            let keyword = $(this).val();
            let fasyankesKode = window.location.pathname.split('/')[4];

            if (keyword.length >= 2) {
                // AJAX request ke server
                $.ajax({
                    url: '<?= base_url('admin/searchMenu'); ?>',
                    method: 'POST',
                    data: {
                        keyword: keyword,
                        fasyankes_kode: fasyankesKode
                    },
                    success: function (response) {
                        let result = JSON.parse(response);

                        $('.modal-body .row').empty();

                        if (result.length > 0) {
                            result.forEach(function (item) {
                                let resultItem = `
                                <div class="py-2 col-12">
                                    <a href="${item.menu_link}" class="p-0 btn w-100 card">
                                        <div class="w-100 card-body">
                                            <div class="p-0 overflow-auto card-body w-100 text-start">
                                                <h3 class="opacity-80 card-title">${item.menu_nm}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>`;
                                $('.modal-body .row').append(resultItem);
                            });
                        } else {
                            $('.modal-body .row').append('<p class="text-muted">Tidak ada hasil yang ditemukan.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('.modal-body .row').empty();
            }
        });
    });
</script>

</body>

</html>