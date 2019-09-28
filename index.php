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
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Masukan keyword pencarian" size="40">
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
                
                $query = "SELECT * FROM tb_siswa WHERE nis LIKE '%$keyword%' OR 
                                                       nama LIKE '%$keyword%' OR
                                                       jurusan LIKE '%$keyword%' OR
                                                       alamat LIKE '%$keyword%' ";
                $ambil_data = mysqli_query($conn, $query);
            } else {
                
                $query = "SELECT * FROM tb_siswa";
                $ambil_data = mysqli_query($conn, $query);
            }

            // menampilkan data menggunakan while mysqli_fetch_assoc
            while( $fetch = mysqli_fetch_assoc($ambil_data)) :
        ?>
                <tr>
                    <td> <?= $no++; ?> </td>
                    <td> <?= $fetch['nis'] ?> </td>
                    <td> <?= $fetch['nama'] ?> </td>
                    <td> <?= $fetch['alamat'] ?> </td>
                    <td> <?= $fetch['jurusan'] ?> </td>
                    <td>
                        <a href="hapus.php?id=<?= $fetch['id'] ;?>" onclick="return confirm('Yakin akan menghapus?');">Delete</a>
                        <a href="update.php?id=<?=$fetch['id'] ;?>">Update</a>
                    </td>
                </tr>
                
        <?php endwhile; ?> 
    
    </table> <br> <br>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama mapel</th>
            <th>Nama guru</th>
            <th>Aksi</th>
        </tr>

        <?php  
            $nomer = 1;
            $query = "SELECT * FROM tb_mapel INNER JOIN tb_guru ON tb_mapel.id_guru = tb_guru.id_guru";
            $join = mysqli_query($conn,$query);

            while($fetch = mysqli_fetch_array($join)) : ?>
                <tr>
                    <td> <?= $nomer++; ?></td>
                    <td> <?= $fetch['nama_mapel']; ?></td> 
                    <td> <?= $fetch['nama_guru']; ?></td>
                    <td>
                        <a href="">Delete</a>
                        <a href="">Update</a>
                    </td>
                </tr>
            <?php endwhile ; 
        ?>

    </table>
</body>
</html>