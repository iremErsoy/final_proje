<?php
include_once("bl/kitapBL.php");
include_once("bl/yazarBL.php");
include_once("bl/uyeBL.php");
include_once("bl/islemBL.php");

$kitaplar  = kitaplarListeBL();
$yazarlar  = yazarlarListeBL();
$uyeler    = uyelerListeBL();
$islemler  = islemlerListeBL();

$kitapSayisi = count($kitaplar);
$yazarSayisi = count($yazarlar);
$uyeSayisi   = count($uyeler);

$oduncte = 0;
foreach($islemler as $row){
    if(isset($row['Durum']) && $row['Durum'] === 'Oduncte'){
        $oduncte++;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kütüphane Otomasyonu</title>
    <link rel="stylesheet" href="ui/style.css">
</head>
<body>
<div class="container">
    <h1>📚 Kütüphane Otomasyonu</h1>
    <p>Hoş geldiniz</p>

    <div class="dashboard">
        <div class="card">Toplam Kitap: <?php echo $kitapSayisi; ?></div>
        <div class="card">Toplam Yazar: <?php echo $yazarSayisi; ?></div>
        <div class="card">Toplam Üye: <?php echo $uyeSayisi; ?></div>
        <div class="card">Ödünçte Kitap: <?php echo $oduncte; ?></div>
    </div>

    <h2>Menü</h2>
    <div class="menu-cards">
        <div class="card"><a href="ui/yazarlar.php">📖 Yazarlar</a></div>
        <div class="card"><a href="ui/uyeler.php">👤 Üyeler</a></div>
        <div class="card"><a href="ui/kitaplar.php">📚 Kitaplar</a></div>
        <div class="card"><a href="ui/islemler.php">🔄 İşlemler</a></div>
    </div>
</div>
</body>
</html>
