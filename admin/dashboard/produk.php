<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Halaman Produk</h4>
                </div>
                </div>

                <?php

                $produk = array();
                $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");

                while ($pecah = $ambil->fetch_assoc()) {
                    $produk[] = $pecah;
                }

                ?>


                <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-1" role="grid">
                        <thead>
                            <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Harga Produk</th>
                            <th class="text-center">Berat Produk</th>
                            <th class="text-center">Foto Produk</th>
                            <th class="text-center">Deskripsi Produk</th>
                            <th class="text-center">Aksi</th>                           
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($produk as $key => $value): ?>

                            <tr>
                                <td class="text-center" width="10"><?php echo $key+1; ?></td>
                                <td class="text-center" width="40"><?php echo $value['nama_kategori']; ?></td>
                                <td class="text-center" width="50"><?php echo $value['nama_produk']; ?></td>
                                <td class="text-center" width="40">Rp<?php echo number_format($value['harga_produk'], 0, '.', '.'); ?></td>
                                <td class="text-center" width="30"><?php echo $value['berat_produk']; ?></td>
                                <td class="text-center" width="50"><img width="100" src="../assets/images/foto_produk/<?php echo $value['foto_produk']; ?>"></td>
                                <td class="text-center" width="30"><?php echo $value['deskripsi_produk']; ?></td>
                                <td class="text-center" width="50">
                                    <a href="index.php?halaman=edit_produk&id=<?php echo $value['id_produk']; ?> " class="btn btn-sm btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                    <a href="index.php?halaman=detail_produk&id=<?php echo $value['id_produk']; ?>" class="btn btn-sm btn-info">Detail</a>
                                </td>          
                            </tr>
                            
                        <?php endforeach ?>
                        
                        </tbody>
                    </table>
                    <a href="index.php?halaman=tambah_produk" class="btn btn-sm btn-primary">Tambah Produk</a>
                </div>
                </div>
            </div>
        </div>
    </div>
        </div>