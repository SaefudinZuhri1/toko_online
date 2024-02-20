    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"> Halaman Tambah Kategori</h4>
                        </div>
                    </div>
                    <div class="card-body">                    
                        <div class="row">
                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label" for="validationDefault01">Nama Kategori</label>
                                    <input type="text" class="form-control" id="validationDefault01" placeholder="Masukan Nama Kategori" name="nama" required >
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
        </div>
    </div>
</div>


<?php 

    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
                            
        $koneksi->query("INSERT INTO kategori (nama_kategori) VALUES ('$nama')");

        echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
        echo "<script>window.location = 'index.php?halaman=kategori';</script>";

    }

?>

