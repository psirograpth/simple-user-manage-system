<?php
$mevcutSayfa = "Anasayfa";
require_once("ayar/ust_kisim.php");
require_once("ayar/giris_kontrol.php");

$uyeSorgu = $veritabani->prepare("SELECT kullanici_adi FROM kullanici WHERE kullanici_id = ?");
$uyeSorgu->execute(array($_SESSION['id']));

$uyeSorguVeri = $uyeSorgu->fetch(PDO::FETCH_ASSOC);
?>
    <main role="main" class="container">
        <div class="row justify-content-md-center">
            <div class="card text-center" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Hoş geldin <b><?php echo $uyeSorguVeri['kullanici_adi']; ?></b></h5>
                    <p class="card-text">Menülerden ihtiyacın olan şeylere ulaşabilirsin.</p>
                </div>
            </div>
        </div>
    </main>

<?php
require_once("ayar/alt_kisim.php");
?>