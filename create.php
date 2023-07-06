<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $asal = $_POST["asal"];
    $deskripsi_singkat = $_POST["deskripsi_singkat"];
    
    $perintah = "INSERT INTO tbl_kuliner(nama, asal, deskripsi_singkat) VALUES('$nama', '$asal', '$deskripsi_singkat')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);