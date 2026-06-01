<?php include_once("../bl/yazarBL.php"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yazarlar</title>
    <link rel="stylesheet" href="../ui/style.css">
</head>
<body>
<div class="container">
    <h2>✍️ Yazar İşlemleri</h2>

    <!-- Yazar Ekle -->
    <form method="post">
        <input type="text" name="ad" placeholder="Ad" required>
        <input type="text" name="soyad" placeholder="Soyad" required>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- Yazar Sil -->
    <form method="post">
        <input type="number" name="sil_id" placeholder="Yazar ID" required>
        <button type="submit" name="sil">Sil</button>
    </form>

    <!-- Yazar Güncelle -->
    <form method="post">
        <input type="number" name="guncelle_id" placeholder="Yazar ID" required>
        <input type="text" name="guncelle_ad" placeholder="Yeni Ad" required>
        <input type="text" name="guncelle_soyad" placeholder="Yeni Soyad" required>
        <button type="submit" name="guncelle">Güncelle</button>
    </form>

    <?php
    if(isset($_POST['ekle'])){
        yazarEkleBL($_POST['ad'], $_POST['soyad']);
    }
    if(isset($_POST['sil'])){
        yazarSilBL($_POST['sil_id']);
    }
    if(isset($_POST['guncelle'])){
        yazarGuncelleBL($_POST['guncelle_id'], $_POST['guncelle_ad'], $_POST['guncelle_soyad']);
    }

    $yazarlar = yazarlarListeBL();
    if(!empty($yazarlar)){
        echo "<table>
                <tr><th>ID</th><th>Ad</th><th>Soyad</th></tr>";
        foreach($yazarlar as $y){
            echo "<tr>
                    <td>".$y['ID']."</td>
                    <td>".$y['Ad']."</td>
                    <td>".$y['Soyad']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Henüz kayıtlı yazar yok.</p>";
    }
    ?>
    <p><a href="../index.php">Ana menüye dön</a></p>
</div>
</body>
</html>
