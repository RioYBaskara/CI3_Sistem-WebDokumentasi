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

<!-- mark error, ini apa ya hmm -->
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

<!-- Include TinyMCE script -->
<script src="<?= base_url('assets/js/tinymce/tinymce.min.js'); ?>"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let options = {
            selector: '#tinymce-default',
            license_key: 'gpl',
            height: 600,
            menubar: true,
            statusbar: true,
            plugins: [
                "image", "code", "table", "link", "media", "codesample",
                "advlist", "autolink", "lists", "charmap", "preview", "anchor",
                "searchreplace", "visualblocks", "fullscreen", "insertdatetime", "help", "wordcount"
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | link image | h1 h2 h3 h4 h5 h6 |',
            file_picker_types: 'image',
            setup: function (editor) {
                editor.on('NodeChange', function (e) {
                    var headings = editor.dom.select('h1, h2, h3, h4, h5');
                    headings.forEach(function (heading) {
                        if (!heading.id) {
                            heading.id = heading.innerText.replace(/\s+/g, '-').toLowerCase();
                        }
                    });
                });
            },
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.click();

                    input.onchange = function () {
                        var file = input.files[0];
                        var formData = new FormData();
                        formData.append('file', file);

                        fetch('<?= base_url("admin/upload_image"); ?>', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);
                                try {
                                    const jsonData = JSON.parse(data);
                                    if (jsonData.success) {
                                        callback(jsonData.image_url);
                                    } else {
                                        alert('Upload gagal: ' + jsonData.message);
                                    }
                                } catch (error) {
                                    alert('Error parsing JSON: ' + error.message);
                                }
                            })
                            .catch(error => alert('Error: ' + error));
                    }
                }
            },
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        };
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }

        tinyMCE.init(options);
        document.addEventListener('focusin', (e) => {
            if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                e.stopImmediatePropagation();
            }
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

<!-- highlight toc ketika active -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            const sections = document.querySelectorAll("h1, h2, h3, h4, h5");
            const tocLinks = document.querySelectorAll("#daftar-isi a");

            function resetHighlight() {
                tocLinks.forEach((link) => link.classList.remove("active"));
            }

            function setFirstActive() {
                const firstLink = tocLinks[0];
                if (firstLink) {
                    firstLink.classList.add("active");
                }
            }

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {

                            const id = entry.target.getAttribute("id");
                            resetHighlight();

                            const activeLink = document.querySelector(`#daftar-isi a[href="#${id}"]`);
                            if (activeLink) activeLink.classList.add("active");
                        }
                    });
                },
                {
                    root: null,
                    threshold: 0.5,
                    rootMargin: "-50px 0px",
                }
            );

            sections.forEach((section) => observer.observe(section));

            setFirstActive();
        }, 500);
    });
</script>

<!-- menu order parent -->
<script>
    $(document).ready(function () {
        $(document).on('show.bs.modal', '#addMenuModal', function (event) {
            const modal = $(this);
            const menuParentId = null;
            const fasyankesKode = $('input[name="fasyankes_kode"]').val();

            $.ajax({
                url: "<?= base_url('admin/getLastMenuOrder'); ?>",
                type: "POST",
                data: {
                    menu_parent_id: menuParentId,
                    fasyankes_kode: fasyankesKode
                },
                dataType: "json",
                success: function (response) {
                    console.log(response.last_order);
                    modal.find('input[name="menu_order"]').val(response.last_order);
                },
                error: function () {
                    console.error("Error fetching menu order");
                }
            });
        });
    });
</script>

<!-- menu order submenu -->
<script>
    $(document).ready(function () {
        $(document).on('show.bs.modal', '.modal-add-submenu', function (event) {
            var modal = $(this);
            var menuId = modal.find('input[name="menu_parent_id"]').val();
            var fasyankesKode = $("input[name='fasyankes_kode']").val();

            $.ajax({
                url: "<?php echo base_url('admin/getLastMenuOrder'); ?>",
                type: "POST",
                data: {
                    menu_parent_id: menuId,
                    fasyankes_kode: fasyankesKode
                },
                dataType: "json",
                success: function (response) {
                    console.log(response.last_order);
                    modal.find('input[name="menu_order"]').val(response.last_order);
                },
                error: function () {
                    console.error("Error fetching menu order");
                }
            });
        });
    });
</script>

</body>

</html>