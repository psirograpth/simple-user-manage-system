<?php
require_once('veritabani.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Personel Yönetim Sistemi - <?php echo $mevcutSayfa; ?></title>
</head>
<body style="padding-top: 10rem; padding-bottom: 5rem">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 acilir-menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($mevcutSayfa == "Kişi Ekle") echo "active"; ?>" href="kisi_ekle.php"><i class="bi bi-person-plus-fill"></i> Kişi Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($mevcutSayfa == "Kişileri Listele") echo "active"; ?>" href="kisi_listele.php"><i class="bi bi-people-fill"></i> Kişileri Listele</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php">Personel Yönetim Sistemi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".acilir-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 acilir-menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($mevcutSayfa == "Loglar") echo "active"; ?>" href="loglar.php"><i class="bi bi-clock-history"></i> Loglar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($mevcutSayfa == "Kullanıcı Bilgileri") echo "active"; ?>" href="kullanici_bilgileri.php"><i class="bi bi-person-circle"></i> Kullanıcı Bilgileri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cikis.php"><i class="bi bi-box-arrow-right"></i> Çıkış</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
