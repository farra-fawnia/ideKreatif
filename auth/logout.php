<?php
session_start(); //memulai sesi
session_unset(); //menghapus semua data sesi
session_destroy(); //menghancyrkan sesi sepenuhnya
header('Location: login.php'); //arahkan pengguna ke halaman login
exit(); //Menghentikan eksekusi script