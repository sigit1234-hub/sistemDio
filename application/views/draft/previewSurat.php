<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="<?= base_url('Draft/updateData') ?>">
            <?php foreach ($dataDok as $dd): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 order-1">
                        <div class="card">
                            <div class="card-body">
                                <style>
                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                        margin-top: 15px;
                                        margin-bottom: 20px;
                                        font-size: 12px;
                                    }

                                    th, td {
                                        border: 1px solid #000;
                                        padding: 5px;
                                    }

                                    body {
                                        font-family: Arial, sans-serif;
                                        line-height: 1.6;
                                        margin: 0;
                                        padding: 0;
                                        background-color: #f4f4f4;
                                        display: flex;
                                        justify-content: center;
                                    }

                                    .container {
                                        background-color: white;
                                        padding: 2.5cm 2cm;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }

                                    header {
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: flex-start;
                                        margin-bottom: 30px;
                                        border-bottom: 1px solid #ccc;
                                        padding-bottom: 15px;
                                    }

                                    .header-left {
                                        flex: 0 0 100px;
                                        padding-top: 5px;
                                    }

                                    .logo {
                                        font-size: 60px;
                                        font-weight: bold;
                                        color: #003366;
                                        border: 3px solid #003366;
                                        padding: 5px 10px;
                                        height: 60px;
                                        line-height: 0.9;
                                        letter-spacing: -5px;
                                        text-align: center;
                                    }

                                    .header-center {
                                        flex-grow: 1;
                                        text-align: center;
                                        line-height: 1.2;
                                    }

                                    .header-center h1 {
                                        font-size: 16px;
                                        margin-bottom: 5px;
                                        color: #000;
                                    }

                                    .address-info {
                                        font-size: 10px;
                                        line-height: 1.4;
                                        color: #555;
                                        margin-top: 5px;
                                    }

                                    .address-info a {
                                        color: #003366;
                                        text-decoration: none;
                                    }

                                    .nota-dinas {
                                        text-align: center;
                                        font-size: 18px;
                                        text-decoration: underline;
                                        margin: 40px 0;
                                    }

                                    .metadata {
                                        margin-left: 20px;
                                        margin-bottom: 30px;
                                        font-size: 12px;
                                    }

                                    .meta-row {
                                        display: flex;
                                        margin-bottom: 5px;
                                    }

                                    .meta-label {
                                        flex: 0 0 90px;
                                        font-weight: normal;
                                    }

                                    .meta-separator {
                                        flex: 0 0 10px;
                                    }

                                    .meta-content {
                                        flex-grow: 1;
                                    }

                                    .content-body p {
                                        font-size: 12px;
                                        text-align: justify;
                                        margin-bottom: 15px;
                                    }

                                    .device-table {
                                        width: 100%;
                                        border-collapse: collapse;
                                        margin-top: 15px;
                                        margin-bottom: 20px;
                                        font-size: 12px;
                                    }

                                    .device-table th, .device-table td {
                                        border: 1px solid #000;
                                        padding: 5px;
                                        text-align: left;
                                        vertical-align: top;
                                    }

                                    .device-table th {
                                        background-color: #eee;
                                        font-weight: bold;
                                        text-align: center;
                                    }
                                </style>

                                <div class="container">
                                    <header>
                                        <div class="header-left">
                                            <div class="logo">BRI</div>
                                        </div>
                                        <div class="header-center">
                                            <h1>PT Bank Rakyat Indonesia (Persero) Tbk.</h1>
                                            <div class="address-info">
                                                <p>Kantor Pusat</p>
                                                <p>Telepon</p>
                                                <p>Facsimile</p>
                                                <p>
                                                    Website: 
                                                    <a href="http://www.bri.co.id">http://www.bri.co.id</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="header-right"></div>
                                    </header>

                                    <main>
                                        <h2 class="nota-dinas">
                                            <?= $dd['id_jenis_dokumen'] == 1 ? 'NOTA DINAS' : 'IZIN PRINSIP' ?>
                                        </h2>

                                        <div class="metadata">
                                            <div class="meta-row">
                                                <span class="meta-label">Kepada Yth.</span>
                                                <span class="meta-separator">:</span>
                                                <span class="meta-content"><?= $dd['kepada'] ?></span>
                                            </div>
                                            <div class="meta-row">
                                                <span class="meta-label">Dari</span>
                                                <span class="meta-separator">:</span>
                                                <span class="meta-content">isi</span>
                                            </div>
                                            <div class="meta-row">
                                                <span class="meta-label">Perihal</span>
                                                <span class="meta-separator">:</span>
                                                <span class="meta-content"><?= $dd['perihal'] ?></span>
                                            </div>
                                            <div class="meta-row">
                                                <span class="meta-label">Lampiran</span>
                                                <span class="meta-separator">:</span>
                                                <span class="meta-content">-</span>
                                            </div>
                                            <div class="meta-row">
                                                <span class="meta-label">Tanggal</span>
                                                <span class="meta-separator">:</span>
                                                <span class="meta-content"><?= tgl($dd['tanggal_input']) ?></span>
                                            </div>
                                        </div>

                                        <div class="content-body">
                                            <p><?= $dd['isi_dokumen'] ?></p>
                                        </div>

                                        <div class="content-body">
                                            <div class="row">
                                                <div class="col-md-6 float-end text-center">
                                                    <p class="text-center mt-5"><?= tampilDept($dd['signer']) ?></p>
                                                    <img 
                                                        style="width: 20%" 
                                                        src="<?= base_url(
                                                        	'assets/qrcode/' . tampilNama($dd['checker']) . '.png'
                                                        ) ?>" alt="">
                                                    <p class="text-center"><?= tampilNama($dd['signer']) ?></p>
                                                </div>
                                                <div class="col-md-6 float-end text-center">
                                                    <p class="text-center mt-2"><b>PT. Bank Mandiri (Persero), Tbk</b></p>
                                                    <p class="text-center"><?= tampilDept($dd['checker']) ?></p>
                                                    <img 
                                                        style="width: 20%" 
                                                        src="<?= base_url(
                                                        	'assets/qrcode/' . tampilNama($dd['checker']) . '.png'
                                                        ) ?>" 
                                                        alt=""
                                                    >
                                                    <p class="text-center"><?= tampilNama($dd['checker']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
<!-- / Content -->
