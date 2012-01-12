<?php

function menu_olustur($sayfa = '') {
	
	// menümüzün listesine başlangıç yapalım
	echo '<ul>' . "\n";
	
	// ana sayfa menüsünün aktif olup olmadığının tespit edilmesi
	$aktifMenu = '';
	if (empty($sayfa)) 
		$aktifMenu = ' class="aktifMenu"';

	// ana sayfa menü elemanının ekrana yazdırılması
	echo '<li><a' . $aktifMenu . ' href="icerik.php">Anasayfa</li>' . "\n";
   
	// diğer sayfaların menüde gösterilmesi için veritabanına sorgu gönderiyoruz
	$sorgu = mysql_query('SELECT * FROM sayfalar ORDER BY sira ASC');

	// sorgu sonucu üzerinde dönmeye başlıyoruz
	while ($bilgi = mysql_fetch_array($sorgu)) {
      
		// aktif sayfamızı tesbit etmek amacı ile kontrol yapıyoruz
		$aktifMenu = '';
		if ($sayfa == $bilgi['id'])
			$aktifMenu = ' class="aktifMenu"';
    	
		// menü elemanını ekrana yazdırıyoruz
		echo '<li><a' . $aktifMenu . ' href="' . $_SERVER['PHP_SELF'] . '?sayfa=' . $bilgi['id'] . '">' . $bilgi['isim'] . '</li>' . "\n";
	}
    
	// menü listemizi tamamlıyoruz
	echo '</ul>' . "\n";
}