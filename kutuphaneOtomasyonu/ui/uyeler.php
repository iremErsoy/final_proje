<?php include_once("../bl/uyeBL.php"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üyeler</title>
    <link rel="stylesheet" href="../ui/style.css">
</head>
<body>
<div class="container">
    <h2>👤 Üye İşlemleri</h2>

    <!-- Üye Ekle -->
    <form method="post">
        <input type="text" name="ad" placeholder="Ad" required>
        <input type="text" name="soyad" placeholder="Soyad" required>
        <input type="text" name="tel" placeholder="Telefon" required>
        <input type="email" name="mail" placeholder="Mail" required>
        <input type="text" name="adres" placeholder="Adres" required>
        <input type="password" name="pass" placeholder="Şifre" required>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- Üye Güncelle -->
    <form method="post">
        <input type="number" name="id" placeholder="Üye ID" required>
        <input type="text" name="ad" placeholder="Ad" required>
        <input type="text" name="soyad" placeholder="Soyad" required>
        <input type="text" name="tel" placeholder="Telefon" required>
        <input type="email" name="mail" placeholder="Mail" required>
        <input type="text" name="adres" placeholder="Adres" required>
        <input type="password" name="pass" placeholder="Şifre" required>
        <button type="submit" name="guncelle">Güncelle</button>
    </form>

    <!-- Üye Sil -->
    <form method="post">
        <input type="number" name="id" placeholder="Üye ID" required>
        <button type="submit" name="sil">Sil</button>
    </form>

    <?php
    // Ekle
    if(isset($_POST['ekle'])){
        uyeEkleBL($_POST['ad'], $_POST['soyad'], $_POST['tel'], $_POST['mail'], $_POST['adres'], $_POST['pass']);
    }

    // Güncelle
    if(isset($_POST['guncelle'])){
        uyeGuncelleBL($_POST['id'], $_POST['ad'], $_POST['soyad'], $_POST['tel'], $_POST['mail'], $_POST['adres'], $_POST['pass']);
    }

    // Sil
    if(isset($_POST['sil'])){
        uyeSilBL($_POST['id']);
    }

    // Listeleme
    $uyeler = uyelerListeBL();
    echo "<table>
            <tr>
              <th>ID</th><th>Ad</th><th>Soyad</th>
              <th>Telefon</th><th>Mail</th><th>Adres</th>
            </tr>";

    foreach($uyeler as $row){
        echo "<tr>
                <td>".$row['ID']."</td>
                <td>".$row['Ad']."</td>
                <td>".$row['Soyad']."</td>
                <td>".$row['Telefon']."</td>
                <td>".$row['Mail']."</td>
                <td>".$row['Adres']."</td>
              </tr>";
    }
    echo "</table>";
    ?>
    <p><a href="../index.php">Ana menüye dön</a></p>
</div>
</body>
</html>
