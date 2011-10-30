<?php

/* 
 * 
 * Bu kodlar http://www.sanalkurs.net/forum/profile/irfanevrens 
 * adresinde profili bulunan İrfan Evrens tarafından sanalkurs.net 
 * üyelerine yardımcı olmak için yazılmıştır.
 * 
 * cevap verilen soru: http://www.sanalkurs.net/forum/php-mysql/uye-kayit-sayfasina-guvenlik-kodu
 * 
 */

// burada oturumu başlatmamız gerekiyor. çünkü session nesnesi ile
// işimiz var. şayet oturum başlatmazsak formdan gelen verileri 
// güvenlik kodumuz ile karşılaştıramayız.
session_start();

// burada form submit edilmiş mi onun kontrolünü yapıyoruz
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	// formdan gönderilen güvenlik kodunu alıyoruz
	// diğer bilgileri almıyoruz, amacımız çözüm odaklı hareket etmek
	$guvenlik_kodu = $_POST['guvenlik_kodu'];
	
	// güvenlik kodumuzu karşılaştırıyoruz
	if ($guvenlik_kodu != $_SESSION['guvenlik_kodu']) {
	
		// güvenlik kodu hatalı girilmiş ise buraya girecektir.
		
		echo 'Güvenlik kodu hatalı';
		echo get_form();
		
	} else {
	
		// güvenlik kodu doğru girilmiş ise buraya girecektir
		echo 'Güvenlik kodu doğru girildi.';
		echo get_form();
	}
} else {

	// sayfaya ilk kez gelen kullanıcıya form gösteriyoruz
	echo get_form();
}

// Fonksiyonlar

// bu form alanını istediğiniz gibi düzenleyebilirdiniz.
// güvenlik kodu için gerekli kısım sadece 
// -----------------------------------------------------
// Güvenlik Kodu: <input type="text" size="20" name="guvenlik_kodu" />
// <img src="guvenlik.php" /> 
// -----------------------------------------------------
// kısmıdır
function get_form() {

	return 
'
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<form action="giris.php" method="post">
<p>
Adınız ve Soyadınız: <input type="text" size="20" name="adi" />
</p>
<p>
Mail Adresiniz: <input type="text" size="30" name="mail" />
</p>
<p>
Mesajınız: <textarea rows="6" cols="50" name="mesaj"></textarea>
</p>
<p>
Güvenlik Kodu: <input type="text" size="20" name="guvenlik_kodu" />
<img src="guvenlik.php" />
</p>
<p>
<input type="submit" value="Gönder" />
</p>
</form>
';
}