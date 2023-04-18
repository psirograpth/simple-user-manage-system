<?php
require_once("ayar/veritabani.php");
if(isset($_SESSION['id']) & !empty($_SESSION['id'])){
    header('location: index.php');
}

$dogrulamaKodu = rand(10000, 99999);

if(isset($_POST) & !empty($_POST))
{
    $kullaniciAdi       = addslashes($_POST["kullaniciAdi"]);
    $kullaniciParola    = addslashes($_POST["kullaniciParola"]);

    if(empty($_POST["kullaniciAdi"])){ $hatalar[] = 'Kullanıcı adı alanı boş bırakılamaz.';}
    if(empty($_POST["kullaniciParola"])){ $hatalar[] = 'Parola alanı boş bırakılamaz.';}
    if(empty($_POST["dogrulamaKodu"])){ $hatalar[] = 'Parola alanı boş bırakılamaz.';}

    if (!empty($_POST["dogrulamaKodu"]) != $dogrulamaKodu) {
        $hatalar[] = 'Doğrulama kodunu yanlış girdiniz!';
    }

    if(empty($hatalar)){
        $sorgu = $veritabani->prepare("SELECT * FROM kullanici WHERE kullanici_adi = ?");
        $sorgu->execute(array($kullaniciAdi));
        $sorguSay = $sorgu->rowCount();
        $sorguVeri = $sorgu->fetch(PDO::FETCH_ASSOC);

        if ($sorguSay == 1) {
            if ($sorguVeri['kullanici_parola'] == $kullaniciParola){
                $logSorgu = $veritabani->prepare("INSERT INTO loglar (log_kullanici, log_giris, log_ip) VALUES (:log_kullanici, NOW(), :log_ip)");
                $logSorgu->execute(array(
                    ':log_kullanici'    =>  $sorguVeri['kullanici_id'],
                    ':log_ip'           =>  $_SERVER['REMOTE_ADDR']
                ));

                session_regenerate_id();
                $_SESSION['giris'] = true;
                $_SESSION['id'] = $sorguVeri['kullanici_id'];

                header('location:index.php');
            } else {
                $hatalar[] = 'Geçersiz parola.';
            }
        }
        else {
            $hatalar[] = 'Geçersiz kullanıcı adı.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Personel Yönetim Sistemi - Giriş</title>
</head>
<body style="padding-top: 15rem;">
    <div class="container">
        <main>
            <div class="row justify-content-md-center ">
                <div class="col"></div>
                <div class="col">
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
                ?>
                    <form role="form" method="post">
                        <h1 class="h3 mb-3 fw-normal">Giriş yap.</h1>

                        <div class="form-floating">
                            <input type="input" class="form-control" id="kullaniciAdi" name="kullaniciAdi" placeholder="Kullanıcı adı">
                            <label for="kullaniciAdi">Kullanıcı adı</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="kullaniciParola" name="kullaniciParola" placeholder="Parola">
                            <label for="kullaniciParola">Parola</label>
                        </div>
                        <br>
                        <label>DOĞRULAMA KODU: <b><?php echo $dogrulamaKodu; ?></b></label>
                        <div class="form-floating">
                            <input type="input" class="form-control" id="dogrulamaKodu" name="dogrulamaKodu" placeholder="Doğrulama kodu">
                            <label for="dogrulamaKodu">Doğrulama kodunu giriniz</label>
                        </div>
                        <br>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Giriş</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </main>
    </div>

<?php
require_once("ayar/alt_kisim.php");
?>
