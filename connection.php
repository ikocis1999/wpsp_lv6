<?php
require_once('classes.php');
$oVeza=new Configuration('localhost',
'studentskidom',
'root',
'');
try
{
 $oConnection = new PDO("mysql:host=$oVeza->host;dbname=$oVeza->dbname", $oVeza->username, $oVeza->password);
}
catch (PDOException $pe)
{
 die("Could not connect to the database $oVeza->dbname :" . $pe->getMessage());
}
?>