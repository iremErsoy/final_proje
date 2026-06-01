<?php
// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root","BURAYA_SIFRENIZI_YAZIN", kutuphane);

// Bağlantı kontrolü
if(!$conn){
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}
?>
