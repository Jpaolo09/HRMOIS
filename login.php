<?php
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP HRMOIS | Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./images/logo.svg">
</head>
<body>
    <div class="container-fluid wrapper">
        <div class="container-fluid p-0" id="login-content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php"><img src="./images/logo.svg" alt="" id="navbar-logo"></a>
                <div class="w-100 text-center text-light">
                    <h1>TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES</h1>
                    <small>Human Resources Management Office Information System</small>
                </div>
                
            </nav>
        </div>
        <div class="container py-5 w-100 text-center">
            <h1>LOGIN</h1>
        </div>
        <div class="d-flex align-items-center" id="login-form-container">
            <div class="p-4 container align-self-center border" id="login-form">
                <form action="" method="POST">
                    <div id="error">
                        <p id = "errorMsg"></p>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center px-3">
                            <i class="fa fa-user mr-3" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="d-flex align-items-center px-3">
                            <i class="fa fa-lock mr-3" aria-hidden="true"></i>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="forget">
                            <a href="wip.html"><i>Forgot password?</i></a>
                        </div>
                    </div> <br>
                    <div class="d-flex justify-content-around">
                        <button type="reset" id="login-reset-button" class="btn">CLEAR</button>
                        <!-- change this to type=submit -->
                        <button type="submit" id="login-submit-button" name="btnLogin" class="btn">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>  

    </div>

    <script src="js/login.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if(isset($_POST["btnLogin"]))
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        if($username == '' or $password =='')
        {
            echo "<script> document.getElementById('errorMsg').innerHTML = 'Invalid username or password'; </script>";
        }
        else
        {
            $user = new User();
            $result = $user::AuthenticateUser($username, $password);

            if($result == true)
            {
                header('location: index.php');
                die();
            }
            else
            {
                echo "<script> document.getElementById('errorMsg').innerHTML = 'Invalid username or password'; </script>";
            }
        }
    }
?>