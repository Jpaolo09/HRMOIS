<?php
    //ABOUT: get all of the information of an employee then return it in a JSON file

    session_start();
    require_once('../../include/database.php');
    require_once('../../include/functions.php');

    $id = intval( $_GET["id"]);
    $_SESSION['SELECTED_EMPLOYEE'] = $id;

    //employee class to create an object instance that will be encoded in JSON file
    class Employee{
        public $fname;
        public $mname;
        public $lname;
        public $office;
        public $address;
        public $sex;
        public $dob;
        public $pob;
        public $telephone;
        public $email;
        public $civil_status;
        public $designation;
        public $college;
        public $branch;
        public $work_status;
        public $hired_date;
    }


    //query to get the info of an employee based on its id
    $stmt = $conn->prepare("SELECT * FROM employees WHERE EMP_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $result_assoc = $result->fetch_assoc();

    //store query results in an object
    $employee = new Employee();
    $employee->fname = $result_assoc['FNAME'];
    $employee->mname = $result_assoc['MNAME'];
    $employee->lname = $result_assoc['LNAME'];
    $employee->office = getOfficeName($result_assoc['OFFICE_ID']);
    $employee->address = $result_assoc['ADDRESS'];
    $employee->sex = $result_assoc['SEX'];
    $employee->dob = $result_assoc['DOB'];
    $employee->pob = $result_assoc['PLACE_OF_BIRTH'];
    $employee->telephone = $result_assoc['TEL_NO'];
    $employee->email = $result_assoc['EMAIL'];
    $employee->civil_status = $result_assoc['CIVIL_STATUS'];
    $employee->designation = $result_assoc['DESIGNATION'];
    $employee->college = getCollegeName($result_assoc['COLLEGE_ID']);
    $employee->branch = getCampusName($result_assoc['CAMPUS_ID']);
    $employee->work_status = $result_assoc['WORK_STATUS'];
    $employee->hired_date = $result_assoc['HIRED_DATE'];

    //encode the object into a JSON file
    $myJSON = json_encode($employee);

    //return the JSON file containing the information of the employee to the javascript
    echo $myJSON;
?>