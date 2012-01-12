<?php require_once 'includes/config.php'; ?>

<?php require_once 'includes/functions.php'; ?>

<?php require_once 'includes/header.php'; ?>

<div id="main">

	<div id="sol_menu">
    
		<?php menu_olustur(@$_GET['sayfa']); ?>

		<div id="icerik">
		
		<?php
		
			// her hangi bir sayfa parametresi verilmiş mi?
			if (isset($_GET['sayfa'])) {
				
				// evet, bir sayfa bakılmak istenmiş
				
				// o halde bakılmak istenen sayfanın bilgilerini veritabanından sorgulayalım
				$sorgu = mysql_query('SELECT * FROM sayfalar WHERE id=' . $_GET['sayfa']);
				
				// istenen sayfa veritabanında var mı?
				if (mysql_num_rows($sorgu) == 1) {
					
					// evet istenen sayfa veritabanında varmış
					
					// o halde aldığımız sayfa bilgilerini değişkene alalım
					$bilgi = mysql_fetch_array($sorgu);
					
					// sayfamızda göstermek üzere asıl değişkenlerimizin içeriğini belirleyelim
					$sayfa_baslik = $bilgi['isim'];
					$sayfa_icerik = $bilgi['icerik'];
				} else {
					
					// hayır, istenen sayfa veritabanında yokmuş
					
					// hata mesajı vererek kullanıcıyı bilgilendirelim
					$sayfa_baslik = 'Sayfa Bulunamadı';
					$sayfa_icerik = 'Aradığınız sayfa bulunamadı, diğer sayfalara göz atınız.';
				}
			
			} else {
				
				// hayır, ana sayfaya bakılmak istenmiş
				
				// sana sayfaya ait bilgileri değişkenlere alalım
				$sayfa_baslik = 'Ana Sayfa';
				$sayfa_icerik = 'Sitemize hoşgeldiniz.';
			}
			
			// son olarak değişkenlerimizi ekrana yazdıralım
			echo '<h2>' . $sayfa_baslik . '</h2>';
			echo '<p>' . $sayfa_icerik . '</p>';
			
		?>
		</div> 
		<!-- #icerik -->
		
	</div>
	<!-- #sol_menu -->
	
</div>
<!-- #main -->

<?php require_once 'includes/footer.php'; ?>