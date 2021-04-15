<?php

function writeCSV($nome_do_arquivo, $array_de_arrays, $array_de_indices = array()) {

	$arquivo = fopen(FCPATH.$nome_do_arquivo, 'w');

	array_unshift($array_de_arrays, $array_de_indices);

	foreach ($array_de_arrays as $array) {
	    fputcsv($arquivo, $array);
	}

	fclose($arquivo);

	return readCSV($nome_do_arquivo, $array_de_indices);
}

function readCSV($nome_do_arquivo, $array_de_indices) {

	$arquivo = fopen(FCPATH.$nome_do_arquivo, "r");
	$coluna = 0;
	while($line = fgetcsv($arquivo, 1000, ",")) {
		if ($coluna++ == 0) {
			continue;
		}

		$equipamentos[] = [
			$array_de_indices[0] => $line[0],
			$array_de_indices[1] => $line[1],
			$array_de_indices[2] => $line[2],
			$array_de_indices[3] => $line[3],
			$array_de_indices[4] => $line[4],
			$array_de_indices[5] => $line[5],
			$array_de_indices[6] => $line[6],
			$array_de_indices[7] => $line[7]
		];

	}
	fclose($arquivo);

	return $equipamentos;

}
