<?php
require("koneksi.php");
$perintah = "SELECT * FROM tbl_kuliner";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek>0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["asal"] = $get->asal;
        $var["deskripsi_singkat"] = $get->deskripsi_singkat;
        //$var["deskripsi_lengkap"] = $get->deskripsi_lengkap;
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($connect);