 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-12 mb-4">
                 <div class="card">
                     <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-header">Data User</h5>
                            <div class="text-end mb-3">
                                <button class="btn btn-primary text-end">Tambah User</button>
                            </div>
                         </div>
                         <div class="table-responsive text-nowrap">
                             <table class="table table-hover table-bordered">
                                 <thead>
                                     <tr>
                                         <th>NO</th>
                                         <th>PEMBUAT</th>
                                         <th>NAMA KARYAWAN</th>
                                         <th>PN KARYAWAN</th>
                                         <th>EMAIL</th>
                                         <th>DEPARTEMENT</th>
                                         <th>TIM</th>
                                         <th>ROLE</th>
                                     </tr>
                                 </thead>
                                 <tbody class="table-border-bottom-0">
                                     <?php $i = $start + 1; ?>
                                     <?php foreach ($dataUser as $d): ?>
                                     <tr onclick="window.location='<?= base_url(
                                     	'User/dataKaryawan/' . $d['id_karyawan']
                                     ) ?>'">
                                         <td><?= $i ?></td>
                                         <td><?= tampilNama($d['pembuat']) ?></td>
                                         <td><?= $d['nama_karyawan'] ?></td>
                                         <td><?= $d['PN'] ?></td>
                                         <td><?= $d['email'] ?></td>
                                         <td><?= tampilDept($d['departemen']) ?></td>
                                         <td><?= $d['tim'] ?></td>
                                         <td><?= $d['role_id'] ?></td>
                                     </tr>
                                     <?php $i++; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                         <?= $this->pagination->create_links() ?>
                     </div>
                 </div>

                 <!-- Total Revenue -->

             </div>

         </div>
     </div>
     <!-- / Content -->