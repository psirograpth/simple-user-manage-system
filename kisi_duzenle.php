<?php
$mevcutSayfa = "Kişi Düzenle";
require_once("ayar/ust_kisim.php");

$personelID = $_GET["id"];
$islemNo = $_GET["islem"];

if ($islemNo == 1) {
    $personelSorgu = $veritabani->prepare("SELECT * FROM personel WHERE personel_id = ?");

    $personelSorgu->execute(array($personelID));

    $personelVeri = $personelSorgu->fetch(PDO::FETCH_ASSOC);


    if(isset($_POST) & !empty($_POST)){
        $personel_grup		= addslashes($_POST["personel_grup"]);
        $personel_tc		= addslashes($_POST["personel_tc"]);
        $personel_isim		= addslashes($_POST["personel_isim"]);
        $personel_meslek	= addslashes($_POST["personel_meslek"]);
        $personel_mail		= addslashes($_POST["personel_mail"]);
        $personel_gsm		= addslashes($_POST["personel_gsm"]);
        $personel_cinsiyet	= addslashes($_POST["personel_cinsiyet"]);
        $personel_dogumt	= addslashes($_POST["personel_dogumt"]);
        $personel_adres		= addslashes($_POST["personel_adres"]);
        $personel_kisabilgi	= addslashes($_POST["personel_kisabilgi"]);
    
        $personelGuncelle = $veritabani->prepare("UPDATE personel SET personel_grup = ?, personel_tc = ?, personel_isim = ?, personel_meslek = ?, personel_mail = ?, personel_gsm = ?, personel_cinsiyet = ?, personel_dogumt = ?, personel_adres = ?, personel_kisabilgi = ? WHERE personel_id = ?");
    
        $personelGuncelle->execute(array($personel_grup, $personel_tc, $personel_isim, $personel_meslek, $personel_mail, $personel_gsm, $personel_cinsiyet, $personel_dogumt, $personel_adres, $personel_kisabilgi, $personelID));
    
        if ($personelGuncelle) {
            echo 'Veri güncellendi.';
            header("Refresh: 3; url=kisi_listele.php"); 
        }
    }
?>
    <div class="container">
        <main>
            <div class="row justify-content-md-center">
                <div class="col"></div>
                <div class="col">
                    <p class="text-center h4"><b><?php echo $personelVeri["personel_isim"] ?></b> adlı personeli düzenleyin.</p><br><br>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="grup" class="form-label">Birim</label>
                            <select class="form-select" name="personel_grup" required>
                                <option <?php if($personelVeri['personel_grup'] == "Web Birimi"){ echo 'selected'; } ?> value="Web Birimi">Web Birimi</option>
                                <option <?php if($personelVeri['personel_grup'] == "Sistem Birimi"){ echo 'selected'; } ?>  value="Sistem Birimi">Sistem Birimi</option>
                                <option <?php if($personelVeri['personel_grup'] == "Network Birimi"){ echo 'selected'; } ?>  value="Network Birimi">Network Birimi</option>
                                <option <?php if($personelVeri['personel_grup'] == "İdari Birim"){ echo 'selected'; } ?>  value="İdari Birim">İdari Birim</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="personel_tc" class="form-label">T.C No</label>
                            <input type="input" class="form-control" id="personel_tc" name="personel_tc" value="<?php echo $personelVeri['personel_tc']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_isim" class="form-label">İsim</label>
                            <input type="input" class="form-control" id="personel_isim" name="personel_isim" value="<?php echo $personelVeri['personel_isim']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_meslek" class="form-label">Meslek</label>
                            <input type="input" class="form-control" id="personel_meslek" name="personel_meslek" value="<?php echo $personelVeri['personel_meslek']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_mail" class="form-label">Mail</label>
                            <input type="input" class="form-control" id="personel_mail" name="personel_mail" value="<?php echo $personelVeri['personel_mail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_gsm" class="form-label">GSM</label>
                            <input type="input" class="form-control" id="personel_gsm" name="personel_gsm" value="<?php echo $personelVeri['personel_gsm']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_cinsiyet" class="form-label">Cinsiyet</label>
                            <select class="form-select" name="personel_cinsiyet" required>
                                <option <?php if($personelVeri['personel_cinsiyet'] == "Erkek"){ echo 'selected'; } ?> value="Erkek">Erkek</option>
                                <option <?php if($personelVeri['personel_cinsiyet'] == "Kadın"){ echo 'selected'; } ?>  value="Kadın">Kadın</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="personel_dogumt" class="form-label">Doğum Tarihi</label>
                            <input type="input" class="form-control" id="personel_dogumt" name="personel_dogumt" value="<?php echo $personelVeri['personel_dogumt']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_adres" class="form-label">Adres</label>
                            <input type="input" class="form-control" id="personel_adres" name="personel_adres" value="<?php echo $personelVeri['personel_adres']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="personel_kisabilgi" class="form-label">Kısa Bilgi</label>
                            <input type="input" class="form-control" id="personel_kisabilgi" name="personel_kisabilgi" value="<?php echo $personelVeri['personel_kisabilgi']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </main>
    </div>
<?php
}
if ($islemNo == 2) {
    $silSorgu = $veritabani->prepare("DELETE FROM personel WHERE personel_id = :id");

    $silIslem = $silSorgu->execute(array(
       'id' => $personelID
    ));

    header("Refresh: 0; url=kisi_listele.php");
}
require_once("ayar/alt_kisim.php");
?>