<?php
include_once(__DIR__ . "/baglanti.php");

function islemEkleDAL($uye_id, $kitap_id, $odunc_tarih, $iade_tarih){
    global $conn;
    $sql = "CALL OduncVer(?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $uye_id, $kitap_id, $odunc_tarih, $iade_tarih);
    return $stmt->execute();
}

function islemIadeDAL($islem_id, $teslim_tarih){
    global $conn;
    $sql = "CALL IadeAl(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $islem_id, $teslim_tarih);
    return $stmt->execute();
}

function islemSilDAL($islem_id){
    global $conn;
    $sql = "CALL IslemSil(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $islem_id);
    return $stmt->execute();
}

function islemlerListeDAL(){
    global $conn;
    $rows = [];

    // ÖNEMLİ: Sorgudan önce bağlantıda takılı kalmış eski sonuçları temizle
    while ($conn->more_results()) {
        $conn->next_result();
        if ($res = $conn->store_result()) {
            $res->free();
        }
    }

    // Sorguyu çalıştır
    if($result = $conn->query("CALL IslemlerHepsi()")){
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        $result->free(); // Sonuç setini bellekten boşalt
    }
    
    // İşlem bittikten sonra tekrar temizlik (bir sonraki sorgu için hazırla)
    while ($conn->more_results()) {
        $conn->next_result();
    }

    return $rows;
}

?>
