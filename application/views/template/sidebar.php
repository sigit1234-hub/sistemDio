<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= base_url("Home") ?>" class="app-brand-link">
            <span><img width="95%" src="<?= base_url(
            	"assets/logo/logo-sistem.png"
            ) ?>" alt=""></span>
        </a> <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?php if ($title == "Dashboard") {
        	echo "active";
        } ?>">
            <a href="<?= base_url("Home") ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item <?php if ($title == "Tulis") {
        	echo "active";
        } ?>">
            <a href="<?= base_url("Tulis") ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-pen"></i>
                <div data-i18n="Analytics">Tulis</div>
            </a>
        </li>
        <li class="menu-item <?php if ($title == "Approval") {
        	echo "active open";
        } ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Approval</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if ($judul == "cekPengajuan") {
                	echo "active";
                } ?>">
                    <a href="<?= base_url(
                    	"Approval/cekPengajuan"
                    ) ?>" class="menu-link">
                        <div data-i18n="Without menu">Cek Pengajuan</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($judul == "Approval") {
                	echo "active";
                } ?>">
                    <a href="<?= base_url("Approval") ?>" class="menu-link">
                        <div data-i18n="Without menu">Approval Pengajuan</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($judul == "Dalam Proses") {
                	echo "active";
                } ?>">
                    <a href="layouts-without-navbar.html" class="menu-link">
                        <div data-i18n="Without navbar">Dalam Proses</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?php if ($title == "Users") {
        	echo "active open";
        } ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n=" Authentications">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="auth-login-basic.html" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Data User</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="auth-register-basic.html" class="menu-link" target="_blank">
                        <div data-i18n="Basic">Tambah User</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?php if ($title == "Draft") {
        	echo "active open";
        } ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Draft</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if ($judul == "Draft") {
                	echo "active";
                } ?>">
                    <a href=" <?= base_url("Draft") ?>" class="menu-link">
                        <div data-i18n="Account">Draft</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($judul == "Dalam Pengajuan") {
                	echo "active";
                } ?>">
                    <a href="<?= base_url(
                    	"Draft/pengajuan"
                    ) ?>" class="menu-link">
                        <div data-i18n="Notifications">Dalam Pengajuan</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($judul == "diTolak") {
                	echo "active";
                } ?>">
                    <a href="<?= base_url(
                    	"Draft/diTolak"
                    ) ?>" class="menu-link">
                        <div data-i18n="Connections">Pengajuan ditolak</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($judul == "surat") {
                	echo "active";
                } ?>">
                    <a href="<?= base_url(
                    	"Approval/surat"
                    ) ?>" class="menu-link">
                        <div data-i18n="Connections">Surat Keluar</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?php if ($title == "Profile") {
        	echo "active";
        } ?>">
            <a href="<?= base_url("Home") ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <a href=" <?= base_url("Auth/Logout") ?>" class="menu-link">
                <i class="menu-icon tf-icon  bx bx-user"></i>
                <div data-i18n=" Analytics">Keluar</div>
            </a>
        </li>

</aside>
<!-- / Menu -->