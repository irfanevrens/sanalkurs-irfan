<?php

// http://www.sanalkurs.net/forum/php-mysql/odev-s/
// adresindeki soruya cevaben hazırlanmıştır

$kac_tane = 10;

for ($i = 1; $i <= $kac_tane; $i++) {

	echo 2 * get_fib_at_n($i) . " ";
}

// fibonacci fonksiyonu
function get_fib_at_n($n = 0) {

	if ($n == 0) return 0;
	if ($n == 1) return 1;
	
	return get_fib_at_n($n - 1) + get_fib_at_n($n - 2);
}