<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Halaman List Pelanggan</h4>
               </div>
            </div>

            <?php

            $pelanggan = array();
            $ambil = $koneksi->query("SELECT * FROM pelanggan");

            while ($pecah = $ambil->fetch_assoc()) {
                $pelanggan[] = $pecah;
            }

            ?>


            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table table-striped mb-0" role="grid">
                     <thead>
                        <tr>
                           <th class="text-center">No</th>
                           <th class="text-center">Email</th>
                           <th class="text-center">Nomor Telepon</th>                           
                           <th class="text-center">Nama Pelanggan</th>                           
                           <th class="text-center">Foto Pelanggan</th>                           
                           <th class="text-center">Aksi</th>                           
                        </tr>
                     </thead>
                     <tbody>

                    <?php foreach ($pelanggan as $key => $value): ?>

                        <tr>
                            <td class="text-center" width="10"><?php echo $key+1; ?></td>
                            <td class="text-center" width="50"><?php echo $value['email']; ?></td>
                            <td class="text-center" width="50"><?php echo $value['no_tlpn']; ?></td>
                            <td class="text-center" width="50"><?php echo $value['nama']; ?></td>
                            <td class="text-center" width="50"><?php echo $value['foto_pelanggan']; ?></td>
                            <td class="text-center" width="40">                                
                                <a href="" class="btn btn-sm btn-danger">Hapus</a>
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
      </div>