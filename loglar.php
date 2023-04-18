<?php
$mevcutSayfa = "Loglar";
require_once("ayar/ust_kisim.php");
?>
    <main role="main" class="container">
        <div class="row justify-content-md-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kullanıcı</th>
                        <th scope="col">Giriş Zamanı</th>
                        <th scope="col">Çıkış Zamanı</th>
                        <th scope="col">IP</th>
                    </tr>
                </thead>
                <tbody>
<?php
$loglar = $veritabani->query("SELECT log_id, log_kullanici, log_giris, log_cikis, log_ip FROM loglar ORDER BY log_id ASC LIMIT 100");

while(list($log_id, $log_kullanici, $log_giris, $log_cikis, $log_ip) = $loglar->fetch(PDO::FETCH_NUM)) {
    $logS = $veritabani->prepare("SELECT kullanici_adi FROM kullanici WHERE kullanici_id = ?");
    $logS->execute(array($log_kullanici));
    $logVeri = $logS->fetch(PDO::FETCH_ASSOC);
?>
                    <tr>
                        <th scope="row"><?php echo $log_id; ?></th>
                        <td><?php echo $logVeri["kullanici_adi"]; ?></td>
                        <td><?php echo $log_giris; ?></td>
                        <td><?php echo $log_cikis; ?></td>
                        <td><?php echo $log_ip; ?></td>
                    </tr>
<?php
}
?>
                </tbody>
            </table>
        </div>
    </main>

<?php
require_once("ayar/alt_kisim.php");
?>