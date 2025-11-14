<!DOCTYPE html>


<html lang="id" class="light-style customizer-hide" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Halaman Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/logo/logo-kecil.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>toastify/toastify.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="<?= base_url('vendor') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?= base_url('vendor') ?>/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('vendor') ?>/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <span><img width="95%" src="<?= base_url('assets/logo/logo-sistem.png')?>" alt=""></span>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Sistem E-Dokumen</h4>
                        <p class="mb-4">by Office of The Board - Bank Mandiri, tbk</p>

                        <form <?= base_url('Auth'); ?> method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?= set_value('email')?>" placeholder="Masukkan Email" autofocus required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('vendor') ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('vendor') ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('vendor') ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('vendor') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('vendor') ?>/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <script src="<?= base_url('vendor/') ?>toastify/toastify.js"></script>
    <script src="<?= base_url('vendor/') ?>toastify/extensions/toastify.js"></script>

    <!-- Vendors JS -->
    <?php if ($this->session->flashdata('toast_message')): ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        Toastify({
            text: "<?= $this->session->flashdata('toast_message') ?>",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "<?= ($this->session->flashdata('toast_type') == 'success') ? '#28a745' : '#dc3545' ?>"
        }).showToast();
    });
    </script>
    <?php endif; ?>

    <!-- Main JS -->
    <script src="<?= base_url('vendor') ?>/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>