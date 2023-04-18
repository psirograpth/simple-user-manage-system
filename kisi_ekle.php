<?php
$mevcutSayfa = "Kişi Ekle";
require_once("ayar/ust_kisim.php");

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

	$personelEkle = $veritabani->prepare("INSERT INTO personel (personel_grup, personel_tc, personel_isim, personel_meslek, personel_mail, personel_gsm, personel_cinsiyet, personel_dogumt, personel_adres, personel_kisabilgi, personel_eklenmet) VALUES (:personel_grup, :personel_tc, :personel_isim, :personel_meslek, :personel_mail, :personel_gsm, :personel_cinsiyet, :personel_dogumt, :personel_adres, :personel_kisabilgi, NOW())");

	$personelEkle->execute(array(
		':personel_grup'		=>	$personel_grup,
		':personel_tc'			=>	$personel_tc,
		':personel_isim'		=>	$personel_isim,
		':personel_meslek'		=>	$personel_meslek,
		':personel_mail'		=>	$personel_mail,
		':personel_gsm'			=>	$personel_gsm,
		':personel_cinsiyet'	=>	$personel_cinsiyet,
		':personel_dogumt'		=>	$personel_dogumt,
		':personel_adres'		=>	$personel_adres,
		':personel_kisabilgi'	=>	$personel_kisabilgi
	));

	if ($personelEkle) {
		echo 'Veri eklendi.';
	}
}
?>
<div class="container">
    <main>
        <div class="row justify-content-md-center">
            <div class="col"></div>
            <div class="col">
                <p class="text-center h3">Kişi ekleme formu.</p><br><br>
                <form method="POST" action="" class="was-validated">
                    <div class="form-group">
                        <label for="uname">Personel Grubu:</label>
                        <select name="personel_grup" class="form-select" required>
                            <option selected disabled value="">Grup</option>
                            <option value="Web Birimi">Web Birimi</option>
                            <option value="Sistem Birimi">Sistem Birimi</option>
                            <option value="Network Birimi">Network Birimi</option>
                            <option value="İdari Birim">İdari Birim</option>
                        </select>
						<div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen seçim yapın.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">TC:</label>
                        <input type="text" class="form-control" id="uname" placeholder="TC giriniz" name="personel_tc"
                            required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">İsim:</label>
                        <input type="text" class="form-control" id="uname" placeholder="İsminizi giriniz"
                            name="personel_isim" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>

                    <div class="form-group">
                        <label for="uname">Meslek:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Mesleğinizi giriniz"
                            name="personel_meslek" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>

                    <div class="form-group">
                        <label for="uname">Mail:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Mail adresinizi giriniz"
                            name="personel_mail" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Telefon numarası:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Telefon numaranızı giriniz"
                            name="personel_gsm" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
					<div class="form-group">
                        <label for="uname">Cinsiyet:</label>
                        <select name="personel_cinsiyet" class="form-select" required>
                            <option selected disabled value="">Cinsiyet Seçin</option>
                            <option value="Erkek">Erkek</option>
                            <option value="Kadın">Kadın</option>
                        </select>
						<div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen seçim yapın.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Doğum tarihini:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Doğum tarihinizi giriniz"
                            name="personel_dogumt" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Adres:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Adresinizi giriniz"
                            name="personel_adres" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Kişisel bilgi:</label>
                        <input type="text" class="form-control" id="uname"
                            placeholder="Kendiniz hakkında kısa bilgi giriniz" name="personel_kisabilgi" required>
                        <div class="valid-feedback">Kabul edildi.</div>
                        <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="" required>Yukarıdaki bilgileri
                            onaylıyorum.
                            <div class="valid-feedback">Kabul edildi.</div>
                            <div class="invalid-feedback">Devam etmek için kutuyu işaretleyin.</div>
                        </label>
                    </div>
                    <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </main>
</div>
<?php
require_once("ayar/alt_kisim.php");
?>