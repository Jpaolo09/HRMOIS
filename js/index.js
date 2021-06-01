//ABOUT: contains functions for the homepage

//get all of the form input fields
const position = document.getElementById("position");
const office = document.getElementById("office");
const campus = document.getElementById("campus");
const vacancies = document.getElementById("vacancies");
const salary_grade = document.getElementById("salary-grade");
const item_number = document.getElementById("item-number");
const qualification = document.getElementById("qualification");
const experience = document.getElementById("experience");
const training = document.getElementById("training");
const eligibility = document.getElementById("eligibility");
const deadline = document.getElementById("deadline");
const requirements = document.getElementById("requirements");

var error_containers = document.getElementsByClassName("error-container");

//function to validate the form for adding career
function validateForm()
{
    var error_count = 0;

    //reset previous errors
    resetErrors();

    //validate position
    if(position.value == "")
    {
        setErrorFor("position", "Position cannot be blank");
        error_count++;
    }

    //validate office
    if(office.value == "")
    {
        setErrorFor("office", "Office cannot be blank");
        error_count++;
    }

    //validate campus
    if(campus.value == "")
    {
        setErrorFor("campus", "Campus cannot be blank");
        error_count++;
    }

    //validate vacancies
    if(vacancies.value == "")
    {
        setErrorFor("vacancies", "Vacancies cannot be blank");
        error_count++;
    }
    else if(isNaN(vacancies.value))
    {
        setErrorFor("vacancies", "Please enter a valid number");
        error_count++;
    }
    else if(salary_grade.value < 0)
    {
        setErrorFor("vacancies", "Please enter a valid number");
        error_count++;
    }

    //validate salary grade
    if(salary_grade.value == "")
    {
        setErrorFor("salarygrade", "Salary grade cannot be blank");
        error_count++;
    }
    else if(isNaN(salary_grade.value))
    {
        setErrorFor("salarygrade", "Please enter a valid number");
        error_count++;
    }
    else if(salary_grade.value < 0)
    {
        setErrorFor("salarygrade", "Please enter a valid number");
        error_count++;
    }

    //validate item number
    if(item_number.value == "")
    {
        setErrorFor("itemnumber", "Item number cannot be blank");
        error_count++;
    }

    //validate qualification
    if(qualification.value == "")
    {
        setErrorFor("qualification", "Qualification cannot be blank");
        error_count++;
    }

    //validate experience
    if(experience.value == "")
    {
        setErrorFor("experience", "Experience cannot be blank");
        error_count++;
    }

    //validate training
    if(training.value == "")
    {
        setErrorFor("training", "Training cannot be blank");
        error_count++;
    }

    //validate eligibility
    if(eligibility.value == "")
    {
        setErrorFor("eligibility", "Eligibility cannot be blank");
        error_count++;
    }

    //validate deadline
    if(deadline.value == "")
    {
        setErrorFor("deadline", "Please select a date");
        error_count++;
    }

    //validate requirements
    if(requirements.value == "")
    {
        setErrorFor("requirements", "Requirements cannot be blank");
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