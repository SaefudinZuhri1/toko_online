<link rel="shortcut icon" href="images/favicon.ico"/>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Halaman Tambah Produk</h4>
                    </div>
                </div>

                <?php

                $kategori = array();
                $ambil = $koneksi->query("SELECT * FROM kategori");

                while ($pecah = $ambil->fetch_assoc()) {
                    $kategori[] = $pecah;
                }

                ?>

                <form method="post" enctype="multipart/form-data">

                <div class="mb-3 ps-3 pe-3">
                    <select name="id_kategori" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected="" disabled>Pilih Kategori</option>
                        <?php foreach ($kategori as $key => $value): ?>
                        <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>                        
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group mb-3 ps-3 pe-3">
                    <span class="input-group-text" id="basic-addon1">Nama Produk :</span>
                    <input type="text" class="form-control" name="nama_produk" placeholder="Masukan Nama Produk" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <div class="input-group mb-3 ps-3 pe-3">
                    <span class="input-group-text" id="basic-addon1">Harga Produk :</span>
                    <input type="number" class="form-control" name="harga_produk" placeholder="Masukan Harga Produk" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <div class="input-group mb-3 ps-3 pe-3">
                    <span class="input-group-text" id="basic-addon1">Berat Produk :</span>
                    <input type="number" class="form-control" name="berat_produk" placeholder="Masukan Berat Produk" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <div class="input-group mb-3 ps-3 pe-3">
                    <span class="input-group-text" id="basic-addon1">Foto Produk :</span>
                    <div class="input-foto">
                        <input type="file" class="form-control" name="foto[]" placeholder="Masukan Foto Produk" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                
                    <span class="btn btn-sm btn-success mb-3 btn-tambah">
                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46583 5.23624C8.24276 5.53752 8.26838 5.96727 8.5502 6.24C8.8502 6.54 9.3402 6.54 9.6402 6.24L11.2302 4.64V8.78H12.7702V4.64L14.3602 6.24L14.4464 6.31438C14.7477 6.53752 15.1775 6.51273 15.4502 6.24C15.6002 6.09 15.6802 5.89 15.6802 5.69C15.6802 5.5 15.6002 5.3 15.4502 5.15L12.5402 2.23L12.4495 2.14848C12.3202 2.0512 12.1602 2 12.0002 2C11.7902 2 11.6002 2.08 11.4502 2.23L8.5402 5.15L8.46583 5.23624ZM6.23116 8.78512C3.87791 8.89627 2 10.8758 2 13.2875V18.2526L2.00484 18.4651C2.1141 20.8599 4.06029 22.7802 6.45 22.7802H17.56L17.7688 22.7753C20.1221 22.6641 22 20.6843 22 18.2628V13.3078L21.9951 13.0945C21.8853 10.6909 19.93 8.7802 17.55 8.7802H12.77V14.8849L12.7629 14.9922C12.7112 15.3776 12.385 15.6683 12 15.6683C11.57 15.6683 11.23 15.3224 11.23 14.8849V8.7802H6.44L6.23116 8.78512Z" fill="currentColor"></path>                            </svg>                        
                    </span>
                <div class="input-group">
                    <span class="input-group-text">Deskripsi Produk: </span>
                    <textarea class="form-control" aria-label="With textarea" type="text" name="deskripsi_produk" placeholder="Masukan Deskripsi Produk" required></textarea>
                </div>

                <div class="input-group mb-3 ps-3 pe-3">
                    <span class="input-group-text" id="basic-addon1">Stok Produk :</span>
                    <input type="number" class="form-control" name="stok_produk" placeholder="Masukan Stok Produk" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>                            
                    <a href="index.php?halaman=produk" class="btn btn-danger">Kembali</a>
                </div>

                </form>

                <?php

                if (isset($_POST['simpan'])) {

                    $id_kategori = $_POST['id_kategori'];
                    $nama = $_POST['nama_produk'];
                    $harga = $_POST['harga_produk'];
                    $berat = $_POST['berat_produk'];
                    $deskripsi = $_POST['deskripsi_produk'];
                    $stok = $_POST['stok_produk'];

                    // Periksa apakah ada file yang diunggah
                    if (!empty($_FILES['foto']['name'][0])) {
                        $nama_foto = $_FILES['foto']['name'];
                        $lokasi_foto = $_FILES['foto']['tmp_name'];

                        move_uploaded_file($lokasi_foto[0],  "../assets/images/foto_produk/" . $nama_foto[0]);
                        
                        $koneksi->query("INSERT INTO produk (id_kategori, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, stok_produk) VALUES('$id_kategori', '$nama', '$harga', '$berat', '$nama_foto[0]', '$deskripsi', '$stok')");

                        $id_baru = $koneksi->insert_id;

                        foreach ($nama_foto as $key => $tiap_nama) {
                            $tiap_lokasi = $lokasi_foto[$key];
                            move_uploaded_file($tiap_lokasi, "../assets/images/foto_produk/" . $tiap_nama);

                            $koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) VALUES ('$id_baru', '$tiap_nama')");
                        }
                    } else {
                        // Tangani jika tidak ada file yang diunggah
                        $koneksi->query("INSERT INTO produk (id_kategori, nama_produk, harga_produk, berat_produk, deskripsi_produk, stok_produk) VALUES('$id_kategori', '$nama', '$harga', '$berat', '$deskripsi', '$stok')");
                    }

                    echo "<script>alert('Produk Berhasil Ditambahkan!');</script>";
                    echo "<script>window.location = 'index.php?halaman=produk';</script>";
            

                }

                                
                ?>

            </div>
        </div>
    </div>
</div>

