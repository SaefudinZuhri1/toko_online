<?php

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$id_pembelian'");

$detail = $ambil->fetch_assoc();

?>


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Halaman Detail Pelanggan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <label for="" class="col-md-6 col-form-label">Nama : </label>
                                <label for="" class="col-md-6 col-form-label"><?php echo $detail['nama']; ?></label>                                
                                <label for="" class="col-md-6 col-form-label">Email : </label>
                                <label for="" class="col-md-6 col-form-label"><?php echo $detail['email']; ?></label>                                
                                <label for="" class="col-md-6 col-form-label">Telepon : </label>
                                <label for="" class="col-md-6 col-form-label"><?php echo $detail['no_tlpn']; ?></label>                                
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Halaman Detail Pembelian</h4>
                    </div>   
                </div>

                <div class="card-body">                    
                    <form>
                        <div class="row">
                            <div class="col">
                                <label for="" class="col-md-6 col-form-label">Tanggal : </label>
                                <label for="" class="col-md-6 col-form-label"><?php echo date("d F Y" , strtotime($detail['tgl_pembelian'])); ?></label>                                
                                <label for="" class="col-md-6 col-form-label">Total : </label>
                                <label for="" class="col-md-6 col-form-label">Rp<?php echo number_format($detail['total'], 0, ',', '.'); ?></label>                                                                
                            </div>                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<?php

$pp = array();

$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$id_pembelian' ");

while ($pecah = $ambil->fetch_assoc()) {
    $pp[] = $pecah;
}

?>


<div class="conatiner-fluid content-inner mt-2 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Checkout</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($pp as $key => $value): ?>
                                <?php $subtotal = $value['harga_produk']*$value['jumlah']; ?>

                                    <tr>
                                        <td class="text-center"><?php echo $key+1; ?></td>
                                        <td class="text-center"><?php echo $value['nama_produk']; ?></td>
                                        <td class="text-center"><?php echo $value['jumlah']; ?>pcs</td>
                                        <td class="text-center">Rp<?php echo number_format($value['harga_produk'], 0, ',', '.'); ?></td>
                                        <td class="text-center">Rp<?php echo number_format($subtotal, 0, ',', '.'); ?></td>                                        
                                        <td class="text-center"><span class="badge bg-primary">Dalam Pembayaran</span></td>                                            
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
</div>
