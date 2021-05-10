<?php 
	include "classes.php";

	$studom = new Studom("","");
	$studom->DajStudente();
	$studom->DajSobe();

	$studentiJsonObj=json_decode($studom->studenti);
	$sobeJsonObj = json_decode($studom->soba);

	$aStudenti = array();
	$aSobe = array();

	foreach ($studentiJsonObj as $student) {
		$room;
		$stud;
		foreach ($sobeJsonObj as $soba) {
			if ($student['JMBAG']==$soba['JMBAG']) {
				$room= new Soba(
					$soba['IdSobe'],
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
			$student['adresa'],
			$student['grad'],
			$student['PostanskiBroj'],
			$student['GodinaStudija'],
			$student['ProsjekOcjena'],
			null
		);
		$stud->soba = $room;
		array_push($aStudenti, $stud);

		foreach ($aSobe as $soba) {
			foreach ($aStudenti as $student) {
				if ($student->soba->IdSobe==$soba->IdSobe) {
					array_push($student->soba->aStudenti, $student);
					array_push($soba->Student, $student);
				}
			}
		}
		
	}
?>