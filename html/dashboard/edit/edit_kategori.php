<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card pe-3 ps-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Halaman Edit Kategori</h4>
                    </div>
                </div>

<?php

$id_kategori = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");

$edit = $ambil->fetch_assoc();

?>

                <form method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama_kategori" id="floatingInput" value="<?php echo $edit['nama_kategori']; ?>">
                        <label for="floatingInput">Nama Kategori</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>                            
                        <a href="index.php?halaman=kategori" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_kategori'];

    $koneksi->query("UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = '$id_kategori'");

    echo "<script>alert('Data Berhasil Diubah!');</script>";
    echo "<script>window.location = 'index.php?halaman=kategori';</script>";
}

?>