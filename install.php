<?php
$servername="localhost";
$username="root";
$password="LadderItself75)";
$conn= new PDO("mysql:host=$servername",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="CREATE DATABASE IF NOT EXISTS Lunches";
$conn->exec($sql);
$sql="USE Lunches";
$conn->exec($sql);
echo("DB created successfully<br>");
// create users table
$stmt=$conn->prepare("
DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
Year INT(2) NOT NULL,
Balance DECIMAL(15,2) NOT NULL,
Role TINYINT(1)
);
");
$stmt->execute();
echo("tblusers created<br>");
// add in test bed of users
$hashedpassword=password_hash("password",PASSWORD_DEFAULT);
echo($hashedpassword);
    $stmt=$conn->prepare("INSERT INTO tblusers 
    (UserID,Username,Surname,Forename,Password,Year,Balance,Role)
    VALUES 
    (NULL,'mitchell.i','Mitchell','Isaac',:Password,12,400,1),
    (NULL,'aidan.s','Smith','Aidan',:Password,11,4003,0)
    ");
    $stmt->bindParam(":Password", $hashedpassword);
    $stmt->execute();
// create food table
$stmt=$conn->prepare("
DROP TABLE IF EXISTS tblfood;
CREATE TABLE tblfood
(FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Food VARCHAR(20) NOT NULL,
Description VARCHAR(200) NOT NULL,
Category VARCHAR(20) NOT NULL,
Price DECIMAL (15,2) NOT NULL
);
");
$stmt->execute();
echo("tblfood created<br>");
    $stmt=$conn->prepare("INSERT INTO tblfood
    (FoodID,Food,Description,Category,Price)
    VALUES 
    (NULL,'Twix','Chocolate Bar','Snack',2),
    (NULL,'Cheese Sandwich','Cheddar Cheese','Main',5),
    (NULL,'Ham Sandwich','Smoked Ham','Main',5),
    (NULL,'Pepsi','Fizzy','Drink',4)
    ");
    $stmt->execute();
?>