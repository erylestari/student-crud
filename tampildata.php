<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Siswa</title>
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

        table {
            border: solid 1px #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        table thead th {
            background-color: #4287c7;
            color: white;
            padding: 10px;
            text-align: left;
            text-decoration: none;
        }

        table tbody td {
            border: solid 1px #ddeeee;
            color: #333333;
            padding: 10px;
        }

        .aksi {
            background-color: #f46339;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <center>
        <h2>Data Siswa Kelas XII</h2>
    </center>
    <a href="index.php">Tambah Data Siswa</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Foto Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_siswa");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['nis'] ?></td>
                <td><?php echo $row['jenis_kelamin'] ?></td>
                <td><?php echo $row['jurusan'] ?></td>
                <td><img src="fotosiswa/<?php echo $row['foto'] ?>" width="100px" height="100px"></td>
                <td>
                    <a class="aksi" href="editdata.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a class="aksi" href="hapusdata.php?id=<?php echo $row['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>