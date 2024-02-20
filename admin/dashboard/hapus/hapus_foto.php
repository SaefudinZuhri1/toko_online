<?php

    $id_foto = $_GET['idfoto'];
    $id_produk = $_GET['idproduk'];

    $ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk_foto = '$id_foto'");
    $detailfoto = $ambil->fetch_assoc();
    $detailfoto['nama_produk_foto'];

    unlink("../assets/images/foto_produk".$nama_foto);

    $koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto = '$id_foto'");

    echo "<script>alert('Foto Produk Berhasil Dihapus');</script>";
    echo "<script>window.location = 'index.php?halaman=detail_produk&id=$id_produk';</script>";

?>