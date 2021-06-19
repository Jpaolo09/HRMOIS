<?php
    //TODO: employee page and payroll page
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP HRMOIS | Employees</title>
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
            <h1>LIST OF EMPLOYEES</h1>
        </div>

        <div class="container-fluid mt-5 px-5">
            <table id="employee-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">DESIGNATION</th>
                        <th scope="col">WORK STATUS</th>
                        <th scope="col">TELEPHONE</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <!--MODIFY HERE-->
                    <!--<tr>
                        <td>Dr. Jesus Rodrigo F. Torres</td>
                        <td>University President</td>
                        <td>Regular</td>
                        <td>(+63 2) 8523.2293 / 5301.3001 to 61 loc 112/122</td>
                        <td>tup@tup.edu.ph</td>
                        <td>
                            <button type="button" class="btn" data-toggle="modal" data-target="#employee1-edit">Edit</button>
                            <button type="button" class="btn" data-toggle="modal" data-target="#employee1-print">Print</button>
                            <button type="button" class="btn" data-toggle="modal" data-target="#employee1-pdf">View Details</button>
                        </td>
                    </tr>-->
                    <?php require_once(PAGES_FUNC_PATH.DS.'employee'.DS.'getemployees.php')?>
                </tbody> 
            </table>

            <div>
                <button type="button" class="btn" data-toggle="modal" data-target="#create-new-employee">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;<span>Create New</span> 
                </button>
            </div>
        </div>


        <!-- EDIT EMPLOYEE -->

        <div class="modal fade" id="employee1-edit" tabindex="-1" role="dialog"aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-employee">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetEditErrors()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form id="edit-employee-form" method="POST" onsubmit="return validateEditForm()" onreset="resetEditErrors()">

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">First Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-fname" name="edit-fname">
                                            <div class="error-message">
                                                <small id="edit-fname-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">Middle Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-mname" name="edit-mname">
                                            <div class="error-message">
                                                <small id="edit-mname-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">Last Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-lname" name="edit-lname">
                                            <div class="error-message">
                                                <small id="edit-lname-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="Address">Address:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-address" name="edit-address">
                                            <div class="error-message">
                                                <small id="edit-address-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="sex">Sex:</label>
                                        </div>
                                        <div class="col d-flex">
                                            <label class="radio-inline pr-5">
                                                <input type="radio" name="edit-optradio" value="Female" checked> Female
                                            </label>
                                            <label class="radio-inline pl-5">
                                                <input type="radio" name="edit-optradio" value="Male"> Male
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="date-of-birth">Date of Birth:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="edit-dob" name="edit-dob">
                                            <div class="error-message">
                                                <small id="edit-dob-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="place-of-birth">Place of Birth:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-pob" name="edit-pob">
                                            <div class="error-message">
                                                <small id="edit-pob-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="telephone">Telephone:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-telephone" name="edit-telephone">
                                            <div class="error-message">
                                                <small id="edit-telephone-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="telephone">Email:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-email" name="edit-email">
                                            <div class="error-message">
                                                <small id="edit-email-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="civil-status">Civil Status:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="edit-civil-status" name="edit-civil-status">
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Widowed</option>
                                                <option>Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="designation">Designation:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="edit-designation" name="edit-designation">
                                            <div class="error-message">
                                                <small id="edit-designation-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="branch">Branch:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="edit-branch" name="edit-branch">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'branchdropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="edit-branch-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="office">Office:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="edit-office" name="edit-office">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'officedropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="edit-office-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="college">College:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="edit-college" name="edit-college">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'collegesdropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="edit-college-error-message" class="edit-error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="work-status">Work Status:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="edit-workstatus" name="edit-workstatus">
                                                <option>Regular</option>
                                                <option>Part-Time</option>
                                                <option>Suspended</option>
                                                <option>Resigned or Fired</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="hired-date">Hired Date:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="edit-hireddate" name="edit-hireddate">
                                            <div class="error-message">
                                                <small id="edit-hireddate-error-message" class="edit-error-container" style="color:red;"></small>
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

        <!-- CREATE NEW EMPLOYEE MODAL -->

        <div class="modal fade" id="create-new-employee" tabindex="-1" role="dialog" aria-labelledby="create-new-employee" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-new-employee-title">Create New Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetErrors()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form id="add-employee-form" action="src/php/pages/employee/addemployee.php" method="POST" onsubmit="return validateCreateForm()" onreset="resetErrors()">

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">First Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-fname" name="create-fname">
                                            <div class="error-message">
                                                <small id="create-fname-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">Middle Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-mname" name="create-mname">
                                            <div class="error-message">
                                                <small id="create-mname-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="name">Last Name:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-lname" name="create-lname">
                                            <div class="error-message">
                                                <small id="create-lname-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="Address">Address:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-address" name="create-address">
                                            <div class="error-message">
                                                <small id="create-address-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="sex">Sex:</label>
                                        </div>
                                        <div class="col d-flex">
                                            <label class="radio-inline pr-5">
                                                <input type="radio" name="create-optradio" value="Female" checked> Female
                                            </label>
                                            <label class="radio-inline pl-5">
                                                <input type="radio" name="create-optradio" value="Male"> Male
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="date-of-birth">Date of Birth:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="create-dob" name="create-dob">
                                            <div class="error-message">
                                                <small id="create-dob-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="place-of-birth">Place of Birth:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-pob" name="create-pob">
                                            <div class="error-message">
                                                <small id="create-pob-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="telephone">Telephone:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-telephone" name="create-telephone">
                                            <div class="error-message">
                                                <small id="create-telephone-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="telephone">Email:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-email" name="create-email">
                                            <div class="error-message">
                                                <small id="create-email-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="civil-status">Civil Status:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="create-civil-status" name="create-civil-status">
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Widowed</option>
                                                <option>Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="designation">Designation:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="create-designation" name="create-designation">
                                            <div class="error-message">
                                                <small id="create-designation-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="branch">Branch:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="create-branch" name="create-branch">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'branchdropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="create-branch-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="office">Office:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="create-office" name="create-office">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'officedropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="create-office-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="college">College:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="create-college" name="create-college">
                                                <option>None</option>
                                                <?php require(INCLUDE_PATH.DS.'dropdowns'.DS.'collegesdropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="create-college-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="work-status">Work Status:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="create-workstatus" name="create-workstatus">
                                                <option>Regular</option>
                                                <option>Part-Time</option>
                                                <option>Suspended</option>
                                                <option>Resigned or Fired</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="hired-date">Hired Date:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="create-hireddate" name="create-hireddate">
                                            <div class="error-message">
                                                <small id="create-hireddate-error-message" class="error-container" style="color:red;"></small>
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
    <script src="js/employee.js"></script>
    <script>
        $(document).ready(function() {
            $('#employee-table').DataTable();
        } );
    </script>
</body>
</html>