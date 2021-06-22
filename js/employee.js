//ABOUT: contains functions for the employee page

//get all of the create new employee form input fields
const new_fname = document.getElementById("create-fname");
const new_mname = document.getElementById("create-mname");
const new_lname = document.getElementById("create-lname");
const new_address = document.getElementById("create-address");
const new_date_of_birth = document.getElementById("create-dob");
const new_place_of_birth = document.getElementById("create-pob");
const new_telephone = document.getElementById("create-telephone");
const new_email = document.getElementById("create-email");
const new_designation = document.getElementById("create-designation");
const new_branch = document.getElementById("create-branch");
const new_office = document.getElementById("create-office");
const new_college = document.getElementById("create-college");
const new_hired_date = document.getElementById("create-hireddate");
const new_password = document.getElementById("create-pass");

//get all of the edit employee form input fields
const edit_fname = document.getElementById("edit-fname");
const edit_mname = document.getElementById("edit-mname");
const edit_lname = document.getElementById("edit-lname");
const edit_address = document.getElementById("edit-address");
const edit_date_of_birth = document.getElementById("edit-dob");
const edit_place_of_birth = document.getElementById("edit-pob");
const edit_telephone = document.getElementById("edit-telephone");
const edit_email = document.getElementById("edit-email");
const edit_designation = document.getElementById("edit-designation");
const edit_branch = document.getElementById("edit-branch");
const edit_office = document.getElementById("edit-office");
const edit_college = document.getElementById("edit-college");
const edit_hired_date = document.getElementById("edit-hireddate");
const edit_password = document.getElementById("edit-pass");

var error_containers = document.getElementsByClassName("error-container");
var edit_error_containers = document.getElementsByClassName("edit-error-container");
var letters = /^[A-Za-z .]+$/;
var re_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var re_pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

//function to validate the form for adding employee
function validateCreateForm()
{
    var error_count = 0;

    //reset previous errors
    resetErrors();

    //validate first name
    if(new_fname.value =="")
    {
        setErrorFor("create-fname", "First name cannot be blank");
        error_count++;
    }
    else if(!new_fname.value.match(letters))
    {
        setErrorFor("create-fname", "First name cannot contain special characters or numbers");
        error_count++;
    }

    //validate middle name
    if(new_mname.value =="")
    {
        setErrorFor("create-mname", "Middle name cannot be blank");
        error_count++;
    }
    else if(!new_mname.value.match(letters))
    {
        setErrorFor("create-mname", "Middle name cannot contain special characters or numbers");
        error_count++;
    }

    //validate last name
    if(new_lname.value =="")
    {
        setErrorFor("create-lname", "Last name cannot be blank");
        error_count++;
    }
    else if(!new_lname.value.match(letters))
    {
        setErrorFor("create-lname", "Last name cannot contain special characters or numbers");
        error_count++;
    }

    //validate address
    if(new_address.value == "")
    {
        setErrorFor("create-address", "Address cannot be blank");
        error_count++;
    }

    //validate date of birth
    if(new_date_of_birth.value == "")
    {
        setErrorFor("create-dob", "Please select a date");
        error_count++;
    }

    //validate place of birth
    if(new_place_of_birth.value == "")
    {
        setErrorFor("create-pob", "Place of birth cannot be blank");
        error_count++;
    }

    //validate telephone
    if(new_telephone.value == "")
    {
        setErrorFor("create-telephone", "Telephone cannot be blank");
        error_count++;
    }

    //validate email
    if(new_email.value == "")
    {
        setErrorFor("create-email", "Email cannot be blank");
        error_count++;
    }
    else if(!new_email.value.match(re_email))
    {
        setErrorFor("create-email", "Please enter a valid email");
        error_count++;
    }

    //validate designation
    if(new_designation.value == "")
    {
        setErrorFor("create-designation", "Designation cannot be blank");
        error_count++;
    }

    //validate branch
    if(new_branch.value == "None")
    {
        setErrorFor("create-branch", "Please select a branch");
        error_count++;
    }
    
    //validate office
    if(new_office.value == "None")
    {
        setErrorFor("create-office", "Please select an office");
        error_count++;
    }

    //validate college
    if(new_college.value == "None")
    {
        setErrorFor("create-college", "Please select a College");
        error_count++;
    }

    //validate hired date
    if(new_hired_date.value == "")
    {
        setErrorFor("create-hireddate", "Please select a date");
        error_count++;
    }

    //validate password
    if(new_password.value == "")
    {
        setErrorFor("create-pass", "Password cannot be blank");
        error_count++;
    }
    else if(!new_password.value.match(re_pass))
    {
        setErrorFor("create-pass", "Password must be at least 6 characters and contain at least one numeric digit, one uppercase and one lowercase letter");
        error_count++;
    }

    if(error_count < 1)
    {
        return confirm("Do you really want to save the following data?");
    }
    else
    {
        return false;
    }
}


//function to validate the form for editing employee
function validateEditForm()
{
    var error_count = 0;

    //reset previous errors
    resetEditErrors();

    //validate first name
    if(edit_fname.value =="")
    {
        setErrorFor("edit-fname", "First name cannot be blank");
        error_count++;
    }
    else if(!edit_fname.value.match(letters))
    {
        setErrorFor("edit-fname", "First name cannot contain special characters or numbers");
        error_count++;
    }

    //validate middle name
    if(edit_mname.value =="")
    {
        setErrorFor("edit-mname", "Middle name cannot be blank");
        error_count++;
    }
    else if(!edit_mname.value.match(letters))
    {
        setErrorFor("edit-mname", "Middle name cannot contain special characters or numbers");
        error_count++;
    }

    //validate last name
    if(edit_lname.value =="")
    {
        setErrorFor("edit-lname", "Last name cannot be blank");
        error_count++;
    }
    else if(!edit_lname.value.match(letters))
    {
        setErrorFor("edit-lname", "Last name cannot contain special characters or numbers");
        error_count++;
    }

    //validate address
    if(edit_address.value == "")
    {
        setErrorFor("edit-address", "Address cannot be blank");
        error_count++;
    }

    //validate date of birth
    if(edit_date_of_birth.value == "")
    {
        setErrorFor("edit-dob", "Please select a date");
        error_count++;
    }

    //validate place of birth
    if(edit_place_of_birth.value == "")
    {
        setErrorFor("edit-pob", "Place of birth cannot be blank");
        error_count++;
    }

    //validate telephone
    if(edit_telephone.value == "")
    {
        setErrorFor("edit-telephone", "Telephone cannot be blank");
        error_count++;
    }

    //validate edit email
    if(edit_email.value == "")
    {
        setErrorFor("edit-email", "Email cannot be blank");
        error_count++;
    }
    else if(!edit_email.value.match(re_email))
    {
        setErrorFor("edit-email", "Please enter a valid email");
        error_count++;
    }

    //validate designation
    if(edit_designation.value == "")
    {
        setErrorFor("edit-designation", "Designation cannot be blank");
        error_count++;
    }

    //validate branch
    if(edit_branch.value == "None")
    {
        setErrorFor("edit-branch", "Please select a branch");
        error_count++;
    }
    
    //validate office
    if(edit_office.value == "None")
    {
        setErrorFor("edit-office", "Please select an office");
        error_count++;
    }

    //validate college
    if(edit_college.value == "None")
    {
        setErrorFor("edit-college", "Please select a College");
        error_count++;
    }

    //validate hired date
    if(edit_hired_date.value == "")
    {
        setErrorFor("edit-hireddate", "Please select a date");
        error_count++;
    }

    //validate password
    if(!edit_password.value == "")
    {
        if(!edit_password.value.match(re_pass))
        {
            setErrorFor("edit-pass", "Password must be at least 6 characters and contain at least one numeric digit, one uppercase and one lowercase letter");
            error_count++;
        }
    }


    if(error_count < 1)
    {
        return confirm("Do you really want to save the following changes?");
    }
    else
    {
        return false;
    }
}


//function used to set error messages
function setErrorFor(id, msg)
{
    document.getElementById(id + "-error-message").innerHTML = "&#8226 " + msg;
}


//function to reset all previous error messages in add employee form if there are any
function resetErrors()
{
    console.log("resetting add errors");
    for(i = 0; i < error_containers.length; i++)
    {
        error_containers[i].innerHTML = "";
    }
}

//function to reset all previous error in edit employee form messages if there are any
function resetEditErrors()
{
    console.log("resetting edit errors");
    for(i = 0; i < edit_error_containers.length; i++)
    {
        edit_error_containers[i].innerHTML = "";
    }
}


//function to fill the edit form with the info of selected employee record
function getEmployeeInfo(id)
{
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        const myObj = JSON.parse(this.responseText);

        document.getElementById("edit-fname").value = myObj.fname;
        document.getElementById("edit-mname").value = myObj.mname;
        document.getElementById("edit-lname").value = myObj.lname;
        document.getElementById("edit-fname").value = myObj.fname;
        document.getElementById("edit-address").value = myObj.address;
        
        var edit_optradio = document.getElementsByClassName("edit-optradio");
        
        for(var i = 0; i < edit_optradio.length; i++)
        {
            if(myObj.sex == edit_optradio[i].value.toUpperCase()){
                edit_optradio[i].checked = true;
            }
        }

        document.getElementById("edit-dob").value = myObj.dob;
        document.getElementById("edit-pob").value = myObj.pob;
        document.getElementById("edit-telephone").value = myObj.telephone;
        document.getElementById("edit-email").value = myObj.email;
        document.getElementById("edit-civil-status").value = myObj.civil_status.charAt(0) + myObj.civil_status.slice(1).toLowerCase();
        document.getElementById("edit-designation").value = myObj.designation;
        document.getElementById("edit-telephone").value = myObj.telephone;
        document.getElementById("edit-branch").value = myObj.branch;
        document.getElementById("edit-office").value = myObj.office;
        document.getElementById("edit-telephone").value = myObj.telephone;
        document.getElementById("edit-college").value = myObj.college;
        document.getElementById("edit-telephone").value = myObj.telephone;
        document.getElementById("edit-workstatus").value = myObj.work_status.charAt(0) + myObj.work_status.slice(1).toLowerCase();
        document.getElementById("edit-hireddate").value = myObj.hired_date;
    }
    xmlhttp.open("GET", "./src/php/pages/employee/getemployeeinfo.php?id=" + id, true);
    xmlhttp.send();
}