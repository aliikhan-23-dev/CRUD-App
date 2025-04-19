<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>List Of Clients</h2>
        <a class="btn-btn-primary" href="./myshop/create.php" role="button">New Client</a>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "users_db";
    $conn = new mysqli($servername, $username, $password, $databasename);
    if ($conn->connect_error) {
        die("Connection Failed". $conn->connect_error);
    }
    $sql = "SELECT * FROM records";
    $result = $conn->query($sql);
    if(!$result){
        die("Invalid". $conn->connect_error);
    }
    while($row = $result->fetch_assoc()){
        echo"
        <tr>
            <tbody>
                <td>$row[id]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <a class='btn-btn-primary btn-sm' href='./myshop/edit.php'?id=$row[id]>Edit</a>
                <a class='btn-btn-primary btn-sm' href='./myshop/delete.php'?id=$row[id]>Delete</a>
            </tbody>
        </tr>
        ";
    }
    
    ?>
    <table class="table">
        <tr>
            <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
            </thead>
        </tr>
        <tr>
            <tbody>
                <td>01</td>
                <td>billgates@gmail.com</td>
                <td>+11213232</td>
                <td>123 London Street</td>
                <td>01:24:02</td>
            </tbody>
        </tr>
    </table>
</body>
</html>