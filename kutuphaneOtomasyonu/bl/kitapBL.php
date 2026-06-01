<?php
include_once(__DIR__ . "/../dal/kitapDAL.php");

function kitapEkleBL($yazar_id, $ad, $kategori, $sayfa, $isbn, $stok){
    return kitapEkleDAL($yazar_id, $ad, $kategori, $sayfa, $isbn, $stok);
}

function kitapGuncelleBL($id, $yazar_id, $ad, $kategori, $sayfa, $isbn, $stok){
    return kitapGuncelleDAL($id, $yazar_id, $ad, $kategori, $sayfa, $isbn, $stok);
}

function kitapSilBL($id){
    return kitapSilDAL($id);
}

function kitaplarListeBL(){
    return kitaplarListeDAL();
}
?>
