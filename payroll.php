<?php
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP HRMOIS | Payroll</title>
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
            <h1>PAYROLL</h1>
        </div>

        <div class="container-fluid mt-5 px-4">
            <table id="payroll-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">DESIGNATION</th>
                        <th scope="col">DATE</th>
                        <th scope="col">WORKING HOURS</th>
                        <th scope="col">BASIC PAY</th>
                        <th scope="col">GROSS PAY</th>
                        <th scope="col">CASH ADVANCE</th>
                        <th scope="col">SSS</th>
                        <th scope="col">PHILHEALTH</th>
                        <th scope="col">PAGIBIG</th>
                        <th scope="col">OTHERS</th>
                        <th scope="col">DEDUCTIONS</th>
                        <th scope="col">NET PAY</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <!--MODIFY HERE-->
                    <!--<tr>
                        <td>Juan Dela Cruz</td>
                        <td>University President</td>
                        <td id="date"></td>
                        <td>40</td>
                        <td>250</td>
                        <td>10000</td>
                        <td>1000</td>
                        <td>130</td>
                        <td>160</td>
                        <td>150</td>
                        <td>100</td>
                        <td>1540</td>
                        <td>8460</td>
                        <td>
                            <button type="button" class="btn" data-toggle="modal" data-target="#employee1-payslip-edit">Edit</button>
                            <button type="button" class="btn" data-toggle="modal" data-target="#employee1-payslip-print">Print Payslip</button>
                        </td>
                    </tr>-->
                    <?php require_once(PAGES_FUNC_PATH.DS.'payroll'.DS.'getpayrolls.php')?>
                </tbody>     
            </table>
        </div>

        <div class="modal fade" id="employee1-payslip-edit" tabindex="-1" role="dialog"aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-payslip-title">Edit Payslip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetErrors()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form action="src/php/pages/payroll/editpayroll.php" method="POST" onsubmit="return validateForm()" onreset="resetErrors()">                           
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="date">Date:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="date" name="date">
                                            <div class="error-message">
                                                <small id="date-error-container" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="working-hours">Working Hours:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="working-hours" name="working-hours" value="0">
                                            <div class="error-message">
                                                <small id="error-1" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="basic">Basic Pay:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="basic" name="basic" value="0">
                                            <div class="error-message">
                                                <small id="error-2" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="advance">Cash Advance:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="advance" name="advance" value="0">
                                            <div class="error-message">
                                                <small id="error-4" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="sss">SSS:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="sss" name="sss" value="0">
                                            <div class="error-message">
                                                <small id="error-5" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="philheath">Phil Health:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="philhealth" name="philhealth" value="0">
                                            <div class="error-message">
                                                <small id="error-6" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="pagibig">Pagibig:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="pagibig" name="pagibig" value="0">
                                            <div class="error-message">
                                                <small id="error-7" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="others">Others:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary numeric-input" id="others" name="others" value="0">
                                            <div class="error-message">
                                                <small id="error-8" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="add-emp-buttons text-center w-100 pt-5">
                                    <div class="modal-footer d-flex justify-content-around">
                                        <button type="reset" class="btn">Clear</button>
                                        <button type="submit" class="btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/payroll.js"></script>
    <script>
        $(document).ready(function() {
            $('#payroll-table').DataTable();
        } );
    </script>

</body>
</html>