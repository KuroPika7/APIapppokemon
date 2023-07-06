<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $type = $_POST["type"];
    $ability = $_POST["ability"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    
    $perintah = "INSERT INTO tbl_pokemon (name, type, ability, height, weight) VALUES('$name', '$type', '$ability', '$height', '$weight')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);