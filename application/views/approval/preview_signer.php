 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <form method="POST" action="<?= base_url('Approval/updateDatasigner') ?>">
             <?php foreach ($dataDok as $dd): ?>
                 <div class="row">
                     <div class="col-lg-12 mb-4">
                         <div class="card">
                             <div class="card-body">
                                 <h5 class="card-title text-primary">Informasi Detail Surat</h5>
                                 <div class="row mb-3">
                                     <label class="col-lg-2 col-form-label" for="basic-default-name">Penerima</label>
                                     <div class="col-lg-10">
                                         <label class="col-sm-10 col-form-label" for="basic-default-name">:
                                             <?= tampilDept($dd['kepada']) ?>
                                         </label>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label class="col-sm-2 col-form-label" for="basic-default-company">Checker</label>
                                     <div class="col-sm-10">
                                         <label class="col-sm-10 col-form-label" for="basic-default-name">:
                                             <?= tampilNama($dd['checker']) ?>
                                         </label>
                                         <input type="hidden" name="checker" value="<?= $this->session->userdata(
                                         	'id_karyawan'
                                         ) ?>">
                                         <input type="hidden" name="jenis_dok" value="<?= $dd['id_jenis_dokumen'] ?>">
                                         <input type="hidden" name="id_dok" value="<?= $dd['id_dokumen'] ?>">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label class="col-sm-2 col-form-label" for="basic-default-company">Approval</label>
                                     <div class="col-sm-10">
                                         <label class="col-sm-10 col-form-label" for="basic-default-name">:
                                             <?= tampilNama($dd['signer']) ?>
                                         </label>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label class="col-lg-2 col-form-label" for="basic-default-company">Perihal</label>
                                     <div class="col-lg-10">
                                         <label class="col-lg-10 col-form-label" for="basic-default-name">:
                                             <?= $dd['perihal'] ?>
                                         </label>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label class="col-lg-2 col-form-label" for="basic-default-company">Tanggal</label>
                                     <div class="col-lg-10">
                                         <label class="col-lg-10 col-form-label" for="basic-default-name">:
                                             <?= tanggal_jam($dd['tanggal_input']) ?>
                                         </label>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-12 col-md-12 order-1">
                     <div class="card">
                         <div class="card-body">
                             <style>
                                 table {
                                     border-collapse: collapse;
                                     width: 100%;
                                     border-collapse: collapse;
                                     margin-top: 15px;
                                     margin-bottom: 20px;
                                     font-size: 12px;
                                 }

                                 div th,
                                 td {
                                     border: 1px solid #000;
                                     padding: 5px;
                                 }

                                 body {
                                     font-family: Arial, sans-serif;
                                     line-height: 1.6;
                                     margin: 0;
                                     padding: 0;
                                     background-color: #f4f4f4;
                                     /* Warna latar belakang halaman */
                                     display: flex;
                                     justify-content: center;
                                 }

                                 .container {

                                     background-color: white;
                                     padding: 2.5cm 2cm;
                                     /* Margin yang sesuai untuk dokumen */
                                     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                     font-family: Arial, sans-serif;
                                 }

                                 /* --- Header Section --- */
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
                                     /* Ukuran untuk logo */
                                     padding-top: 5px;
                                 }

                                 .logo {
                                     font-size: 60px;
                                     font-weight: bold;
                                     color: #003366;
                                     /* Warna khas BRI (biru tua) */
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

                                 .header-right {
                                     flex: 0 0 120px;
                                     text-align: right;
                                 }

                                 .model-s4 {
                                     font-size: 10px;
                                     margin: 0 0 10px 0;
                                 }

                                 /* --- Main Content Section --- */
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
                                     /* Lebar tetap untuk label */
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

                                 .content-body p strong {
                                     font-weight: bold;
                                 }

                                 /* --- Table Section --- */
                                 .device-table {
                                     width: 100%;
                                     border-collapse: collapse;
                                     margin-top: 15px;
                                     margin-bottom: 20px;
                                     font-size: 12px;
                                 }

                                 .device-table th,
                                 .device-table td {
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

                                 /* Penyesuaian lebar kolom spesifik */
                                 .device-table td:nth-child(1) {
                                     width: 5%;
                                     text-align: center;
                                 }

                                 /* No */
                                 .device-table td:nth-child(2) {
                                     width: 25%;
                                 }

                                 /* Diperuntukkan untuk */
                                 .device-table td:nth-child(3) {
                                     width: 30%;
                                 }

                                 /* PN / Jabatan */
                                 .device-table td:nth-child(4) {
                                     width: 10%;
                                     text-align: center;
                                 }

                                 /* Perangkat */
                                 .device-table td:nth-child(5) {
                                     width: 25%;
                                 }

                                 /* Spesifikasi */
                                 .device-table td:nth-child(6) {
                                     width: 5%;
                                     text-align: center;
                                 }

                                 /* Jumlah */


                                 .device-table ul {
                                     list-style-type: disc;
                                     padding-left: 15px;
                                     margin: 0;
                                 }

                                 .device-table li {
                                     margin-bottom: 3px;
                                 }

                                 /* --- Closing Section --- */
                                 .closing-paragraph {
                                     font-size: 12px;
                                     margin-bottom: 10px;
                                 }

                                 .closing-paragraph strong {
                                     font-weight: bold;
                                 }
                             </style>
                             <div class="container">
                                 <header>
                                     <div class="header-left">
                                         <div class="logo">BRI</div>
                                     </div>
                                     <div class="header-center">
                                         <h1>PT Mandiri (Persero) Tbk.</h1>
                                         <div class="address-info">
                                             <p>Kantor Pusat</p>
                                             <p>Telepon</p>
                                             <p>Facsimile</p>
                                             <p>Website: <a href="http://www.bri.co.id">http://www.mandiri.co.id</a>
                                             </p>
                                         </div>
                                     </div>
                                     <div class="header-right">
                                     </div>
                                 </header>
                                 <main>
                                     <h2 class="nota-dinas"><?php if ($dd['id_jenis_dokumen'] == 1) {
                                     	echo 'NOTA DINAS';
                                     } else {
                                     	echo 'IZIN PRINSIP';
                                     } ?></h2>

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

                                     <div class="content-body mb-5">
                                         <p><?= $dd['isi_dokumen'] ?></p>
                                     </div>

                                     <div class="content-body mt-5">
                                         <div class="row">
                                             <div class="col-md-6 float-end">
                                                 <p></p><br>
                                                 <p class="text-center"><?= tampilDept($dd['signer']) ?></p><br>
                                                 <br>
                                                 <p class="text-center"><?= tampilNama($dd['signer']) ?></p><br>

                                             </div>
                                             <div class="col-md-6 float-end">
                                                 <div class="col-md-6">
                                                     <p class="text-center"><b>PT. Bank Mandiri (Persero), Tbk</b></p>
                                                     <p class="text-center"><?= tampilDept($dd['checker']) ?></p><br>
                                                     <br>
                                                     <p class="text-center"><?= tampilNama($dd['checker']) ?></p><br>
                                                 </div>
                                             </div>
                                         </div>

                                 </main>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row mb-3">
                                 <div class="col-sm-12 text-center">
                                     <button type="button" class="btn btn-danger center" id="btnTolak">Tolak</button>
                                     <button type="button" class="btn btn-primary center"
                                         id="btnSimpan">Setujui</button>
                                     <button onclick="history.back()" type="button"
                                         class="btn btn-primary center">Kembali</button>
                                 </div>
                             </div>
                             <div>
                                 <div id="inputContainer" class="text-center">

                                 </div>
                             </div>
                         <?php endforeach; ?>
         </form>
     </div>
     <!-- Total Revenue -->
 </div>
 </div>
 <!-- / Content -->