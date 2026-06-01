<?php
include_once(__DIR__ . "/../dal/uyeDAL.php");

// uyeBL.php
function uyeEkleBL($ad, $soyad, $tel, $mail, $adres, $sifre) {
    // Tüm parametreleri DAL'a eksiksiz gönderin
    return uyeEkleDAL($ad, $soyad, $tel, $mail, $adres, $sifre);
}

function uyeGuncelleBL($id, $ad, $soyad, $tel, $mail, $adres){
    return uyeGuncelleDAL($id, $ad, $soyad, $tel, $mail, $adres);
}

function uyeSilBL($id){
    return uyeSilDAL($id);
}

function uyelerListeBL(){
    return uyelerListeDAL();
}
?>
