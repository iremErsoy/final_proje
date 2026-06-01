<?php
include_once(__DIR__ . "/../dal/islemDAL.php");

function islemEkleBL($uye_id, $kitap_id, $odunc_tarih, $iade_tarih){
    return islemEkleDAL($uye_id, $kitap_id, $odunc_tarih, $iade_tarih);
}

function islemIadeBL($islem_id, $teslim_tarih){
    return islemIadeDAL($islem_id, $teslim_tarih);
}

function islemSilBL($islem_id){
    return islemSilDAL($islem_id);
}

function islemlerListeBL(){
    return islemlerListeDAL();
}
?>
