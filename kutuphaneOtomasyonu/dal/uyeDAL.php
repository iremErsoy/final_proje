<?php
include_once(__DIR__ . "/baglanti.php");

function uyeEkleDAL($ad, $soyad, $tel, $mail, $adres, $sifre){
    global $conn;
    
    // 1. ADIM: Stored Procedure'e gönderilecek 6 parametre için 6 tane '?' ekleyin
    $sql = "CALL UyeEkle(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // 2. ADIM: 6 değişken için 6 tane 's' (eğer şifre sayısal değilse) tanımlayın
    // Not: Şifreler genellikle string olarak tutulur, bu yüzden 'ssssss' doğrudur.
    $stmt->bind_param("ssssss", $ad, $soyad, $tel, $mail, $adres, $sifre);
    
    return $stmt->execute();
}
function uyeGuncelleDAL($id, $ad, $soyad, $tel, $mail, $adres){
    global $conn;
    $sql = "CALL UyeGuncelle(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $id, $ad, $soyad, $tel, $mail, $adres);
    return $stmt->execute();
}

function uyeSilDAL($id){
    global $conn;
    $sql = "CALL UyeSil(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function uyelerListeDAL(){
    global $conn;
    $sql = "CALL UyelerHepsi()";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>
