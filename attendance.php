<?php
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP HRMOIS | Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="icon" href="./images/logo.svg">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid wrapper">
        <div class="container-fluid p-0">
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

        <div class="container text-center mt-5">
            <h1>ATTENDANCE TABLE</h1>
        </div>

        <div class="container mt-5 px-5">
            
            <table id="attendance-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">DATE</th>
                        <th scope="col">TIME IN</th>
                        <th scope="col">TIME OUT</th>
                    </tr>
                </thead>
                <tbody>
                    <!--MODIFY HERE-->
                    <tr>
                        <td>Dr. Jesus Rodrigo F. Torres</td>
                        <td id="date"></td>
                        <td>8:00am</td>
                        <td>5:00pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/date.js"></script>
    <script>
        $(document).ready(function() {
            $('#attendance-table').DataTable();
        } );
    </script>

</body>
</html>