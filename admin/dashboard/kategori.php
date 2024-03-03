<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Halaman Kategori</h4>
               </div>
            </div>

            <?php

            $kategori = array();
            $ambil = $koneksi->query("SELECT * FROM kategori");

            while ($pecah = $ambil->fetch_assoc()) {
               $kategori[] = $pecah;
            }

            ?>



            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table table-striped mb-0" role="grid">
                     <thead>
                        <tr>
                           <th class="text-center">No</th>
                           <th class="text-center">Nama Kategori</th>
                           <th class="text-center">Aksi</th>                           
                        </tr>
                     </thead>
                     <tbody>

                  <?php foreach ($kategori as $key => $value): ?>

                        <tr>
                           <td class="text-center" width="10"><?php echo $key+1; ?></td>
                           <td class="text-center" width="50"><?php echo $value['nama_kategori']; ?></td>
                           <td class="text-center" width="40">
                              <a href="index.php?halaman=edit_kategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-sm btn-primary">Edit</a>
                              <a href="index.php?halaman=hapus_kategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                           </td>          
                        </tr>
                        
                  <?php endforeach ?>
                  
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <a href="index.php?halaman=tambah_kategori" class="btn btn-success mt-2">Tambah</a>
      </div>