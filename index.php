<?php 
    // koneksi ke localhost
    include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat datang</title>
</head>
<body>
    <a href="tambah.php">Tambah data</a> <br>
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form> <br>
    
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama Siswa</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php  
            // koneksi ke localhost
            include("koneksi.php");

            // untuk nilai yg akan di loop
            $no = 1;

            // ambil data dari database

            if( isset($_POST["cari"])) {
                $keyword = "$_POST[keyword]";
                
                $query = "SELECT * FROM tb_kelas WHERE nis LIKE '%$keyword%' OR 
                                                        nama LIKE '%$keyword%' OR
                                                        jurusan LIKE '%$keyword%' OR
                                                        alamat LIKE '%$keyword%' ";
                $ambil_data = mysqli_query($conn, $query);
            } else {
                
                $query = "SELECT * FROM tb_kelas";
                $ambil_data = mysqli_query($conn, $query);
            }

            // menampilkan data menggunakan while
            while( $fetch = mysqli_fetch_assoc($ambil_data)) :
        ?>
                <tr>
                    <td> <?= $no++; ?> </td>
                    <td> <?= $fetch['nis'] ?> </td>
                    <td> <?= $fetch['nama'] ?> </td>
                    <td> <?= $fetch['alamat'] ?> </td>
                    <td> <?= $fetch['jurusan'] ?> </td>
                    <td>
                        <a href="hapus.php?id=<?= $fetch['id'] ;?>" onclick="return confirm('Yakin akan menghapus?');">Hapus</a>
                        <a href="update.php?id=<?=$fetch['id'] ;?>">Update</a>
                    </td>
                </tr>
                
        <?php endwhile; ?> 
    
    </table>
</body>
</html>