<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Halaman Pembelian</h4>
                </div>
                </div>

                <?php

                $pembelian = array();
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

                while ($pecah = $ambil->fetch_assoc()) {
                    $pembelian[] = $pecah;
                }

                ?>


                <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead>
                            <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Pengguna</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Aksi</th>                                                       
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($pembelian as $key => $value): ?>

                            <tr>
                                <td class="text-center" width="10"><?php echo $key+1; ?></td>
                                <td class="text-center" width="40"><?php echo $value['nama']; ?></td>
                                <td class="text-center" width="50"><?php echo date("d F Y", strtotime($value['tgl_pembelian'])); ?></td>
                                <td class="text-center" width="40">Rp<?php echo number_format($value['total'], 0, '.', '.'); ?></td>                                
                                <td class="text-center" width="40">
                                    <a href="index.php?halaman=detail_pembelian&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-sm btn-success">Detail</a>
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