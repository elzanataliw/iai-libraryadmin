<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $title = $_POST['judulBuku'];
    $description_buku = $_POST['deskripsiBuku'];
    $kategori_buku = $_POST['kategoriBuku'];
    $publisher = $_POST['penerbitBuku'];
    $pengarang_buku = $_POST['pengarangBuku'];
    $year_published = $_POST['tahunTerbit'];
    $isbn = $_POST['iSbn'];
    $stock = $_POST['jumlahBukuBaik'];
    $cover = $_POST['coverBuku'];
    $files = $_POST['fileBuku'];

    // $j_buku_rusak = $_POST['jumlahBukuRusak'];

    // PROCESS INSERT DATA TO DATABASE

    $publish = mysqli_query($koneksi, "SELECT * FROM publisher WHERE nama_penerbit='$publisher'"); 
    $publish_row =  mysqli_fetch_assoc($publish);

    $author = mysqli_query($koneksi, "SELECT * FROM authors WHERE name ='$pengarang_buku'"); 
    $author_row =  mysqli_fetch_assoc($author);

    $category = mysqli_query($koneksi, "SELECT * FROM categories WHERE name ='$kategori_buku'"); 
    $category_row =  mysqli_fetch_assoc($category);

    $sql = "INSERT INTO books(title,description,category_id,publisher_id,author_id,year_published,isbn,stock,cover,file)
        VALUES('" . $title . "', '" . $description_buku . "', '" . $category_row['id'] . "','" . $publish_row['id_penerbit'] . "','" . $author_row['id'] . "','" . $year_published . "','" . $isbn . "', '" . $stock . "', '" . $cover . "', '" . $files . "')";
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
    $description_buku = $_POST['deskripsiBuku'];
    $kategori_buku = $_POST['kategoriBuku'];
    $publisher = $_POST['penerbitBuku'];
    $pengarang_buku = $_POST['pengarangBuku'];
    $year_published = $_POST['tahunTerbit'];
    $isbn = $_POST['iSbn'];
    $stock = $_POST['jumlahBukuBaik'];
    $cover = $_POST['coverBuku'];
    $files = $_POST['fileBuku'];
    // $j_buku_rusak = $_POST['jumlahBukuRusak'];

    // PROCESS EDIT DATA
    $publish = mysqli_query($koneksi, "SELECT * FROM publisher WHERE nama_penerbit='$publisher'"); 
    $publish_row =  mysqli_fetch_assoc($publish);

    $author = mysqli_query($koneksi, "SELECT * FROM authors WHERE name ='$pengarang_buku'"); 
    $author_row =  mysqli_fetch_assoc($author);

    $category = mysqli_query($koneksi, "SELECT * FROM categories WHERE name ='$kategori_buku'"); 
    $category_row =  mysqli_fetch_assoc($category);

    $query = "UPDATE books SET title = '$title', description = '$description_buku', category_id = '$category_row[id]', publisher_id = '$publish_row[id_penerbit]', 
                author_id = '$author_row[id]', year_published = '$year_published', isbn = '$isbn', stock = '$stock', cover = '$cover', file = '$files'";

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
