<?php
session_start();
if ($_SESSION["admin"]==1){
    echo("hello ".$_SESSION["firstname"]);
}else{
    header("location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
</head>

<body>
    <form action="addfood.php" method="post">
        Food:<input type="text" name="food"><br>
        Description:<input type="text" name="description"><br>
        Category:<select name="category">
        <option disabled selected value> -- Select an Option - -</option>
        <option value="main">Main</option>
        <option value="snack">Snack</option>
        <option value="drink">Drink</option>
        </select><br>
        Price:<input type="number" name="price"><br>
        <input type="submit" value="Add Food">

</form>
<?php
include_once("connection.php");
            $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Name");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            //print_r($row);
            echo($row["Name"]." ".$row["Description"]." ".$row["Price"]);
            echo("<br>");
        }
?>
</body>
</html>       