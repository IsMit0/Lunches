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
        <title>View basket and Checkout</title>
</head>

<body>
    <h1>Basket Contents</h1>
 <?php
        session_start();
        include_once("connection.php");
        foreach ($_SESSION["lunchbasket"] as $item){
            #echo($item["foodid"]);
           
            $fid=$item["foodid"];
            $stmt=$conn->prepare("SELECT * FROM tblfood WHERE FoodID=:fid");
            $stmt->bindParam(":fid",$fid);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
                print_r($row["Name"]." - Qty: ".$item["qty"]." Total Price: £".($row["Price"]*$item["qty"]));
                echo("<br>");
                $total+=($row["Price"]*$item["qty"]);
            }
            
        }
        echo("Total cost: £".$total. "<br>");
?>
 <a href="checkout.php">Proceed to checkout</a>
</body>
</html>