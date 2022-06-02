<?php

if (!defined('ABSPATH')) {exit;} // Exit if accessed directly.

$name_entry_text = ' - <span class="fms-found-spct">Suspicious pattern found</span> - '; // Подсвечивается красным при нахождение вхождения

$collection_of_patterns[] = "/base64/i";
$collection_of_patterns[] = "/mkdir/i";
$collection_of_patterns[] = "/shell_exec/i";
$collection_of_patterns[] = "/chmod/i";
$collection_of_patterns[] = "/system/i";
$collection_of_patterns[] = "/passthru/i";
$collection_of_patterns[] = "/fromCharCode/i"; // JavaScript
$collection_of_patterns[] = "/auth_pass/i";
$collection_of_patterns[] = "/FilesMan/i";
$collection_of_patterns[] = "/try{document.body/i"; // JavaScript
$collection_of_patterns[] = "/passwd/i";
$collection_of_patterns[] = "/eval(str_replace/i";
$collection_of_patterns[] = "/eval(gzinflate/i";
$collection_of_patterns[] = '/="";function/i'; //
$collection_of_patterns[] = "/e2aa4e/i";
$collection_of_patterns[] = "/md5=/i";
$collection_of_patterns[] = '/"ev"+"al"/i'; //



echo '<p>Searching results:</p>';

foreach ($collection_of_patterns as $single_collection_pattern) {
	// Поиск ключевых слов из массива $collection_of_patterns во всех файлах темы
	foreach ($files_in_the_theme as $file_to_search){
		$scannig_current_file = file_get_contents($file_to_search);
		$pattern_preg_match = preg_quote($single_collection_pattern); // Экранирование выражений
	if (preg_match_all($pattern_preg_match, $scannig_current_file, $matches)) {
		$sum_injection_count = count($matches[0], COUNT_RECURSIVE);
		echo $file_to_search . $name_entry_text . $pattern_preg_match . ' (' . $sum_injection_count . ')' . '<br>';
		$total_find_sum += $sum_injection_count;
	} else {
		##	echo $file_to_search . ' - ' . "Вхождение не найдено." . '<br>';
	}
	}
}

echo '<br>';

// Вывод найдено или нет и плюс сумма найденых вхождений
if( $total_find_sum > 0 ){
	echo '<span class="fms-notok">Not O.K.</span> ' . 'Entry found. ' . '/ Total: ' . $total_find_sum;
}else{
	echo '<span class="fms-ok">O.K.</span> ' . 'Nothing found.';
}
?>