<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $title = $_POST['judulBuku'];
    $kategori_buku = $_POST['kategoriBuku'];
    $publisher = $_POST['penerbitBuku'];
    $pengarang_buku = $_POST['pengarang'];
    $year_published = $_POST['tahunTerbit'];
    $isbn = $_POST['iSbn'];
    $stock = $_POST['jumlahBukuBaik'];
    // $j_buku_rusak = $_POST['jumlahBukuRusak'];

    // PROCESS INSERT DATA TO DATABASE
    $sql = "INSERT INTO books(title,kategori_buku,publisher,pengarang_buku,year_published,isbn,stock)
        VALUES('" . $title . "','" . $kategori_buku . "','" . $publisher . "','" . $pengarang_buku . "','" . $year_published . "','" . $isbn . "', '" . $stock . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Data buku berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data buku gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id = $_POST['id'];
    $title = $_POST['judulBuku'];
    $kategori_buku = $_POST['kategoriBuku'];
    $publisher = $_POST['penerbitBuku'];
    $pengarang_buku = $_POST['pengarang'];
    $year_published = $_POST['tahunTerbit'];
    $isbn = $_POST['iSbn'];
    $stock = $_POST['jumlahBukuBaik'];
    // $j_buku_rusak = $_POST['jumlahBukuRusak'];

    // PROCESS EDIT DATA
    $query = "UPDATE books SET title = '$title', kategori_buku = '$kategori_buku', publisher = '$publisher', 
                pengarang_buku = '$pengarang_buku', year_published = '$year_published', isbn = '$isbn', stock = '$stock'";

    $query .= "WHERE id = $id";

    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $_SESSION['berhasil'] = "Data buku berhasil diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data buku gagal diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM books WHERE id = '$id'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data buku berhasil di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data buku gagal di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
