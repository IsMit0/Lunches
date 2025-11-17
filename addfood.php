<?php
header("location:food.php");
include_once("connection.php");//import equivalent
if($_POST["category"]=="main")
{
$category="main";
}elseif($_POST["category"]=="snack")
{
$category="snack";
}elseif($_POST["category"]=="drink")
{
$category="drink";
}
try {
    $stmt=$conn->prepare("INSERT INTO tblfood
    (FoodID,Food,Description,Category,Price)
    VALUES 
    (NULL,:Food,:Description,:Category,:Price)
    ");
    $stmt->bindParam(":Food", $_POST["food"]);
    $stmt->bindParam(":Description", $_POST["description"]);
    $stmt->bindParam(":Category", $category);
    $stmt->bindParam(":Price", $_POST["price"]);
    $stmt->execute();
}
    catch(PDOException $e){
        echo("Error: ". $e->getmessage());
}
?>