<?php include_once("../bl/islemBL.php"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>İşlemler</title>
    <link rel="stylesheet" href="../ui/style.css">
</head>
<body>
<div class="container">
    <h2>🔄 İşlem İşlemleri</h2>

    <!-- Ödünç Ver -->
    <form method="post">
        <input type="number" name="uye_id" placeholder="Üye ID" required>
        <input type="number" name="kitap_id" placeholder="Kitap ID" required>
        <input type="date" name="odunc_tarih" required>
        <input type="date" name="iade_tarih" required>
        <button type="submit" name="odunc">Ödünç Ver</button>
    </form>

    <!-- İade Et -->
    <form method="post">
        <input type="number" name="iade_id" placeholder="İşlem ID" required>
        <input type="date" name="teslim_tarihi" required>
        <button type="submit" name="iade">İade Et</button>
    </form>

    <!-- İşlem Sil -->
    <form method="post">
        <input type="number" name="sil_id" placeholder="İşlem ID" required>
        <button type="submit" name="sil">Sil</button>
    </form>

    <?php
    if(isset($_POST['odunc'])){
        islemEkleBL($_POST['uye_id'], $_POST['kitap_id'], $_POST['odunc_tarih'], $_POST['iade_tarih']);
    }
    if(isset($_POST['iade'])){
        islemIadeBL($_POST['iade_id'], $_POST['teslim_tarihi']);
    }
    if(isset($_POST['sil'])){
        islemSilBL($_POST['sil_id']);
    }

    $islemler = islemlerListeBL();
    if(!empty($islemler)){
        echo "<table>
                <tr>
                  <th>ID</th><th>Üye</th><th>Kitap</th>
                  <th>Ödünç Tarihi</th><th>İade Tarihi</th><th>Teslim Tarihi</th>
                  <th>Gecikme Gün</th><th>Ceza</th><th>Durum</th>
                </tr>";
        foreach($islemler as $row){
            echo "<tr>
                    <td>".$row['IslemID']."</td>
                    <td>".$row['UyeBilgisi']."</td>
                    <td>".$row['KitapAd']."</td>
                    <td>".$row['OduncTarihi']."</td>
                    <td>".$row['IadeTarihi']."</td>
                    <td>".$row['TeslimTarihi']."</td>
                    <td>".$row['GecikmeGun']."</td>
                    <td>".$row['CezaTutari']."</td>
                    <td>".$row['Durum']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Henüz işlem kaydı yok.</p>";
    }
    ?>
    <p><a href="../index.php">Ana menüye dön</a></p>
</div>
</body>
</html>
