<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id = '" . $_GET['id'] . "'");
$r = mysqli_fetch_array($data);

$nama = $r['nama'];
$nis = $r['nis'];
$jeniskelamin = $r['jenis_kelamin'];
$jurusan = $r['jurusan'];
$foto = $r['foto'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Data Siswa</title>
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
            margin-left: 50px;
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
    <center>
        <h2>Edit Data Siswa</h2>
    </center>
    <a href="tampildata.php">Data Siswa Kelas XII</a>
    <form action="" method="post" enctype="multipart/form-data">
    <section class="box">
            <input name="id" value="<?php echo $id ?>" hidden />
            <div>
                <label>Nama Siswa</label>
                <input type="text" name="nama" value="<?php echo $nama ?>" autofocus="" required="" />
            </div>
            <div>
                <label>NIS</label>
                <input type="text" name="nis" value="<?php echo $nis ?>" />
            </div>
            <div>
                <label>Jenis Kelamin</label>
                <input class="jk" type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if($jeniskelamin=='Laki-Laki'){echo "checked";}?>> Laki-Laki
                <input class="jk" type="radio" name="jenis_kelamin" value="Perempuan" <?php if($jeniskelamin=='Perempuan'){echo "checked";}?>> Perempuan
            </div>
            <div>
                <label>Jurusan</label>
                <input type="text" name="jurusan" required="" value="<?php echo $jurusan ?>" />
            </div>
            <div>
                <label>Foto Siswa</label>
                <img src="fotosiswa/<?php echo $foto ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                <input type="file" name="foto" />
            </div>
            <div>
                <button type="submit" name="kirim">Update data</button>
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

        if ($nama_foto != '') {
            move_uploaded_file($source, $folder . $nama_foto);
            $update = mysqli_query($conn, "UPDATE tb_siswa SET
                nama = '" . $nama . "',
                nis = '" . $nis . "',
                jenis_kelamin = '" . $jeniskelamin . "',
                jurusan = '" . $jurusan . "',
                foto = '" . $nama_foto . "'
                WHERE id = '" . $_GET['id'] . "'
                ");
            if ($update) {
                echo 'Update data sukses';
            } else {
                echo 'Update data gagal';
            }
        } else {
            $update = mysqli_query($conn, "UPDATE tb_siswa SET
                nama = '" . $nama . "',
                nis = '" . $nis . "',
                jenis_kelamin = '" . $jeniskelamin . "',
                jurusan = '" . $jurusan . "'
                WHERE id = '" . $_GET['id'] . "'
                ");
            if ($update) {
                echo 'Update data sukses';
            } else {
                echo 'Update data gagal';
            }
        } 
    }
    ?>
</body>

</html>