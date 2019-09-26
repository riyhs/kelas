<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    
    <?php
        // koneksi ke localhost 
        include('koneksi.php');

        // $id dari data GET di home.php untuk mendapatkan baris tertentu
        $id = $_GET['id'];

        // ambil data dimana id = id yg dikirim dari home.php
        $query = "SELECT * FROM tb_kelas WHERE id = $id";
        $ambil_data = mysqli_query($conn, $query);

        $fetch = mysqli_fetch_array($ambil_data);
        
        $nis = htmlspecialchars($fetch['nis']);
        $nama = htmlspecialchars($fetch['nama']);
        $alamat = htmlspecialchars($fetch['alamat']);
        $jurusan = htmlspecialchars($fetch['jurusan']);
        $password = htmlspecialchars($fetch['password']);
        $username = htmlspecialchars($fetch['username']);
    ?>

    <h1>Update data</h1>
    
    <form action="" method="post">
        <input type="number" name="nis_u" placeholder="Masukan nis" autocomplete="off" spellcheck="false" value="<?= $nis ;?>">
        <input type="text" name="nama_u" placeholder="Masukan nama" autocomplete="off" spellcheck="false" value="<?= $nama ;?>">
        <input type="text" name="alamat_u" placeholder="Masukan alamat" autocomplete="off" spellcheck="false" value="<?= $alamat ;?>">
        <input type="text" name="jurusan_u" placeholder="Masukan jurusan" autocomplete="off" spellcheck="false" value="<?= $jurusan ;?>">
        <input type="text" name="username_u" placeholder="Masukan username" autocomplete="off" spellcheck="false" value="<?= $username ;?>">
        <input type="password" name="password_u" id="password" placeholder="Masukan password" value="<?= $password ;?>">

        <input type="submit" name="update" value="update">

        <?php
            if(isset($_POST['update'])) {
                
                $nis_u = htmlspecialchars($_POST['nis_u']);
                $nama_u = htmlspecialchars($_POST['nama_u']);
                $alamat_u = htmlspecialchars($_POST['alamat_u']);
                $jurusan_u = htmlspecialchars($_POST['jurusan_u']);
                $password_u = htmlspecialchars($_POST['password_u']);
                $username_u = htmlspecialchars($_POST['username_u']);

                $update = "UPDATE tb_kelas
                        SET nis = '$nis_u', nama = '$nama_u', alamat = '$alamat_u', jurusan = '$jurusan_u', username = '$username_u', password = '$password_u'
                        WHERE id = $id";

                $exe = mysqli_query($conn, $update);

                if ($exe) { ?>
                    <script> 
                        Swal.fire({
                            title: 'Update Berhasil!', 
                            text: 'Silahkan kembali ke halaman awal', 
                            type: 'success'});
                    </script>
                <?php } else { ?>
                    <script> 
                        Swal.fire({
                            title : 'Update Gagal', 
                            text: 'Pastikan data yang anda masukan benar!', 
                            type: 'failed'});
                    </script>
                <?php } 
            }
        ?>
    </form> <br>

    <a href="home.php">Kembali</a>
</body>
</html>