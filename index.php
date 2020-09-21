<!DOCTYPE html>
<html>
<head>
<title>Data Penduduk @Faris</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h3><center><b>CRUD Data Kependudukan Sederhana</b></center></h3>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_penduduk'])) {
        $id_penduduk=htmlspecialchars($_GET["id_penduduk"]);

        $sql="delete from data_penduduk where id_penduduk='$id_penduduk' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

    <center><a href="create.php">Tambah Data Penduduk</a></center>
    <center>
            <div class="row">
                <div class="col-md-12">
                    <b><i><marquee>&copy; 2020 Sistem Data Penduduk oleh FarisMLuthfi</marquee></i></b>
                </div>
            </div>
    </center>
    <center><a href="cetak.php"> Ekspor Laporan dalam format .pdf!</a></center>
    
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Urutan</th>
            <th>No. KK</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Hubungan dalam keluarga</th>
            <th>No. RT</th>
            <th>Tgl Dibuat</th>
            <th>Tgl Diupdate</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from data_penduduk order by id_penduduk desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><span style="color:brown;text-decoration:underline;"><?php echo $data["no_kk"]; ?></span></td>
                <td><span style="color:green;font-style:italic;font-weight:bold;text-decoration:underline;"><?php echo $data["nik"];   ?></span></td>
                <td><span style="font-weight:bolder;"><?php echo $data["nama_lengkap"];   ?></span></td>
                <td><?php echo $data["tanggal_lahir"];   ?></td>
                <td><?php echo $data["umur"];  ?><label>Tahun</label></td>
                <td><?php echo $data["jenis_kelamin"]; ?></td>
                <td><span style="color:blue;font-style:italic;font-weight:bold;"><?php echo $data["id_stat_hbkel"];   ?></span></td>
                <td><?php echo $data["no_rt"];   ?></td>
                <td><?php echo $data["tanggal_create"];   ?></td>
                <td><?php echo $data["tanggal_update"];   ?></td>
                <td>
                    <a href="update.php?id_penduduk=<?php echo htmlspecialchars($data['id_penduduk']); ?>">Update</a>
                    <a onclick="return confirm('Sudah yakin akan menghapus data penduduk?');" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_penduduk=<?php echo $data['id_penduduk']; ?>" >Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <center><a href="create.php">Tambah Data Penduduk (bagian bawah)</a></center>

</div>
<footer>
    <center>
            <div class="row">
                <div class="col-md-12">
                    <b><i><u>&copy; 2020 Sistem Data Penduduk oleh FarisMLuthfi</u></i></b>
                </div>
            </div>
    </center>
    </footer>
</body>
</html>
