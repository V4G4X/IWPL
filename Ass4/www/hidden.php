<?php
session_start();

if (!isset($_SESSION['loggedIN'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container jumbotron mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-6 text-center">
                <h4 id="response" class="text-success"><?php echo $_SESSION['email'] ?> Logged in Successfully!</h4>
            </div>
        </div>
        <div class="row justify-content-end mt-5 mr-5">
            <a href="logout.php">
                <button class="btn btn-lg btn-danger">Log Out</button>
            </a>
        </div>
    </div>
</body>

</html>