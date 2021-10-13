<?php
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Employee time in/time out for Technological University of the Philippines">
    <title>TUP HRMOIS | timein</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./images/logo.svg">
</head>
<body>
    <div class="container-fluid wrapper">
        <div class="container-fluid p-0" id="login-content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index"><img src="./images/logo.svg" alt="" id="navbar-logo"></a>
                <div class="d-xl-block d-none text-light">
                    <h1>TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES</h1>
                    <small>Human Resources Management Office Information System</small>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <?php require_once(INCLUDE_PATH.DS.'navlinks.php'); ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-5 w-100 text-center">
            <h1>TIME IN</h1>
        </div>
        <div class="d-flex align-items-center" id="timein-form-container">
            <div class="p-4 container align-self-center border" id="timein-form">
                <form method="POST" onsubmit="return submitForm();" onreset="resetMessage();">
                    <div class="form-group">
                        <div class="d-flex justify-content-center align-items-center px-3 ">
                            <label class="radio-inline pr-5">
                                <input type="radio" name="radio" value="timein" checked> Time In
                            </label>
                            <label class="radio-inline pl-5">
                                <input type="radio" name="radio" value="timeout"> Time Out
                            </label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="d-flex align-items-center px-3">
                            <label for="timein-date" class="mr-2">Date:</label>
                            <input type="date" class="form-control" id="timein-date" placeholder="date">
                        </div>
                        <div class="error-message pl-5">
                            <small id="timein-message" class="error-container pl-3" style="color:red;"></small>
                        </div>
                    </div> <br>
                    <div class="d-flex justify-content-around">
                        <button type="reset" class="btn">CLEAR</button>
                        <button type="submit" class="btn">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>  

    </div>


    <script src="js/timein.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>