<!--
    SECTION: BSIT-3A

    DEVELOPERS:
        Product Manager/Frontend Developer:
            Jefferson Salvador
        Backend Developer:
            Jan Paolo Cortez
        Database Administrator:
            Ancess Condeza
        Quality Assurance:
            Vince Salvador
-->

<?php
    require_once('src/php/include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Look for career opportunities at Technological University of the Philippines.">
    <title>TUP HRMOIS | Career Opportunities</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
            <h1>CAREER OPPORTUNITIES</h1>
        </div>

        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">POSITION</th>
                        <th scope="col">SALARY GRADE</th>
                        <th scope="col">NO. OF VACANCIES</th>
                        <th scope="col">OFFICE CAMPUS</th>
                        <th scope="col">DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <!--MODIFY HERE-->
                    <?php require_once(PAGES_FUNC_PATH.DS.'homepage'.DS.'getcareers.php')?>
                </tbody>
            </table>
            <div>
                <?php
                    //show "create new" button if the logged in user is an hr staff
                    if(User::isHumanResource())
                    {
                        echo"<button type='button' class='btn' data-toggle='modal' data-target='#create-new-career'>
                                <i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;<span>Create New</span> 
                            </button>";
                    }
                ?>
            </div>
        </div>
        <div class="modal fade" id="career1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="career1-title">None</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Position</th>
                                    <td id="position-name">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Office</th>
                                    <td id="position-office">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Campus</th>
                                    <td id="position-campus">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Number of Vacancies</th>
                                    <td id="position-vacancy">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Salary Grade</th>
                                    <td id="position-salarygrade">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Item Number</th>
                                    <td id="position-itemnumber">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Qualification</th>
                                    <td id="position-qualification">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Experience</th>
                                    <td id="position-experience">None </td>
                                </tr>
                                <tr>
                                    <th scope="row">Training</th>
                                    <td id="position-training">None</td>
                                </tr>
                                <tr>
                                    <th scope="row">Eligibility</th>
                                    <td id="position-eligibility">None</td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <p>
                                Interested and qualified applicants should signify their interest in writing. Attach the following documents to the application letter and send to the address below not later than <b id="position-deadline">None</b>.
                                <br><br>
                                <ol id="position-requirements">
                                    <!--<li>Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph;</li> 
                                    <li>Performance rating in the <b>last rating period</b> (if applicable);</li> 
                                    <li>Photocopy of certificate of eligibility/rating/license; and</li> 
                                    <li>Photocopy of Transcript of Records.</li>--> 
                                </ol>
                                <br><br>
                                <b>QUALIFIED APPLICANTS</b> are advised to hand in or send through courier/email their application to:
                                <br><br>
                                <b>ATTY. CHRISTOPHER M. MORTEL</b><br>
                                <i>Supervising Administrative Officer</i>
                                <br><br>
                                Ayala Boulevard Ermita, Manila, 1000 <br>
                                hrmo@tup.edu.ph
                                <br><br>
                                APPLICATIONS WITH INCOMPLETE DOCUMENTS SHALL NOT BE ENTERTAINED.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="create-new-career" tabindex="-1" role="dialog" aria-labelledby="create-new-career" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-new-career-title">Create New Career Opportunity</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetErrors()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form id="add-career-form" action="src/php/pages/homepage/addcareer.php" method="POST" onsubmit="return validateForm()" onreset="resetErrors()">

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="position">Position:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="position" name="position">
                                            <div class="error-message">
                                                <small id="position-error-message" class="error-container" style="color:red;"></small>
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
                                            <select class="form-control border-secondary" id="office" name="office">
                                                <option>None</option>
                                                <?php require_once(INCLUDE_PATH.DS.'dropdowns'.DS.'officedropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="office-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="campus">Campus:</label>
                                        </div>
                                        <div class="col">
                                            <select class="form-control border-secondary" id="campus" name="campus">
                                                <option>None</option>
                                                <?php require_once(INCLUDE_PATH.DS.'dropdowns'.DS.'branchdropdown.php');?>
                                            </select>
                                            <div class="error-message">
                                                <small id="campus-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="vacancies">No. of Vacancies:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="vacancies" name="vacancies">
                                            <div class="error-message">
                                                <small id="vacancies-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="salary-grade">Salary Grade:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="salary-grade" name="salarygrade">
                                            <div class="error-message">
                                                <small id="salarygrade-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="item-number">item Number:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="item-number" name="itemnumber">
                                            <div class="error-message">
                                                <small id="itemnumber-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="qualification">Qualification:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="qualification" name="qualification">
                                            <div class="error-message">
                                                <small id="qualification-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="experience">Experience:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="experience" name="experience">
                                            <div class="error-message">
                                                <small id="experience-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="training">Training:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="training" name="training">
                                            <div class="error-message">
                                                <small id="training-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="eligibility">Eligibility:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border-secondary" id="eligibility" name="eligibility">
                                            <div class="error-message">
                                                <small id="eligibility-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="deadlline">Deadline:</label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control border-secondary" id="deadline" name="deadline">
                                            <div class="error-message">
                                                <small id="deadline-error-message" class="error-container" style="color:red;"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4 px-5 d-flex justify-content-end">
                                            <label for="requirement">List of Requirements:</label>
                                        </div>
                                        <div class="col">
                                            <textarea class="form-control" id="requirements" rows="3" name="requirements" placeholder="Please separate the requirements with numbers (ex: 1.First Requirement 2.Second Requirement)."></textarea>
                                            <div class="error-message">
                                                <small id="requirements-error-message" class="error-container" style="color:red;"></small>
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

    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>