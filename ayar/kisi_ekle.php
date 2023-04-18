<?php
$mevcutSayfa = "Kişi Ekle";
require_once("ayar/ust_kisim.php");
?>
    <div class="container">
<div class="col-md-6">

<div class="container">
  <h2>Kişi Ekleme Formu</h2>
  <form method="POST" action="" class="was-validated">
    <div class="form-group">
    <div class="container">
    <select name="personel_grup" class="form-select" aria-label="Default select example">
  <option selected>Grup</option>
  <option value="1">Web</option>
  <option value="2">Sistem</option>
  <option value="3">İdari</option>
   </select>
   </div>
    <div class="form-group">
      <label for="uname">TC:</label>
      <input type="text" class="form-control" id="uname" placeholder="TC giriniz" name="personel_tc" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
    
      <label for="uname">İsim:</label>
      <input type="text" class="form-control" id="uname" placeholder="İsminizi giriniz" name="personel_isim" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
    
	<div class="form-group">
      <label for="uname">Meslek:</label>
      <input type="text" class="form-control" id="uname" placeholder="Mesleğinizi giriniz" name="personel_meslek" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	
	<div class="form-group">
      <label for="uname">Mail:</label>
      <input type="text" class="form-control" id="uname" placeholder="Mail adresinizi giriniz" name="personel_mail" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	<div class="form-group">
      <label for="uname">Telefon numarası:</label>
      <input type="text" class="form-control" id="uname" placeholder="Telefon numaranızı giriniz" name="personel_gsm" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
    <div class="form-group">
      <label for="uname">Cinsiyet:</label>
      <input type="text" class="form-control" id="uname" placeholder="Cinsiyet giriniz" name="personel_cinsiyet" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	<div class="form-group">
      <label for="uname">Doğum tarihini:</label>
      <input type="text" class="form-control" id="uname" placeholder="Doğum tarihinizi giriniz" name="personel_dogumt" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	<div class="form-group">
      <label for="uname">Adres:</label>
      <input type="text" class="form-control" id="uname" placeholder="Adresinizi giriniz" name="personel_adres" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	<div class="form-group">
      <label for="uname">Kişisel bilgi:</label>
      <input type="text" class="form-control" id="uname" placeholder="Kendiniz hakkında kısa bilgi giriniz" name="personel_kisabilgi" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
	
	<div class="form-group">
      <label for="uname">Kayıt tarihi:</label>
      <input type="text" class="form-control" id="uname" placeholder="Sisteme kayıt olduğunuz tarihi giriniz" name="personel_eklenmet" required>
      <div class="valid-feedback">Kabul edildi.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurun.</div>
    </div>
    

  
   </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="" required> Yukarıdaki bilgileri onaylıyorum.
        <div class="valid-feedback">Kabul edildi.</div>
        <div class="invalid-feedback">Devam etmek için kutuyu işaretleyin.</div>
      </label>
    </div>
    <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
  </form>
</div>


<?php 

if ($_POST) { 
	
 $personel_grup=$_POST['personel_grup'];
 $personel_tc=$_POST['personel_tc'];
 $personel_isim=$_POST['personel_isim'];
 $personel_meslek=$_POST['personel_meslek'];
 $personel_mail=$_POST['personel_mail'];
 $personel_gsm=$_POST['personel_gsm'];
 $personel_cinsiyet=$_POST['personel_cinsiyet'];
 $personel_dogumt=$_POST['personel_dogumt'];
 $personel_adres=$_POST['personel_adres'];
 $personel_kisabilgi=$_POST['personel_kisabilgi'];
 $personel_eklenmet=$_POST['personel_eklenmet'];

	if ($personel_grup<>""&&$personel_tc<>""&&$personel_isim<>""&&$personel_meslek<>""&&$personel_mail<>""&&$personel_gsm<>""&&$personel_cinsiyet<>""&&$personel_dogumt<>""&&$personel_adres<>""&&$personel_kisabilgi<>""&&$personel_eklenmet<>"") { 
		
		if ($veritabani->query("INSERT INTO personel(personel_grup,personel_tc,personel_isim,personel_meslek,personel_mail,personel_gsm,personel_cinsiyet,personel_dogumt,personel_adres,personel_kisabilgi,personel_eklenmet) 
		VALUES ('$personel_grup','$personel_tc','$personel_isim','$personel_meslek','$personel_mail','$tpersonel_gsm','$personel_cinsiyet','$personel_dogumt','$personel_adres','$personel_kisabilgi','$personel_eklenmet')")) 
		{
			echo "Veri Eklendi"; 
		}
		else
		{
			echo "Hata oluştu";
		}

	}

}

?>

<?php
require_once("ayar/alt_kisim.php");
?>