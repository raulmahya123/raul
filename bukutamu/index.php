<!DOCTYPE html>
<html lang="en">
<head>
    <title>7wedding concept</title>
    <!-- CSS -->
    <link rel="stylesheet" href="docs/css/jquery-ui.min.css">
    <link rel="stylesheet" href="docs/css/bootstrap.min.css">

    <!-- JS -->
    <script type="text/javascript" src="docs/js/jquery.keyboard.extension-autocomplete.js"></script>
    <script type="text/javascript" src="docs/js/jquery.keyboard.extension-all.js"></script>

        <!-- PANGGIL LIB KEYBOARD -->
    <link rel="stylesheet" href="css/keyboard.css">
    <script type="text/javascript" src="js/jquery.keyboard.js"></script>
</head>
<body>

<?php
    $server ="sql112.epizy.com";
    $user = "epiz_30670777";
    $password ="cl1YA8tFla";
    $database ="epiz_30670777_dbbuku_tamu";

    $koneksi = mysqli_connect($server,$user,$password,$database) or die(mysqli_error($koneksi));

    //jika tomblo simpan diklik
    if(isset($_POST['bsimpan'])){

        //persiapan simpan data ke database 

        $simpan = mysqli_query($koneksi,"INSERT into ttamu (nama ,alamat,nomor_hp)
                                VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[nomor_hp]')");
                                if($simpan){
                                    //jika simpan berhasil maka tampilan pesan
                                    echo "<script>
                                    alert('Simpan Data Sukses,Teria Kasih sodara/i $_POST[NAMA] atas kunjungan..');
                                    document.location='index.php';
                                    </script>";
                                }
    }
?>
<div class="container">
    <div class="col-md-12">
        <form class="form" method="post">
            <center><img src="/img/logo.png" "width=150px;">
            <div class="panel panel-warning" >
                <div class="panel-heading">
                    <b>BUKU TAMU HADIR</b>
                </div>
                <div class="panel-body">
                <div class="form-grupp">
                        <label>nama</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukan Nama anda disini..!">
                    </div>
                    <div class="panel-body">
                <div class="form-grupp">
                        <label>alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"
                        placeholder="Masukan alamat anda disini..!">
                    </div>
                    <div class="panel-body">
                <div class="form-grupp">
                        <label>nomor_hp </label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control"
                        placeholder="Masukan Nomor anda disini..!">
                    </div>
                    <button type="submit" name="bsimpan" class="btn btn-success center-block">SIMPAN</button>
                </div>
            </div>
        </form>
        <div class="panel panel-danger" >
                <div class="panel-heading">
                    <b>DAFTAR PENGUNJUNG</b>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>no</th>
                            <th>nama</th>
                            <th>alamat</th>
                            <th>nomor Anda</th>
                            <th>tanggal</th>
                        </tr>
                        I<?php
                        $tampil =mysqli_query($koneksi,"SELECT * from ttamu order by id desc");
                        $no = 1;
                        while($data = mysqli_fetch_array($tampil)):
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['alamat']?></td>
                            <td><?=$data['nomor_hp']?></td>
                            <td><?=$data['tanggal']?></td>
                        </tr>
                        <?php endwhile;?>
                    </table>
                </div>
            </div>
</div>
</div>
</body>
</html>