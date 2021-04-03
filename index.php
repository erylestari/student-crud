<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Tambah Data Siswa</title>
    <style type="text/css">
        * {
            font-family: "Nunito Sans", sans-serif;
        }

        h2 {
            text-transform: uppercase;
            color: #f46339;
            padding: 20px;
            margin-bottom: 30px;
        }

        a {
            margin-left: 60px;
        }

        button {
            background-color: #f46339;
            color: white;
            padding: 10px 50px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #cccccc;
            outline-color: #f46339;
        }

        .jk {
            width: 0px;
            margin-top: 10px;
        }

        div {
            width: 100%;
            height: auto;
        }

        .box {
            width: 1200px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            background: #ededed;
        }
    </style>
</head>

<body>
    <center><h2>Tambah Data Siswa</h2></center>
    <a href="tampildata.php">Data Siswa Kelas XII</a>
    <form action="" method="post" enctype="multipart/form-data">
        <section class="box">
            <div>
                <label>Nama</label>
                <input type="text" name="nama" autofocus="" required="" />
            </div>
            <div>
                <label>NIS</label>
                <input type="text" name="nis" />
            </div>
            <div>
                <label>Jenis Kelamin</label>
                <input class="jk" type="radio" name="jenis_kelamin" value="Laki-Laki">Laki-Laki
                <input class="jk" type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
                
            </div>
            <div>
                <label>Jurusan</label>
                <input type="text" name="jurusan" required="" />
            </div>
            <div>
                <label>Foto Siswa</label>
                <input type="file" name="foto" required="" />
            </div>
            <div>
                <button type="submit" name="kirim">Kirim</button>
            </div>
        </section>
    </form>

    <?php
    if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $nis = $_POST['nis'];
        $jeniskelamin = $_POST['jenis_kelamin'];
        $jurusan = $_POST['jurusan'];
        $nama_foto = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = './fotosiswa/';

        move_uploaded_file($source, $folder . $nama_foto);
        $insert = mysqli_query($conn, "INSERT INTO tb_siswa VALUES (
				NULL,
				'$nama',
                '$nis',
                '$jeniskelamin',
                '$jurusan',
				'$nama_foto')");
        if ($insert) {
            echo 'Tambah data sukses';
        } else {
            echo 'Tambah data gagal';
        }
    }
    ?>
</body>

</html>