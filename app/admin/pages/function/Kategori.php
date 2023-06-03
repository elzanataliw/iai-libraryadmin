<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    // $kode_kategori = $_POST['kodeKategori'];
    $name = $_POST['namaKategori'];

    $sql = "INSERT INTO categories(name)VALUES('$name')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id = $_POST['idKategori'];
    $name = $_POST['namaKategori'];

    $query = "UPDATE categories SET name = '$name'";
    $query .= "WHERE id = '$id'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM categories WHERE id = '$id'");

    if ($sql) {
        $_SESSION['berhasil'] = "Kategori buku berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Kategori buku gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
