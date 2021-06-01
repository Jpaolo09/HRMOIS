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
                    <tr>
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
                    </tr>
                </tbody>     
            </table>
        </div>

        <div class="modal fade" id="employee1-payslip-edit" tabindex="-1" role="dialog"aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-payslip-title">Edit Payslip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="name" value="Dr. Jesus Rodrigo F. Torres">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="designation">Designation:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="designation" value="President">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="date">Date:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="date">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="working-hours">Working Hours:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="working-hours" value="40">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="basic">Basic Pay:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="basic" value="250">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="grosspay">Gross Pay:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="grosspay" value="10000">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="advance">Cash Advance:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="advance" value="1000">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="sss">SSS:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="sss" value="130">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="philheath">Phil Health:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="advance" value="160">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="pagibig">Pagibig:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="advance" value="1000">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="others">Others:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="advance" value="100">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="deductions">Deductions:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="deductions" value="1540">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="netpay">Netpay:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="netpay" value="8460">
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
    <script src="js/date.js"></script>
    <script>
        $(document).ready(function() {
            $('#payroll-table').DataTable();
        } );
    </script>

</body>
</html>