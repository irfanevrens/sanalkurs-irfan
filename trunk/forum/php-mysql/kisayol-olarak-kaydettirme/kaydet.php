<?php

/* 
 * 
 * Bu kodlar http://www.sanalkurs.net/forum/profile/irfanevrens 
 * adresinde profili bulunan İrfan Evrens tarafından sanalkurs.net 
 * üyelerine yardımcı olmak için yazılmıştır.
 * 
 * cevap verilen soru: http://www.sanalkurs.net/forum/php-mysql/kisayol-olarak-kaydettirme
 * 
 */

$indirilecek_dosya_adi = 'Sanal Kurs.url';

// tampon belleğe yazdıracağız bundan sonraki yazdıracaklarımızı
ob_start(); 

echo '[InternetShortcut]' . "\n";
echo 'URL=http://www.sanalkurs.net';

// tampon bellekteki içeriği alalım
$tampon_icerik = ob_get_contents();

// tampon belliği silelim ve artık tampon bellek kullanmayacağımızı belirtelim
ob_end_clean();

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
header("Content-Transfer-Encoding: binary ");
header('Content-Type: application/force-download');
header("Content-Type: application/download");
header('Content-Length: '.strlen($tampon_icerik));
header('Content-Disposition: attachment; filename="'.$indirilecek_dosya_adi.'"');

echo $tampon_icerik;