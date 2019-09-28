<?php
    include("koneksi.php");
    
    $id = $_GET['id'];
    $fetch = mysqli_query($conn, "DELETE FROM tb_siswa WHERE id = $id");
    header("Location: home.php");
?>