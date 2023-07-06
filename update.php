<?php
require("koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $ability = $_POST["ability"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    
    $perintah = "UPDATE tbl_pokemon SET name='$name', type='$type', ability='$ability', height='$height', weight='$weight' WHERE id='$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);