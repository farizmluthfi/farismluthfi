<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Penduduk</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_penduduk'])) {
        $id_penduduk=input($_GET["id_penduduk"]);

        $sql="select * from data_penduduk where id_penduduk=$id_penduduk";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_penduduk=htmlspecialchars($_POST["id_penduduk"]);
        $no_kk=input($_POST["no_kk"]);
        $nik=input($_POST["nik"]);
        $nama_lengkap=input($_POST["nama_lengkap"]);
        $tanggal_lahir=input($_POST["tanggal_lahir"]);
        $umur=input($_POST["umur"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $id_stat_hbkel=input($_POST["id_stat_hbkel"]);
        $no_rt=input($_POST["no_rt"]);
        $tanggal_create=input($_POST["tanggal_create"]);
        $tanggal_update=input($_POST["tanggal_update"]);

        //Query update data pada tabel anggota
        $sql="update data_penduduk set
			no_kk='$no_kk',
			nik='$nik',
			nama_lengkap='$nama_lengkap',
			tanggal_lahir='$tanggal_lahir',
			umur='$umur'
            jenis_kelamin='$jenis_kelamin',
            id_stat_hbkel='$id_stat_hbkel',
            no_rt='$no_rt',
            tanggal_create='$tanggal_create',
            tanggal_update='$tanggal_update'
			where id_penduduk=$id_penduduk";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2><center><i>Update Data Kependudukan</i></center></h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nomor Kartu Keluarga:</label>
            <input type="text" name="no_kk" class="form-control" value="<?php echo $data['no_kk']; ?>" placeholder="Masukkan Nomor KK Anda" required />

        </div>
        <div class="form-group">
            <label>Nomor Induk Kependudukan/ KTP:</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" placeholder="Masukkan Nomor KTP anda" required/>

        </div>
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" placeholder="Masukkan Nama lengkap anda" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" placeholder="Silahkan pilih tanggal lahir yang benar" required/>
        </div>
        <div class="form-group">
            <label>Umur:</label> <?php echo $data['umur'];?>
            <select name="umur" class="form-control" required>
                <option value="">- Pilih umur yang tepat -</option>
                <?php
                for ($i = 80; $i >= 1; $i--) { 
                    echo '<option value="'.$i.'">'.$i.'</option>';
                    } ?>
                    <?php echo $data['umur']; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label> <?php echo $data['jenis_kelamin'];?>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">- Pilih yang sesuai -</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Hubungan dalam keluarga:</label> <?php echo $data['id_stat_hbkel'];?>
            <select name="id_stat_hbkel" class="form-control" required>
                <option value="">- Pilih status dalam kekeluargaan-</option>
                <option value="Kepala Keluarga">Kepala Keluarga (Imam)</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Menantu">Menantu</option>
                <option value="Cucu">Cucu</option>
                <option value="Orang Tua">Orang Tua</option>
                <option value="Mertua">Mertua</option>
                <option value="Famili Lain">Famili Lain</option>
                <option value="Pembantu">Pembantu</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <label>No RT:</label>
            <input type="text" name="no_rt" class="form-control" value="<?php echo $data['no_rt']; ?>" placeholder="Masukkan Nomor RT" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Dibuat:</label>
            <input type="date" name="tanggal_create" class="form-control" value="<?php echo $data['tanggal_create']; ?>" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Di Update:</label>
            <input type="date" name="tanggal_update" class="form-control" value="<?php echo $data['tanggal_update']; ?>" required/>
        </div>

        <input type="hidden" name="id_penduduk" value="<?php echo $data['id_penduduk']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Update data!</button>
    </form>
</div>
</body>
<footer>
    <center>
            <div class="row">
                <div class="col-md-12">
                    <b><i><u>&copy; 2020 Sistem Data Penduduk oleh FarisMLuthfi</u></i></b>
                </div>
            </div>
    </center>
    </footer>
</html>