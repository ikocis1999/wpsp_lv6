<?php
include 'classes.php';
$oVeza=new Configuration('localhost',
'studentskidom',
'root',
'');
try
{
 $oConnection = new PDO("mysql:host=$oVeza->host;dbname=$oVeza->dbname", $oVeza->username, $oVeza->password);
 echo "Connected to $oVeza->dbname at $oVeza->host successfully.";
}
catch (PDOException $pe)
{
 die("Could not connect to the database $oVeza->dbname :" . $pe->getMessage());
}
?>