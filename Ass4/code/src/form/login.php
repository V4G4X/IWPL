<?php 
    session_start();

    //If already logged IN
    if (isset($_SESSION['loggedIN'])){
        header('Location: success.php');
        exit();
    }

    if (isset($_POST['login'])) {
        $connection = new mysqli('db','user','password','loginTutorial');

        $email = $connection->real_escape_string($_POST['emailPHP']);
        $password = $connection->real_escape_string($_POST['passwordPHP']);

        $data = $connection->query("SELECT id FROM users WHERE email='$email' AND password='$password' ");
        if( $data->num_rows > 0){
            $_SESSION['loggedIN'] = 1;
            $_SESSION['email'] = $email;
            exit("success");
        }
        else
            exit("failure");

        exit( $email . " = " . $password);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container jumbotron mt-5 mb-5">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-12 col-md-6">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"></input>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"></input>
                    </div>
                    <input type="button" class="btn btn-lg btn-primary mt-3" value="Log In" id="login"></input>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-6 text-center">
                <h3 id="response"></h3>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $().ready(function() {
            console.log('Page Ready');
            $("#login").on('click', function() {
                var email = $("#email").val();
                var password = $("#password").val();
                console.log("Email: ", email, "\nPassword: ", password);

                if (email === "" || password === "")
                    alert("Please Enter Details");
                else {
                    $.ajax(
                        {
                            url:'login.php',
                            method: 'POST',
                            data:{
                                login:1,
                                emailPHP: email,
                                passwordPHP: password
                            },
                            success: function(response){
                                // console.log(response);
                                if(response === "success"){
                                    console.log("Success!");
                                    $("#response").removeClass("text-danger");
                                    $("#response").addClass("text-success");
                                    $("#response").html("Login was Successful!");
                                    window.location = 'success.php';
                                }
                                else if(response === "failure"){
                                    console.log("Failure!");
                                    $("#response").removeClass("text-success");
                                    $("#response").addClass("text-danger");
                                    $("#response").html("Login was Unsuccessful!");
                                }
                                else{
                                    console.log(response);
                                    $("#response").removeClass("text-success");
                                    $("#response").addClass("text-danger");
                                    $("#response").html("Some exception ocurred: Check the browser's Console for more details.");
                                }
                            },
                            dataType: 'text'
                        }
                    );
                }
            });
        });
    </script>
</body>

</html>