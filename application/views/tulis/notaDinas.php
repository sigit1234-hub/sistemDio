 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <form method="POST" action="<?= base_url('Tulis/simpan') ?>">
             <div class="row">
                 <div class="col-lg-12 mb-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title text-primary">Masukkan Detail Nota Dinas</h5>
                             <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-name">Penerima</label>
                                 <div class="col-sm-10">
                                     <input type="hidden" name="jenis_dok" id="jenis_dok" value="1">
                                     <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $this->session->userdata('id_karyawan') ?>">
                                     <select class="form-select" id="penerima" name="penerima" required>
                                         <option>Pilih..</option>
                                         <?php foreach (departemen() as $dp) { ?>
                                             <option value="<?= $dp['id_dept'] ?>"><?= $dp['nama_dept'] ?></option>
                                         <?php }; ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-company">Checker</label>
                                 <div class="col-sm-10">
                                     <select class="form-select" id="checker" name="checker" required>
                                         <option>Pilih..</option>
                                         <?php foreach (teamLead() as $kar) { ?>
                                             <option value="<?= $kar['id_karyawan'] ?>"><?= $kar['nama_karyawan'] ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-company">Approval</label>
                                 <div class="col-sm-10">
                                     <select class="form-select" id="approval" name="approval" required>
                                         <option>Pilih..</option>
                                         <?php foreach (teamLead() as $kar) { ?>
                                             <option value="<?= $kar['id_karyawan'] ?>"><?= $kar['nama_karyawan'] ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>

                 <div class="col-lg-12 col-md-12 order-1">
                     <div class="card">
                         <div class="card-body">
                             <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-company">Perihal</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="perihal" name="perihal"
                                         aria-label="Text input with segmented dropdown button" required />
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="tanggal" name="tanggal"
                                         aria-label="Text input with segmented dropdown button" value="<?= tanggal() ?>"
                                         readonly />
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <div class="col-sm-12">
                                     <textarea name="isi" id="editor1" rows="10" cols="80" required></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="row mb-3">
                             <div class="col-sm-12 text-center">
                                 <button type="submit" class="btn btn-primary center">Simpan dan Pratinjau</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
         <!-- Total Revenue -->
     </div>
 </div>
 <!-- / Content -->