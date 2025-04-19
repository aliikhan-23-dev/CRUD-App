<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "users_db";
$connection = new mysqli_connect($servernam, $username, $password);



$id= "";
$name = "";
$email = "";
$phone = "";
$address = "";


$errorMessage =  "";
$successMessage = "";

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(!isset($_GET['id'])){
        header("location: /myshop/index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT clients from user WHERE $id = 'id'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("Location: /myshop/index.php");
        exit();
    }
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address']; 
}
else{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do{
        if(empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "All fields should be filled";
            break;
        }
        $sql = "SELECT clients". "SET name = '$name', email = '$email', phone = '$phone', address = '$address'"."WHERE id = $id";
        $result = $connection->query($sql);
        if(!$result){
            $errorMessage = "Invalid query".$connection->error;
            break;
        }
        $successMessage = "Clients added successfully";
        header("Location: /myshop/index.php");
        exit;
        
        while(false);
    }
};
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria label='Close'></button>
            ";
        }
        ?>
        <form action="">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row-mb-3">
                <label class="col-sm-6 col-form-label">Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-6 col-form-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-6 col-form-label">Phone</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-6 col-form-label">Address</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>
            <?php
            if(!empty($successMessage)){
                echo"
                <div class='row-mb-3'>
                    <div class='offset col-sm-3 d-grid'>
                        <div class='alert alert-warning alert-dismissible fade show role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria label='Close'></button>
                    </div>
                </div>
            </div>
                ";
            }
            ?>
            <div class="row-mb-3">
                <div class="offset col-sm-3 d-grid">
                <button type="submit" class="btn btn-ptimary">Submit</button>
                <div class="col-sm-3">
                    <a class="btn outline-primary" href="./myshop/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>