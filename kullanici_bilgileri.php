<?php
$mevcutSayfa = "Kullanıcı Bilgileri";
require_once("ayar/ust_kisim.php");

$uyeSorgu = $veritabani->prepare("SELECT * FROM kullanici WHERE kullanici_id = ?");
$uyeSorgu->execute(array($_SESSION['id']));

$uyeSorguVeri = $uyeSorgu->fetch(PDO::FETCH_ASSOC);

if(isset($_POST) & !empty($_POST)){

    $kullaniciAdi   = addslashes($_POST["kullaniciAdi"]);
    $mevcutParola   = addslashes($_POST["mevcutParola"]);
    $yeniParola1    = addslashes($_POST["yeniParola1"]);
    $yeniParola2    = addslashes($_POST["yeniParola2"]);

    if(empty($_POST["kullaniciAdi"])){ $hatalar[] = 'Kullanıcı adı alanı boş bırakılamaz.';}
    if(empty($_POST["mevcutParola"])){ 
        $hatalar[] = 'Mevcut parola alanı boş bırakılamaz.';
    } elseif ($_POST["mevcutParola"] != $uyeSorguVeri["kullanici_parola"]) {
        $hatalar[] = 'Parolanızı yanlış girdiniz.';
    }

    if(!empty($_POST["kullaniciAdi"]) && !empty($_POST["mevcutParola"] && !empty($_POST["yeniParola1"]) && empty($_POST["yeniParola2"])))
    {
        if(empty($_POST["yeniParola2"])){ $hatalar[] = 'Yeni parola (tekrar) alanı boş bırakılamaz.';}
    }

    if(empty($hatalar)){
        if(empty($yeniParola1)){
            if($kullaniciAdi != $uyeSorguVeri['kullanici_adi']){
                $bilgiGuncelle = $veritabani->prepare("UPDATE kullanici SET kullanici_adi = :kullanici_adi WHERE kullanici_id = :kullanici_id");

                $bilgiGuncelle->execute(array(
                    ':kullanici_adi'    =>  $kullaniciAdi,
                    ':kullanici_id'     =>  $uyeSorguVeri['kullanici_id']
                ));

                $basarili[] = 'Başarıyla kullanıcı adınızı değiştirdiniz.</br>Birazdan yönlendirileceksiniz.';
                header("Refresh: 3; url=index.php");
            }else {
                $hatalar[] = 'Kullanıcı adınızda bir değişiklik bulunmadığı için işlem gerçekleştirilemedi.';
            }
        } else {
            if ($yeniParola1 == $yeniParola2) {
                if($kullaniciAdi != $uyeSorguVeri['kullanici_adi']){
                    $bilgiGuncelle = $veritabani->prepare("UPDATE kullanici SET kullanici_adi = :kullanici_adi AND kullanici_parola = :kullanici_parola WHERE kullanici_id = :kullanici_id");

                    $bilgiGuncelle->execute(array(
                        ':kullanici_adi'    =>  $kullaniciAdi,
                        ':kullanici_parola' =>  $yeniParola1,
                        ':kullanici_id'     =>  $uyeSorguVeri['kullanici_id']
                    ));
                    
                    $basarili[] = 'Başarıyla parolanızı değiştirdiniz.';  
                    $basarili[] = 'Başarıyla kullanıcı adınızı değiştirdiniz.</br>Birazdan yönlendirileceksiniz.';
                    header("Refresh: 3; url=index.php"); 
                }else {
                    $bilgiGuncelle = $veritabani->prepare("UPDATE kullanici SET kullanici_parola = :kullanici_parola WHERE kullanici_id = :kullanici_id");

                    $bilgiGuncelle->execute(array(
                        ':kullanici_parola' =>  $yeniParola1,
                        ':kullanici_id'     =>  $uyeSorguVeri['kullanici_id']
                    ));
                    
                    $basarili[] = 'Başarıyla parolanızı değiştirdiniz.</br>Birazdan yönlendirileceksiniz.';  
                    header("Refresh: 3; url=index.php");
                }
            }else {
                $hatalar[] = 'Belirlemek istediğiniz parola tekrarını yanlış girdiniz.';
            }
        }
    }

}

?>
    <div class="container">
        <main>
            <div class="row justify-content-md-center">
                <div class="col"></div>
                <div class="col">
                    <p class="text-center h3">Hesap bilgilerinizi güncelleyin.</p><br><br>
                    <?php 
                    if (!empty($hatalar)) {
                    echo '<div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">HATA!</h4>
                    <ul>';
                    foreach ($hatalar as $hata) {
                        echo "<li>".$hata."</li>";
                    }
                    echo "</ul></div>";
                    }
                    if (!empty($basarili)) {
                    echo '<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">BAŞARILI!</h4>
                    <ul>';
                    foreach ($basarili as $basari) {
                        echo "<li>".$basari."</li>";
                    }
                    echo "</ul></div>";
                    } 
                    ?>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="kullaniciAdi" class="form-label">Kullanıcı Adı</label>
                            <input type="input" class="form-control" id="kullaniciAdi" name="kullaniciAdi" value="<?php echo $uyeSorguVeri['kullanici_adi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mevcutParola" class="form-label">Mevcut Parola</label>
                            <input type="password" class="form-control" id="mevcutParola" name="mevcutParola">
                        </div>
                        <div class="mb-3">
                            <label for="yeniParola1" class="form-label">Yeni Parola</label>
                            <input type="password" class="form-control" id="yeniParola1" name="yeniParola1">
                        </div>
                        <div class="mb-3">
                            <label for="yeniParola2" class="form-label">Yeni Parola (Tekrar)</label>
                            <input type="password" class="form-control" id="yeniParola2" name="yeniParola2">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </main>
    </div>
<?php
require_once("ayar/alt_kisim.php");
?>