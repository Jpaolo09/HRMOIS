//ABOUT: contains functions for the payroll page

const date = document.getElementById("date");
const error_containers = document.getElementsByClassName("error-container");
const numeric_inputs = document.getElementsByClassName("numeric-input");

//validate the edit payroll form
function validateForm()
{
    var errors = 0;

    //validate date
    if(date.value == "")
    {
        setErrorFor("date-error-container", "Please pick a date");
        errors++;
    }

    //validate numeric inputs
    for(var i = 0; i < numeric_inputs.length; i++)
    {
        if(numeric_inputs[i].value == "" || isNaN(numeric_inputs[i].value))
        {
            setErrorFor("error-" + (i+1), "Please enter a valid number or value");
            errors++;
        }
    }

    if(errors < 1)
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
    document.getElementById(id).innerHTML = "&#8226 " + msg;
}


//function to reset all previous error messages in add employee form if there are any
function resetErrors()
{
    for(i = 0; i < error_containers.length; i++)
    {
        error_containers[i].innerHTML = "";
    }
}


//function to fill the edit form with the info of selected payroll record
function getPayrollInfo(id)
{
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        const myObj = JSON.parse(this.responseText);

        document.getElementById("date").value = myObj.date;
        document.getElementById("working-hours").value = myObj.working_hours;
        document.getElementById("basic").value = myObj.basic_pay;
        document.getElementById("grosspay").value = myObj.gross_pay;
        document.getElementById("advance").value = myObj.cash_advance;
        document.getElementById("sss").value = myObj.sss;
        document.getElementById("philhealth").value = myObj.philhealth;
        document.getElementById("pagibig").value = myObj.pagibig;
        document.getElementById("others").value = myObj.others;
        document.getElementById("deductions").value = myObj.deduction;
        document.getElementById("netpay").value = myObj.net_pay;
    }
    xmlhttp.open("GET", "./src/php/pages/payroll/getpayrollinfo.php?id=" + id, true);
    xmlhttp.send();
}