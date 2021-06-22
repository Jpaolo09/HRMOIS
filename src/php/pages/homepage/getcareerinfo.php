<?php
    //ABOUT: get all of the information of a certain career/position then return it in a JSON file

    require_once('../../include/database.php');
    require_once('../../include/functions.php');

    $id = intval( $_GET["id"]);
    $month_names = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    //career class to create an object instance that will be encoded in JSON file
    class Career{
        public $position;
        public $office;
        public $campus;
        public $vacancies;
        public $salarygrade;
        public $qualification;
        public $experience;
        public $training;
        public $eligibility;
        public $deadline;
        public $requirements;
    }


    //query to get the info of a career based on its id
    $stmt = $conn->prepare("SELECT * FROM position WHERE POS_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $result_assoc = $result->fetch_assoc();
    
    //store query results in an object
    $myObj = new Career();
    $myObj->position = $result_assoc['POSITION'];
    $myObj->office = getOfficeName($result_assoc['OFFICE_ID']);
    $myObj->campus = getCampusName($result_assoc['CAMPUS_ID']);
    $myObj->vacancies = $result_assoc['NUM_OF_VACANCIES'];
    $myObj->salarygrade = $result_assoc['SALARY_GRADE'];
    $myObj->itemnumber = $result_assoc['ITEM_NUM'];
    $myObj->qualification = $result_assoc['QUALIFICATION'];
    $myObj->experience = $result_assoc['EXPERIENCE'];
    $myObj->training = $result_assoc['TRAINING'];
    $myObj->eligibility = $result_assoc['ELIGIBILITY'];

    //process deadline to convert it in the following format (e.g. January 1, 2021)
    $date = $result_assoc['DEADLINE'];
    $date_bits = explode('-', $date);
    $month = $month_names[intval($date_bits[1]) - 1];
    $day = $date_bits[2];
    $year = $date_bits[0];
    $myObj->deadline = $month.' '.$day.', '.$year;

    //use regular expression matching to separate requirements by number, if the requirements are not numbered return the whole string
    $requirements_bits;
    if(preg_match('/[0-9]+\./', $result_assoc['REQ']))
    {
        $requirements_bits = preg_split('/[0-9]+\./', $result_assoc['REQ']);
        array_shift($requirements_bits);
    }
    else
    {
        $requirements_bits = array($result_assoc['REQ']);
    }
    
    $myObj->requirements = $requirements_bits;

    //encode the object into a JSON file
    $myJSON = json_encode($myObj);

    //return the JSON file containing the information of the requirements to the javascript
    echo $myJSON;
?>