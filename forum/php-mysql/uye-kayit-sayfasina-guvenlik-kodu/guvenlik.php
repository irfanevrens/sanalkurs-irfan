<?php

// güvenlik kodunu session nesnesinde tutacağımız 
// için php tarafında bir session, yani oturum 
// başlatmamız gerekiyor. bu satır ile başlamazsak 
// güvenlik kodunu saklayamayız
session_start();
		
// formu dolduran kişiye rasgele üretilmiş bir sayı 
// göstereceğiz. bu sayıyı her defasında rasgele 
// üretmesi için mt_rand ismindeki fonksiyonu kullanıyoruz
$guvenlik_kodu = mt_rand(11111, 99999);

// oluşturduğumuz bu rasgele güvenlik kodunu session 
// bilgisine kaydediyoruz.
$_SESSION['guvenlik_kodu'] = $guvenlik_kodu;

// font bu konuda önemlidir. çünkü bilgisayar programları 
// tarafından karakterlerini okumak güç olan fontlar tercih 
// edilmelidir. sizde istediğiniz fontu kullanabilirsiniz. 
$font = 'jstart.ttf';

// rasgele üretilen sayının ekranda gösterilmesi için gerekli 
// yükseklik ve genişliği buradan ayarlıyoruz. şayet ekrana 
// tam sığmıyorsa ya da çok küçük kalıyorsa burayı değiştirebilirsiniz
$genislik = 100;
$yukseklik = 40;

// resim nesnemizi oluşturuyoruz
$resim = imagecreatetruecolor($genislik, $yukseklik);

// beyaz rengini elde ediyoruz.
$white = imagecolorallocate($resim, 255, 255, 255);

// resim üzerine beyaz renkli olarak rasgele ürettiğimiz 
// güvenlik kodunu yazdırıyoruz
imagefttext($resim, 20, 0, 10, 28, $white, $font, $guvenlik_kodu);

// tarayıcılara gerekli direktifleri veriyoruz. 
header('Content-type: image/png');
header('Cache-Control: max-age=1, must-revalidate');

// resmi gönderiyoruz
imagepng($resim);

// resim nesnesini yok ediyoruz.
imagedestroy($resim);