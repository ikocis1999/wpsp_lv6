<?php 
	include "classes.php";

	$studom = new Studom("","");
	$studom->DajStudente();
	$studom->DajSobe();

	$studentiJsonObj=json_decode($studom->studenti, true);
	$sobeJsonObj = json_decode($studom->soba, true);
	//var_dump($studentiJsonObj);

	$aStudenti = array();
	$aSobe = array();

	foreach ($studentiJsonObj as $student) {
		
		$room;
		//$stud;
		foreach ($sobeJsonObj as $soba) {
			if ($student['JMBAG']==$soba['JMBAG']) {
				$room = new Soba(
					$soba['Id'],
					$soba['Naziv'],
					$soba['Opis'],
					$soba['Kat'],
					array()
				);
				array_push($aSobe, $room);
			}
		}
		$stud = new Student(
			$student['ime'],
			$student['prezime'],
			$student['JMBAG'],
			$student['Adresa'],
			$student['Grad'],
			$student['PostanskiBroj'],
			$student['GodinaStudija'],
			$student['OstvareniECTS'],
			$student['ProsjekOcjena'],
			null
		);
		$stud->soba = $room;
		array_push($aStudenti, $stud);
	}

	foreach ($aSobe as $soba) {
		foreach ($aStudenti as $student) {
			if ($soba->IdSobe==$student->soba->IdSobe) {
				array_push($student->soba->Studenti, $student);
			}
		}
	}
		
	
?>