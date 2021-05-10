<?php
	class Configuration
	{
		public $host=''; 
    	public $dbname=''; 
    	public $username=''; 
    	public $password='';

    	function __construct($host,$dbname,$username,$password)
    	 {
    	 	$this->host = $host;
    	 	$this->dbname = $dbname;
    	 	$this->username = $username;
    	 	$this->password = $password;
    	 } 
	}
	class Soba
	{
		public $IdSobe="";
		public $Naziv="";
		public $Opis="";
		public $Kat="";
		public $Studenti="";
		function __construct($IdSobe, $Naziv, $Opis, $Kat, $Studenti)
		{
			$this->IdSobe=$IdSobe;
			$this->Naziv=$Naziv;
			$this->Opis=$Opis;
			$this->Kat=$Kat;
			$this->Student=$Student;
		}
	}
	class Studom
	{
		public $studenti="";
		public $soba="";
		function __construct($studenti,$soba)
		{
			$this->studenti=$studenti;
			$this->soba=$soba;
		}
			public function DajStudente(){
				include "connection.php";
				$query = "SELECT 
				studenti.JMBAG,
				studenti.ime,
				studenti.prezime,
				studentidodatnipodaci.Adresa,
				studentidodatnipodaci.PostanskiBroj,
				studentidodatnipodaci.Grad,
				studentipodacistudij.OstvarniEcts,
				studentipodacistudij.ProsjekOcjena
				FROM studenti JOIN studentidodatnipodaci ON studenti.JMBAG = studentidodatnipodaci.JMBAG JOIN studentipodacistudij ON studentipodacistudij.JMBAG = studentidodatnipodaci.JMBAG";

				$oData = $oConnection->query($query);
				$students = array();
				while($oRow = $oData->fetch(PDO::FETCH_BOTH)){
					$students[] = $oRow;
				}
				$this->studenti=json_encode($students);
			}

			public function DajSobe(){
				include "connection.php";
				$query = "SELECT 
				sobe.Naziv,
				sobe.Opis,
				sobe.Kat,
				sobe.Id,
				studentsoba.JMBAG
				FROM sobe JOIN studentsoba ON studentsoba.IdSobe=sobe.Id";
				$oData = $oConnection->query($query);
				$rooms = array();
				while ($oRow = $oData->fetch(PDO::FETCH_BOTH)) {
					$rooms[] = $oRow;
				}
				$this->soba=json_encode($rooms);
			}
	}
	
	class Student
	{
		public $ime="";
		public $prezime="";
		public $JMBAG="";
		public $adresa="";
		public $grad="";
		public $PostanskiBroj="";
		public $GodinaStudija="";
		public $OstvarniEcts="";
		public $ProsjekOcjena="";
		public $soba="";		
		function __construct($ime, $prezime, $JMBAG,$adresa,$grad,$PostanskiBroj, $GodinaStudija, $OstvarniEcts, $ProsjekOcjena,$soba)
		{
			$this->ime=$ime;
			$this->prezime=$prezime;
			$this->JMBAG=$JMBAG;
			$this->adresa=$adresa;
			$this->grad=$grad;
			$this->PostanskiBroj=$PostanskiBroj;
			$this->GodinaStudija=$GodinaStudija;
			$this->OstvarniEcts=$OstvarniEcts;
			$this->ProsjekOcjena=$ProsjekOcjena;
			$this->soba=$soba;
		}
	}
?>