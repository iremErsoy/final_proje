<?php include_once("../bl/kitapBL.php"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kitaplar</title>
    <link rel="stylesheet" href="../ui/style.css">
</head>
<body>
<div class="container">
    <h2>📚 Kitap İşlemleri</h2>

    <!-- Kitap Ekle -->
    <form method="post">
        <input type="number" name="yazar_id" placeholder="Yazar ID" required>
        <input type="text" name="ad" placeholder="Kitap Adı" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="number" name="sayfa" placeholder="Sayfa Sayısı" required>
        <input type="text" name="isbn" placeholder="ISBN" maxlength="13" required>
        <input type="number" name="stok" placeholder="Toplam Stok" required>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- Kitap Sil -->
    <form method="post">
        <input type="number" name="sil_id" placeholder="Kitap ID" required>
        <button type="submit" name="sil">Sil</button>
    </form>

    <!-- Kitap Güncelle -->
    <form method="post">
        <input type="number" name="guncelle_id" placeholder="Kitap ID" required>
        <input type="number" name="guncelle_yazar_id" placeholder="Yeni Yazar ID" required>
        <input type="text" name="guncelle_ad" placeholder="Yeni Ad" required>
        <input type="text" name="guncelle_kategori" placeholder="Yeni Kategori" required>
        <input type="number" name="guncelle_sayfa" placeholder="Yeni Sayfa Sayısı" required>
        <input type="text" name="guncelle_isbn" placeholder="Yeni ISBN" maxlength="13" required>
        <input type="number" name="guncelle_stok" placeholder="Yeni Toplam Stok" required>
        <button type="submit" name="guncelle">Güncelle</button>
    </form>

    <?php
    if(isset($_POST['ekle'])){
        kitapEkleBL($_POST['yazar_id'], $_POST['ad'], $_POST['kategori'], $_POST['sayfa'], $_POST['isbn'], $_POST['stok']);
    }
    if(isset($_POST['sil'])){
        kitapSilBL($_POST['sil_id']);
    }
    if(isset($_POST['guncelle'])){
        kitapGuncelleBL($_POST['guncelle_id'], $_POST['guncelle_yazar_id'], $_POST['guncelle_ad'], $_POST['guncelle_kategori'], $_POST['guncelle_sayfa'], $_POST['guncelle_isbn'], $_POST['guncelle_stok']);
    }

    $kitaplar = kitaplarListeBL();
    if(!empty($kitaplar)){
        echo "<table>
                <tr>
                  <th>ID</th><th>Yazar</th><th>Ad</th><th>Kategori</th>
                  <th>Sayfa</th><th>ISBN</th><th>Toplam Stok</th>
                  <th>Rafta</th><th>Ödünçte</th>
                </tr>";
        foreach($kitaplar as $row){
            echo "<tr>
                    <td>".$row['ID']."</td>
                    <td>".$row['YazarBilgisi']."</td>
                    <td>".$row['KitapAd']."</td>
                    <td>".$row['Kategori']."</td>
                    <td>".$row['SayfaSayisi']."</td>
                    <td>".$row['ISBN']."</td>
                    <td>".$row['ToplamStok']."</td>
                    <td>".$row['Rafta']."</td>
                    <td>".$row['Oduncte']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Henüz kayıtlı kitap yok.</p>";
    }
    ?>
    <p><a href="../index.php">Ana menüye dön</a></p>
</div>
</body>
</html>
