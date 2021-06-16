//ABOUT: contains functions for the timein/timeout page

const datePicker = document.getElementById("timein-date");
const radioButtons = document.getElementsByName("radio");


//validate the form if there is no error submit the data from the form
function submitForm(){
    if(datePicker.value == '')
    {
        setMessage("Please pick a date");
        return false;
    }
    else
    {
        var date = datePicker.value;
        var op;
        for(var i = 0; i < radioButtons.length; i++)
        {
            if(radioButtons[i].checked){
                //get selected operation if timein or timeout 
                op = radioButtons[i].value;
            }
        }
        console.log(op);
        //send data to the backend
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function(){
            alert(this.responseText);
        }
        xmlhttp.open("POST", "./src/php/pages/timein/record.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("op=" + op + "&date=" + date);
    }
}


//set message
function setMessage(msg){
    document.getElementById("timein-message").innerHTML = "&#8226 " +  msg;
}

//reset message
function resetMessage()
{
    document.getElementById("timein-message").innerHTML = '';
}