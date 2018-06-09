<?php
/**
 * Extract Teachers bio data form 
 */

function extractDataFromFile($filename,$keys){
	$dataToBeSaved=[];
	$row = 1;
	if (($handle = fopen($filename, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        $dataToBeSaved[]=array_combine($keys, $data);
	    }
    fclose($handle);
	}
	return $dataToBeSaved;
}