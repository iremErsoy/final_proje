<?php
include_once(__DIR__ . "/../dal/yazarDAL.php");

function yazarEkleBL($ad, $soyad){
    return yazarEkleDAL($ad, $soyad);
}

function yazarGuncelleBL($id, $ad, $soyad){
    return yazarGuncelleDAL($id, $ad, $soyad);
}

function yazarSilBL($id){
    return yazarSilDAL($id);
}

function yazarlarListeBL(){
    return yazarlarListeDAL();
}
?>
