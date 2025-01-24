<?php

//Menghubungkan ke file konfigurasi database
include("config.php");

// Memulai sesi untuk menyimpan notifikasi
session_start();

//proses penambahan kategori baru
if (isset($_POST['simpan'])) {
    //mengambil data nama kategori dari form
    $category_name = $_POST['category_name'];

    //query untuk menambahkan data kategori ke dalam database
    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    $exec = mysqli_query($conn, $query);

    if($exec) {
        $_SESSION['notification'] = [
             'type' => 'primary', //jenis notifikasi (contoh: primary untuk keberhasilan)
             'message' => 'Kategori berhasil ditambahkan!'
        ];
    } else {
        $_SESSION['notification'] = [
             'type' => 'danger', //jenis notifikasi (contoh: danger untuk kegagalan)
             'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
        ];
    }

    // redirect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}