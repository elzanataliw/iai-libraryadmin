<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Buku
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Buku</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Buku</h3>
                        <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                            <button type="button" onclick="tambahBuku()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Buku</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Deskripsi</th>
                                    <th>Pengarang</th>
                                    <th>Kategori Buku</th>
                                    <th>Penerbit</th>
                                    <th>ISBN</th>
                                    <th>Tahun Terbit</th>
                                    <!-- <th>Buku Baik</th> -->
                                    <th>Jumlah Buku</th>
                                    <th>Cover Buku</th>
                                    <th>File Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include "../../config/koneksi.php";
    
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM books");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            
                    
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['title']; ?></td>
                                        <td><?= $row['description']; ?></td>
                                        <?php 
                                        include "../../config/koneksi.php";
                                        $author = mysqli_query($koneksi, "SELECT * FROM authors WHERE id='$row[author_id]'"); 
                                        $author_row =  mysqli_fetch_assoc($author)?>
                                        <td><?= $author_row['name']; ?></td>
                                        <?php 
                                        include "../../config/koneksi.php";
                                        $category = mysqli_query($koneksi, "SELECT * FROM categories WHERE id='$row[category_id]'"); 
                                        $category_row =  mysqli_fetch_assoc($category)?>
                                        <td><?= $category_row['name']; ?></td>
                                        <?php 
                                        include "../../config/koneksi.php";
                                        $publish = mysqli_query($koneksi, "SELECT * FROM publisher WHERE id_penerbit='$row[publisher_id]'"); 
                                        $publish_row =  mysqli_fetch_assoc($publish)?>
                                        <td><?= $publish_row['nama_penerbit']; ?></td>
                                        <td><?= $row['isbn']; ?></td>
                                        <td><?= $row['year_published']; ?></td>
                                        <!-- <td><?= $row['stock']; ?></td> -->
                                        <!-- <td><?= $row['j_buku_rusak']; ?></td> -->
                                        <td><?php
                                            // $j_buku_rusak = $row['j_buku_rusak'];
                                            $stock = $row['stock'];
                                            echo $stock;
                                            ?></td>
                                        <td><?= $row['cover']; ?></td>
                                        <td><?= $row['file']; ?></td>
                                        <!-- <td>
                                            <a href="#" data-target="#modalEditBuku<?= $row['id']; ?>" data-toggle="modal" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="pages/function/Buku.php?act=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i></a>
                                        </td> -->
                                        <td>
                                            <div class="btn-group-vertical">
                                                <a href="#" data-target="#modalEditBuku<?= $row['id']; ?>" data-toggle="modal" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="pages/function/Buku.php?act=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEditBuku<?= $row['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 5px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Buku ( <?= $row['title']; ?> - <?= $author_row['name']; ?> )</h4>
                                                </div>
                                                <form action="pages/function/Buku.php?act=edit" enctype="multipart/form-data" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <div class="form-group">
                                                            <label>Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['title']; ?>" name="judulBuku">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Deskripsi <small style="color: red;">* Wajib diisi</small></label>
                                                            <!-- <input type="text" class="form-control" value="<?= $row['Description']; ?>" name="judulBuku"> -->
                                                            <textarea class="form-control" name="deskripsiBuku"><?= $row['description']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kategori Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="kategoriBuku">
                                                            <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM categories WHERE id = '$row[category_id]'");
                                                                $data = mysqli_fetch_array($sql)
                                                                ?>
                                                                    <option selected value="<?= $data['name']; ?>"><?= $data['name']; ?> (Dipilih Sebelumnya)</option>
                                                                <?php
                                                                ?>

                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM categories");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?= $data['name']; ?>"> <?= $data['name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Penerbit Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control select2" name="penerbitBuku">
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM publisher WHERE id_penerbit = '$row[publisher_id]'");
                                                                $data = mysqli_fetch_array($sql)
                                                                ?>
                                                                    <option selected value="<?= $data['nama_penerbit']; ?>"><?= $data['nama_penerbit']; ?> (Dipilih Sebelumnya)</option>
                                                                <?php
                                                                ?>
                                                                <!-- <option selected value="<?= $row['publisher']; ?>"><?= $row['publisher']; ?> ( Dipilih Sebelumnya )</option> -->
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM publisher");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?= $data['nama_penerbit']; ?>"><?= $data['nama_penerbit']; ?> ( <?= $data['verif_penerbit']; ?> )</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pengarang Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control select2" name="pengarangBuku">
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM authors WHERE id = '$row[author_id]'");
                                                                $data = mysqli_fetch_array($sql)
                                                                ?>
                                                                    <option selected value="<?= $data['name']; ?>"><?= $data['name']; ?> (Dipilih Sebelumnya)</option>
                                                                <?php
                                                                ?>
                                                                <!-- <option selected value="<?= $row['author_id']; ?>"><?= $row['author_id']; ?> ( Dipilih Sebelumnya )</option> -->
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM authors");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?= $data['name']; ?>"><?= $data['name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" min="2000" max="2100" class="form-control" value="<?= $row['year_published']; ?>" name="tahunTerbit" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>ISBN <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['isbn']; ?>" name="iSbn" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['stock']; ?>" name="jumlahBukuBaik" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cover <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['cover']; ?>" name="coverBuku">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>File <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['file']; ?>" name="fileBuku">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>Jumlah Buku Rusak <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['j_buku_rusak']; ?>" name="jumlahBukuRusak" required>
                                                        </div> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /. Modal Edit -->
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modalTambahBuku">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Buku</h4>
            </div>
            <form action="pages/function/Buku.php?act=tambah" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Judul Buku" name="judulBuku">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Buku <small style="color: red;">* Wajib diisi</small></label>
                        <textarea class="form-control" placeholder="Masukkan Deskripsi Buku" name="deskripsiBuku"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kategori Buku <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="kategoriBuku">
                            <option selected>-- Harap pilih kategori buku --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $sql = mysqli_query($koneksi, "SELECT * FROM categories");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['name']; ?>"> <?= $data['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penerbit Buku <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control select2" name="penerbitBuku">
                            <option selected disabled>-- Harap Pilih Penerbit Buku --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $sql = mysqli_query($koneksi, "SELECT * FROM publisher");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['nama_penerbit']; ?>"><?= $data['nama_penerbit']; ?> ( <?= $data['verif_penerbit']; ?> )</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pengarang Buku <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control select2" name="pengarangBuku">
                            <option selected disabled>-- Harap Pilih Pengarang Buku --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $sql = mysqli_query($koneksi, "SELECT * FROM authors");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['name']; ?>"><?= $data['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" min="2000" max="2100" class="form-control" placeholder="Masukan Tahun Terbit ( Contoh : 2003 )" name="tahunTerbit" required>
                    </div>
                    <div class="form-group">
                        <label>ISBN <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan ISBN" name="iSbn" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan Jumlah Buku" name="jumlahBukuBaik" required>
                    </div>
                    <div class="form-group">
                        <label>Cover Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Cover Buku" name="coverBuku">
                    </div>
                    <div class="form-group">
                        <label>File Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan File Buku" name="fileBuku">
                    </div>
                    <!-- <div class="form-group">
                        <label>Jumlah Buku Rusak <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan Jumlah Buku Rusak" name="jumlahBukuRusak" required>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function tambahBuku() {
        $('#modalTambahBuku').modal('show');
    }
</script>
<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
<!-- Pesan Berhasil Edit -->
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil]'
        })";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>
<!-- Notif Gagal -->
<script>
    <?php
    if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
        echo "swal({
                icon: 'error',
                title: 'Gagal',
                text: '$_SESSION[gagal]'
              })";
    }
    $_SESSION['gagal'] = '';
    ?>
</script>
<!-- Swal Hapus Data -->
<script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah anda yakin ingin menghapus data buku ini ?',
                buttons: true,
                dangerMode: true,
                buttons: ['Tidak, Batalkan !', 'Iya, Hapus']
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Data buku tersebut aman !'
                    })
                }
            });
    })
</script>