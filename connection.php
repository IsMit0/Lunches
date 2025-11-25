<?php
$servername="localhost";
$username="root";
$password="LadderItself75)";
$dbname="lunches";
try{
$conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo("Connected Successfully<br>");
}
catch(PDOException $e){
    echo("Connection failed: " . $e->getMessage());
}
?>