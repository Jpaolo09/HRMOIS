//ABOUT: contains functions for the employee page

//get all of the create new employee form input fields
const new_name = document.getElementById("new-name");
const new_address = document.getElementById("new-address");
const new_date_of_birth = document.getElementById("new-dob");
const new_place_of_birth = document.getElementById("new-pob");
const new_telephone = document.getElementById("new-telephone");
const new_designation = document.getElementById("new-designation");
const new_office = document.getElementById("new-office");
const new_college = document.getElementById("new-college");
const new_hired_date = document.getElementById("new-hireddate");

var error_containers = document.getElementsByClassName("error-container");
var letters = /^[A-Za-z]+$/;

//function to validate the form for adding career
function validateForm()
{
    var error_count = 0;

    //reset previous errors
    resetErrors();

    //validate name
    if(new_name.value =="")
    {
        setErrorFor("new-name", "Name cannot be blank");
        error_count++;
    }
    else if(!new_name.value.match(letters))
    {
        setErrorFor("new-name", "Name cannot contain special characters or numbers");
        error_count++;
    }

    //validate address
    if(new_address.value == "")
    {
        setErrorFor("new-address", "Address cannot be blank");
        error_count++;
    }

    //validate date of birth
    if(new_date_of_birth.value == "")
    {
        setErrorFor("new-dob", "Please select a date");
        error_count++;
    }

    //validate place of birth
    if(new_place_of_birth.value == "")
    {
        setErrorFor("new-pob", "Place of birth cannot be blank");
        error_count++;
    }

    //validate telephone
    if(new_telephone.value == "")
    {
        setErrorFor("new-telephone", "Telephone cannot be blank");
        error_count++;
    }

    //validate designation
    if(new_designation.value == "")
    {
        setErrorFor("new-designation", "Designation cannot be blank");
        error_count++;
    }
    
    //validate office
    if(new_office.value == "None")
    {
        setErrorFor("new-office", "Please select an office");
        error_count++;
    }

    //validate college
    if(new_college.value == "None")
    {
        setErrorFor("new-college", "Please select a College");
        error_count++;
    }

    //validate hired date
    if(new_hired_date.value == "")
    {
        setErrorFor("new-hireddate", "Please select a date");
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

//function used to set error messages
function setErrorFor(id, msg)
{
    document.getElementById(id + "-error-message").innerHTML = "&#8226 " + msg;
}


//function to reset all previous error messages if there are any
function resetErrors()
{
    for(i = 0; i < error_containers.length; i++)
    {
        error_containers[i].innerHTML = "";
    }
}


//functionto reset the form
function clear(form)
{
    document.getElementById(form).reset();
}