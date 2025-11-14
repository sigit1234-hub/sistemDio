    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <form method="POST" action="<?= base_url('Draft/updateData')?>">
                <?php foreach($dataDok as $dd): ?>
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Masukkan Detail Nota Dinas
                                    <?= $this->uri->segment(3) ?></h5>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Penerima</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="jenis_dok" id="jenis_dok"
                                            value="<?= $dd['id_jenis_dokumen']?>">
                                        <input type="hidden" name="id" id="id" value="<?= $dd['id_dokumen']?>">
                                        <select class="form-select" id="penerima" name="penerima">
                                            <option selected value="<?= $dd['kepada'] ?>">
                                                <?= tampilDept($dd['kepada']) ?>
                                            </option>
                                            <?php foreach (departemen() as $dp) {?>
                                            <option value="<?= $dp['id_dept'] ?>"><?= $dp['nama_dept'] ?></option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Checker</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="checker" name="checker">
                                            <option selected value="<?= $dd['checker'] ?>">
                                                <?= tampilNama($dd['checker']) ?>
                                            </option>
                                            <?php foreach (teamLead() as $kar) {?>
                                            <option value="<?= $kar['id_karyawan']?>"><?= $kar['nama_karyawan'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Approval</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="approval" name="approval">
                                            <option selected value="<?= $dd['signer'] ?>">
                                                <?= tampilNama($dd['signer']) ?>
                                            </option>
                                            <?php foreach (teamLead() as $kar) {?>
                                            <option value="<?= $kar['id_karyawan']?>"><?= $kar['nama_karyawan'] ?>
                                            </option>
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
                                            aria-label="Text input with segmented dropdown button"
                                            value="<?= $dd['perihal']?>" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tanggal" name="tanggal"
                                            aria-label="Text input with segmented dropdown button"
                                            value="<?= tanggal() ?>" readonly />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <textarea name="isi" id="editor1" rows="10"
                                            cols="80"> <?= $dd['isi_dokumen'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary center">Simpan dan
                                            Pratinjau</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
            </form>
            <!-- Total Revenue -->
        </div>
    </div>
    <!-- / Content -->