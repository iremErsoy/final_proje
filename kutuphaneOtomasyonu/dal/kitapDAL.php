<?php
include_once(__DIR__ . "/baglanti.php");

function kitapEkleDAL($yazar_id, $ad, $kategori, $sayfa, $isbn, $stok){
    global $conn;
    $sql = "CALL KitapEkle(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issisi", $yazar_id, $ad, $kategori, $sayfa, $isbn, $stok);
    return $stmt->execute();
}

function kitapGuncelleDAL($id, $yazar_id, $ad, $kategori, $sayfa, $isbn, $stok){
    global $conn;
    $sql = "CALL KitapGuncelle(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissisi", $id, $yazar_id, $ad, $kategori, $sayfa, $isbn, $stok);
    return $stmt->execute();
}

function kitapSilDAL($id){
    global $conn;
    $sql = "CALL KitapSil(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function kitaplarListeDAL(){
    global $conn;
    $sql = "CALL KitaplarHepsi()";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>
