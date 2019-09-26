<?php include("koneksi.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<h3>Daftar</h3>
    <form action="" method="post">
        <input type="number" name="nis" placeholder="Masukan nis" autocomplete="off" spellcheck="false">
        <input type="text" name="nama" placeholder="Masukan nama" autocomplete="off" spellcheck="false">
        <input type="text" name="alamat" placeholder="Masukan alamat" autocomplete="off" spellcheck="false">
        <input type="text" name="jurusan" placeholder="Masukan jurusan" autocomplete="off" spellcheck="false">
        <input type="text" name="username" placeholder="Masukan username" autocomplete="off" spellcheck="false">
        <input type="password" name="password" id="password" placeholder="Masukan password">
        
        <input type="submit" name="daftar" value="daftar">
        <br> <br>
        <a href="home.php">Kembali ke halaman awal</a>
        
        <?php

            // jika button dipencet
            if( isset($_POST['daftar'])) {
                // ambil variabel
                
                $nis = htmlspecialchars( $_POST['nis'] );
                $nama = htmlspecialchars( $_POST['nama'] );
                $alamat = htmlspecialchars( $_POST['alamat'] );
                $jurusan = htmlspecialchars( $_POST['jurusan'] );
                $username = htmlspecialchars( $_POST['username'] );
                $password = htmlspecialchars( $_POST['password'] );


                // cek baris dalam database berdasar dari input
                $query = "INSERT INTO tb_kelas VALUES (NULL, '$nis', '$nama', '$alamat', '$jurusan', '$username', '$password')";
                $tambah = mysqli_query($conn, $query);

                if($tambah){ ?>
                    <script> 
                        Swal.fire({
                            title : 'Tambah Berhasil!', 
                            text: 'Silahkan kembali ke halaman awal', 
                            type: 'success'});
                    </script>

                 <?php }else{ ?>
                    <script> 
                        Swal.fire({
                            title : 'Tambah Gagal', 
                            text: 'Pastikan data yang anda masukan sudah benar!', 
                            type: 'failed'});
                    </script>
                <?php }
            }
        ?>
    </form>

</body>
</html>