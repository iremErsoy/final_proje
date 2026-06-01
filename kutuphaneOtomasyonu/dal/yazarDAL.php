<?php
include_once(__DIR__ . "/baglanti.php");

function yazarEkleDAL($ad, $soyad){
    global $conn;
    $sql = "CALL YazarEkle(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $ad, $soyad);
    return $stmt->execute();
}

function yazarGuncelleDAL($id, $ad, $soyad){
    global $conn;
    $sql = "CALL YazarGuncelle(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $id, $ad, $soyad);
    return $stmt->execute();
}

function yazarSilDAL($id){
    global $conn;
    $sql = "CALL YazarSil(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function yazarlarListeDAL(){
    global $conn;
    $rows = [];

    // Önceki işlemlerden kalan bir sonuç seti varsa temizleyelim
    while ($conn->more_results()) {
        $conn->next_result();
        $res = $conn->use_result();
        if ($res instanceof mysqli_result) $res->free();
    }

    // Şimdi sorguyu çalıştıralım
    if($result = $conn->query("CALL YazarlarHepsi()")){
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        $result->free();
    }
    
    // İşlem bittikten sonra tekrar temizlik
    while ($conn->more_results()) {
        $conn->next_result();
    }

    return $rows;
}


?>
