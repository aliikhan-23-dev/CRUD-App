<?php
if(isset($_GET["id"])){
    $id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "users_db";
$connection = new mysqli_connect($servername, $username, $email,$password);
$sql = "DELETE FROM clients WHERE id = $id";
$connection->query($sql);
}
header("Location: /myshop/index.php");
exit();
?>