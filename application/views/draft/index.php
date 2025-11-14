 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-12 mb-4">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-header">Data Dratf Surat</h5>
                         <div class="table-responsive text-nowrap">
                             <table class="table table-hover table-bordered">
                                 <thead>
                                     <tr>
                                         <th>NO</th>
                                         <th>Pengirim</th>
                                         <th>Jenis</th>
                                         <th>Perihal</th>
                                         <th>Tanggal</th>
                                     </tr>
                                 </thead>
                                 <tbody class="table-border-bottom-0">
                                     <?php $i = $start + 1; ?>
                                     <?php foreach ($dataDok as $dok) : ?>
                                     <tr
                                         onclick="window.location='<?= base_url('Draft/preview/'.$dok['id_dokumen']) ?>'">
                                         <td><?= $i; ?></td>
                                         <td><?= tampilNama($dok['id_karyawan']) ?></td>
                                         <td><?php if($dok['id_jenis_dokumen'] == 1){
                                            echo 'ND';
                                         }else{
                                            echo 'IP';
                                         } ?></td>
                                         <td><?= $dok['perihal'] ?></td>
                                         <td><?= tanggal_jam($dok['tanggal_input']) ?></td>
                                         </a>
                                     </tr>
                                     <?php $i++; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                         <?= $this->pagination->create_links(); ?>
                     </div>
                 </div>

                 <!-- Total Revenue -->

             </div>

         </div>
     </div>
     <!-- / Content -->