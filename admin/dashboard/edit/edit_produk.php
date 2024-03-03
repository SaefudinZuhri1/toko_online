<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Halaman Edit Produk</h4>
                    </div>
                </div>

<?php

$id_produk = $_GET['id'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah; 
}

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = '$id_produk'");

$edit = $ambil->fetch_assoc();

?>

                    <form method="post" enctype="multipart/form-data">
                        <div class="col-md-6 position-relative pe3 ps-3">
                            <label for="validationTooltip04" class="form-label">Nama Kategori</label>
                            <select name="id_kategori" class="form-select" id="validationTooltip04" required>
                                <option value="<?php echo $edit['id_kategori']; ?>">
                                    <?php echo $edit['nama_kategori']; ?>
                                </option>

                                <?php foreach ($kategori as $key => $value): ?>

                                    <option value="<?php echo $value['id_kategori']; ?>">
                                    <?php echo $value['nama_kategori']; ?>
                                    </option>

                                <?php endforeach ?>
                            </select>
                            <div class="invalid-tooltip">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <input type="text" class="form-control" name="nama_produk" id="floatingInput" value="<?php echo $edit['nama_produk']; ?>">
                            <label for="floatingInput">Nama Produk</label>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <input type="text" class="form-control" name="harga_produk" id="floatingInput" value="<?php echo $edit['harga_produk']; ?>">
                            <label for="floatingInput">Harga Produk</label>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <input type="text" class="form-control" name="berat_produk" id="floatingInput" value="<?php echo $edit['berat_produk']; ?>">
                            <label for="floatingInput">Berat Produk</label>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <img src="../assets/images/foto_produk/<?php echo $edit['foto_produk'] ?>" width="150">
                            <input type="file" class="form-control" name="foto[]" id="floatingInput" value="<?php echo $edit['foto_produk']; ?>">                            
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <textarea name="deksripsi_produk"><?php echo $edit['deskripsi_produk'] ?></textarea>
                            <label for="floatingInput">Deskripsi Produk</label>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <input type="text" class="form-control" name="stok_produk" id="floatingInput" value="<?php echo $edit['stok_produk']; ?>">
                            <label for="floatingInput">Stok Produk</label>
                        </div>

                        <div class="form-floating mb-3 ps-3 pe-3">
                            <button name="simpan" class="btn btn-primary btn-sm">Simpan</button> 
                            <a href="index.php?halaman=produk" class="btn btn-danger btn-sm">Kembali</a>
                        </div>

                    
                    <?php

                    if (isset($_POST['simpan'])) {

                        $id_kategori = $_POST['id_kategori']; 
                        $nama = $_POST['nama_produk'];
                        $harga = $_POST['harga_produk'];
                        $berat = $_POST['berat_produk'];
                        $deskripsi = $_POST['deskripsi_produk'];
                        $stok = $_POST['stok_produk'];

                        $namafoto = $_FILES['foto']['name'];
                        $lokasifoto = $_FILES['foto']['tmp_name'];

                        // Jika foto produk diubah
                        if (!empty($lokasifoto)) {
                            move_uploaded_file($lokasifoto[0], "../assets/images/foto_produk/" . $namafoto[0]);

                            $koneksi->query("UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama', harga_produk = '$harga', berat_produk = '$berat', foto_produk = '$namafoto[0]', deskripsi_produk = '$deskripsi', stok_produk = '$stok' WHERE id_produk = '$id_produk'");

                        }

                        // Jika foto produk tidak diubah
                        else {
                            $koneksi->query("UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama', harga_produk = '$harga', berat_produk = '$berat', deskripsi_produk = '$deskripsi', stok_produk = '$stok' WHERE id_produk = '$id_produk'");
                        }

                        $namafotoproduk = $_FILES['foto']['name'];
                        $lokasifotoproduk = $_FILES['foto']['tmp_name'];

                        move_uploaded_file($lokasifotoproduk[0], "../assets/images/foto_produk/" . $namafotoproduk[0]);
                        $koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) VALUES ('$id_produk', '$namafotoproduk[0]')");

                        echo "<script>alert('Data Berhasil Diubah!');</script>";
                        echo "<script>window.location = 'index.php?halaman=produk';</script>";

                    }

                    ?>

                    </form>

            </div>
        </div>
    </div>
</div>

