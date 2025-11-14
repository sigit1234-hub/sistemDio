<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">

        </div>
        <div>
            ©
            <script>
            document.write(new Date().getFullYear());
            </script>
            , Office Of The Board Department
            <a href="" target="_blank" class="footer-link fw-bolder">| Bank Mandiri, Tbk</a>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('vendor') ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url('vendor') ?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url('vendor') ?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url('vendor') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= base_url('vendor') ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('vendor') ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= base_url('vendor') ?>/assets/js/main.js"></script>

<script src="<?= base_url('vendor/') ?>toastify/toastify.js"></script>
<script src="<?= base_url('vendor/') ?>toastify/extensions/toastify.js"></script>

<!-- Page JS -->
<script src="<?= base_url('vendor') ?>/assets/js/dashboards-analytics.js"></script>
<!-- cekEditor -->
<script>
CKEDITOR.replace('editor1', {

});

CKEDITOR.editorConfig = function(config) {
    // Mengizinkan semua tag dan atribut. Hati-hati dengan opsi ini.
    config.allowedContent = true;
    config.extraAllowedContent = 'span(*)[*]{*}';
};
</script>


<?php if ($this->session->flashdata('toast_message')): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    Toastify({
        text: "<?= $this->session->flashdata('toast_message') ?>",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "<?= ($this->session->flashdata('toast_type') == 'success') ? '#28a745' : '#dc3545' ?>",
    }).showToast();
});
</script>
<?php endif; ?>
<script>
//btn tolak
document.getElementById('btnTolak').addEventListener('click', function() {
    console.log("tes");

    const container = document.getElementById('inputContainer');
    container.innerHTML = '';

    const inputText = document.createElement('input');
    inputText.type = 'text';
    inputText.name = 'inputKeterangan';
    inputText.className = 'form-control';
    inputText.placeholder = 'Masukkan Keterangan';
    inputText.required = 'true';

    const inputStatus = document.createElement('input');
    inputStatus.type = 'hidden';
    inputStatus.name = 'statusId';
    inputStatus.className = 'form-control';
    inputStatus.value = '3';

    const btnSubmit = document.createElement('button');
    btnSubmit.className = 'btn btn-danger text-center mt-5';
    btnSubmit.type = 'submit';
    btnSubmit.innerText = 'Tolak Pengajuan';

    container.appendChild(inputStatus);
    container.appendChild(inputText);
    container.appendChild(btnSubmit);
    document.getElementById('btnTolak').disabled = true;
    document.getElementById('btnSimpan').disabled = false;

});
//btn setuju
document.getElementById('btnSimpan').addEventListener('click', function() {

    document.getElementById('btnTolak').disabled = false;
    document.getElementById('btnSimpan').disabled = true;

    const container = document.getElementById('inputContainer');
    container.innerHTML = '';

    const inputStatus = document.createElement('input');
    inputStatus.type = 'hidden';
    inputStatus.name = 'statusId';
    inputStatus.className = 'form-control';
    inputStatus.value = '4';

    const inputText = document.createElement('input');
    inputText.type = 'text';
    inputText.name = 'inputKeterangan';
    inputText.className = 'form-control';
    inputText.placeholder = 'Masukkan Keterangan';

    inputText.required = 'true';
    const btnSubmit = document.createElement('button');
    btnSubmit.className = 'btn btn-primary text-center mt-5';
    btnSubmit.type = 'submit';
    btnSubmit.innerText = 'Setujui Pengajuan';

    container.appendChild(inputStatus);
    container.appendChild(inputText);
    container.appendChild(btnSubmit);
    document.getElementById('btnSimpan').disabled = true;

});
</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>