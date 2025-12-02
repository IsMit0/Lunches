<?php
session_start();
if (isset($_SESSION["loggedinuser"])){
    echo("Hello ".$_SESSION["firstname"]);
}else{
    echo("Not Logged In");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Packed lunch ordering system</title>
</head>

<body>
    <?php
    session_start();
    echo("You have ".$howmany." items in your basket<br>")
    include_once("connection.php");
    foreach ($_SESSION["lunchbasket"] as &$item){
    echo($item["foodid"]);
    $fid=$item["foodid"];
    $stmt=$conn->prepare("SELECT * FROM tblfood WHERE FoodID=:fid");
    $stmt->bindParam(":fid",$fid);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        print_r($row["Food"]." - Qty: ".$item["qty"]."total price".($row["Price"]*$item["qty"]));
        echo("<br>");
    }
}
    print_r($_SESSION["foodid"]);
    echo("<br>");
    ?>
    <h1>Browse</h1>
    Select Category
    <?php
    include_once("connection.php");
    $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Food");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
       echo('<form action="addtobasket.php" method="POST">');
       echo($row["Name"]." ".$row["Description"]." ".$row["Price"]);
       echo('<input type="hidden" name="foodid" value='.$row["FoodID"].'>');
       echo(' Quantity:<input type="number" name="qty" min="1" max="5" value="1">');
       echo('<input type="submit" value="Add Food">');
       echo("<br></form>");
        }
    ?>
</body>
</html>