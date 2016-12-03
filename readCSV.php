<?php

    $allMunicipalities = " ";
    $myfile = fopen("comuni.csv", "r") or die ("unable to open file!");
	while(!feof($myfile))
	{
		$linea = fgets($myfile);
		if(!feof($myfile))
		{
			$array = explode(",", $linea);
			$com = trim($array[1]);
			$allMunicipalities = $allMunicipalities . "<option value=" . $array[0] . ">". $com . "</option>";
		}
	}
	
	echo $allMunicipalities;

?>