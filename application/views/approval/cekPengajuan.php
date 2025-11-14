 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-12 mb-4">
                 <div class="card">
                     <h5 class="card-header">Data Pengajuan Surat</h5>
                     <div class="card-body">
                         <div class="table-responsive text-nowrap">
                             <table class="table table-hover table-bordered">
                                 <thead>
                                     <tr class="text-center">
                                         <th>NO</th>
                                         <th>Pengirim</th>
                                         <th>checker</th>
                                         <th>Jenis</th>
                                         <th>Perihal</th>
                                         <th>Tanggal</th>
                                     </tr>
                                 </thead>
                                 <tbody class="table-border-bottom-0">
                                     <?php $i = 1; ?>
                                     <?php foreach ($dataDok as $dok) : ?>
                                         <tr
                                             onclick="window.location='<?= base_url('Approval/preview/' . $dok['id_dokumen']) ?>'">
                                             <td><?= $i; ?></td>
                                             <td><?= tampilNama($dok['id_karyawan']) ?></td>
                                             <td><?= tampilNama($dok['checker']) ?></td>
                                             <td><?php if ($dok['id_jenis_dokumen'] == 1) {
                                                        echo 'ND';
                                                    } else {
                                                        echo 'IP';
                                                    } ?></td>
                                             <td>
                                                 <?= $dok['perihal'] ?>
                                             </td>
                                             <td><?= tanggal_jam($dok['tanggal_input']) ?></td>
                                             </a>
                                         </tr>
                                         <?php $i++; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Total Revenue -->
         </div>
     </div>
     <!-- / Content -->