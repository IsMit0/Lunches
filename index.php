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
    <h1>Main Page</h1>
    <a href="users.php">Add User</a><br>
    <a href="food.php">Add Food</a><br>
    <a href="login.php">Login</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>