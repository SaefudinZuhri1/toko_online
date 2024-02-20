<?php

    $id_produk = $_GET['id'];

    $ambil= $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = '$id_produk'");

    $detail_produk = $ambil->fetch_assoc();

    $produk_foto = array();
    $ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk = '$id_produk'");

    while ($tiap = $ambil->fetch_assoc()) {
        $produk_foto[] = $tiap;
    }

?>
                
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Produk</h4>
                    </div>
                </div>
                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Nama Kategori :</span>
                    <input disabled class="form-control" placeholder="<?php echo $detail_produk['nama_kategori']; ?>">
                </div>

                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Nama Produk :</span>
                    <input disabled class="form-control" placeholder="<?php echo $detail_produk['nama_produk']; ?>">
                </div>

                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Harga Produk :</span>
                    <input disabled class="form-control" placeholder="<?php echo $detail_produk['harga_produk']; ?>">
                </div>

                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Berat Produk :</span>
                    <input disabled class="form-control" placeholder="<?php echo $detail_produk['berat_produk']; ?>">
                </div>

                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Deskripsi Produk :</span>
                    <textarea disabled class="form-control" placeholder="<?php echo $detail_produk['deskripsi_produk']; ?>"></textarea>
                </div>

                <div class="input-group mb-3 ps-4 pe-3">
                    <span class="col-sm-2 col-form-label" id="basic-addon1">Stok Produk :</span>
                    <input disabled class="form-control" placeholder="<?php echo $detail_produk['stok_produk']; ?>">
                </div>
                
            </div>

            <div class="row">
                <?php foreach ($produk_foto as $key => $value): ?>
                    <div class="col-4">
                        <div class="card"> 
                            <img src="../assets/images/foto_produk/<?php echo $value['nama_produk_foto'] ?>" class="img-thumbnail" style="22rem">                   
                            <div class="card-footer text-center">
                                <a href="index.php?halaman=hapus_foto&idfoto=<?php echo $value['id_produk_foto']; ?>&idproduk=<?php echo $value['id_produk'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                    
                <?php endforeach; ?>
            </div>

        </div>

        <form method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <strong><h1 class="heading-1">Tambah Foto</h1></strong>
            </div>
            <div class="card-body">                   
                <div class="form-floating mb-3">                    
                    <input type="file" class="form-control" name="produk_foto" id="floatingInput">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>                            
                    <a href="index.php?halaman=produk" class="btn btn-danger">Kembali</a>
                </div>

            </div>
        </div>
        </form>

        <?php

        if (isset($_POST['simpan'])) {

            $namafoto = $_FILES['produk_foto']['name'];
            $lokasifoto = $_FILES['produk_foto']['tmp_name'];

            $tgl_foto = date('YmdHis') . $namafoto;

            move_uploaded_file($lokasifoto, "../assets/images/foto_produk/" . $tgl_foto);

            $koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) VALUES ('$id_produk', '$tgl_foto')");

            echo "<script>alert('Foto Produk Berhasil Disimpan');</script>";
            echo "<script>window.location = 'index.php?halaman=detail_produk&id=$id_produk';</script>";

        }

        ?>

    </div>
</div>

