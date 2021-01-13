<?php
$sname=$_REQUEST["sname"];
$rollnumber=$_REQUEST["rollnumber"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";
//$sname="se";
//$rollnumber="1";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$stmt=$conn->prepare("SELECT totalclass FROM $sname where rollnumber=$rollnumber");
$stmt->execute();
$tclass=$stmt->fetchColumn();
    echo $tclass;
?>