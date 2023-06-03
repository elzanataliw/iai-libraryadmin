<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $name = $_POST['namaPengarang'];

    $sql = "INSERT INTO authors(name)
            VALUES('" . $name . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Pengarang berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Pengarang gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id = $_POST['idPengarang'];
    $name = $_POST['namaPengarang'];

    $query = "UPDATE authors SET name = '$name'";
    $query .= "WHERE id = '$id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Pengarang berhasil di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Pengarang gagal di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM authors WHERE id = '$id'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data Pengarang berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Pengarang gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
