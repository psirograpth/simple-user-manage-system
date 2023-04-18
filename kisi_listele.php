<?php
$mevcutSayfa = "Kişileri Listele";
require_once("ayar/ust_kisim.php");
?>
<main role="main" class="container">
    <div class="row justify-content-md-center">
        <div class="col"></div>
        <div class="col">
         <p class="text-center h3">Kişileri listeleyin.</p><br><br>
            <form action="" method="GET">
                <select class="form-select" name="birim">
                    <option selected disabled>Listelemek için bir birim seçiniz</option>
                    <option value="1">Web Birimi</option>
                    <option value="2">Sistem Birimi</option>
                    <option value="3">Network Birimi</option>
                    <option value="4">İdari Birim</option>
                </select>
                </br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Listele</button>
            </form></br>
        </div>
        <div class="col"></div>
        
        <?php if (!empty($_GET["birim"])) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Birimi</th>
                    <th scope="col">T.C No</th>
                    <th scope="col">İsmi</th>
                    <th scope="col">Meslek</th>
                    <th scope="col">Mail</th>
                    <th scope="col">GSM</th>
                    <th scope="col">Cinsiyet</th>
                    <th scope="col">Doğum Tarihi</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Kısa Bilgi</th>
                    <th scope="col">Eklenme Tarihi</th>
                    <th scope="col">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php
if ($_GET["birim"] == 1) {
    $birim = "Web Birimi";
}else if ($_GET["birim"] == 2) {
    $birim = "Sistem Birimi";
}else if ($_GET["birim"] == 3) {
    $birim = "Network Birimi";
}else if ($_GET["birim"] == 4) {
    $birim = "İdari Birim";
}

$personelSorgu = "SELECT personel_id, personel_grup, personel_tc, personel_isim, personel_meslek, personel_mail, personel_gsm, personel_cinsiyet, personel_dogumt, personel_adres, personel_kisabilgi, personel_eklenmet FROM personel WHERE personel_grup = '".$birim."' ORDER BY personel_id ASC LIMIT 100";

$personelListele = $veritabani->query($personelSorgu);

while(list($personel_id, $personel_grup, $personel_tc, $personel_isim, $personel_meslek, $personel_mail, $personel_gsm, $personel_cinsiyet, $personel_dogumt, $personel_adres, $personel_kisabilgi, $personel_eklenmet) = $personelListele->fetch(PDO::FETCH_NUM)) {
?>
                <tr>
                    <th scope="row"><?php echo $personel_id; ?></th>
                    <td><?php echo $personel_grup; ?></td>
                    <td><?php echo $personel_tc; ?></td>
                    <td><?php echo $personel_isim; ?></td>
                    <td><?php echo $personel_meslek; ?></td>
                    <td><?php echo $personel_mail; ?></td>
                    <td><?php echo $personel_gsm; ?></td>
                    <td><?php echo $personel_cinsiyet; ?></td>
                    <td><?php echo $personel_dogumt; ?></td>
                    <td><?php echo $personel_adres; ?></td>
                    <td><?php echo $personel_kisabilgi; ?></td>
                    <td><?php echo $personel_eklenmet; ?></td>
                    <td><a class="btn btn-primary" href="kisi_duzenle.php?islem=1&id=<?php echo $personel_id; ?>"
                            role="button">Güncelle</a> <a class="btn btn-danger"
                            href="kisi_duzenle.php?islem=2&id=<?php echo $personel_id; ?>" role="button">Sil</a></td>
                </tr>
                <?php
}
?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</main>

<?php
require_once("ayar/alt_kisim.php");
?>