var login = document.getElementById("loginbtn");
        var login_backup = document.getElementById("loginbtn-backup");
        var lform = document.getElementById("login-form");

        var signup = document.getElementById("signupbtn");
        var signup_backup = document.getElementById("signupbtn-backup");
        var sform = document.getElementById("signup-form");

        var modal = document.querySelector(".modal");
        var modalC = document.querySelector(".modal-content");
        var close = document.getElementById("close-modal");
        var i = document.getElementById("i");
        var closeNav = document.getElementById("close-navbar");


        var closeNav = document.getElementById("close-navbar");
        login_backup.onclick = function() {
            lform.style.display = "block";
            sform.style.display = "none";
            modal.style.display = "block";
            navElements.style.marginLeft = "-1500px";
        }

        login.onclick = function() {
            lform.style.display = "block";
            sform.style.display = "none";
            modal.style.display = "block";
        }

        signup_backup.onclick = function() {
            sform.style.display = "block";
            lform.style.display = "none";
            modal.style.display = "block";
            navElements.style.marginLeft = "-1500px";
        }

        signup.onclick = function() {
            sform.style.display = "block";
            lform.style.display = "none";
            modal.style.display = "block";
        }
        var navElements = document.querySelector(".navbar");
        i.onclick = function() {
            navElements.style.marginLeft = "0px";
        }
        closeNav.onclick = function() {
            navElements.style.marginLeft = "-1500px";
        }

        close.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modalC) {
                modal.style.display = "none";
            }
        }

//navbar search
var searchbar = document.querySelector(".search-bar");
searchbar.onmouseover = function(){
  navElements.style.display="none"
}
searchbar.onmouseout = function(){
  navElements.style.display="block"
}


// sign up validation
function validateForm()
{
var name = document.forms["signup"]["name"];
var email = document.forms["signup"]["email"];
var password = document.forms["signup"]["password"];
var confirmp = document.forms["signup"]["confirmp"];
var posp = email.value.indexOf(".");
var posat = email.value.indexOf("@");
var lastposp = email.value.lastIndexOf(".");
var countat = email.value.split("@").length-1;

if(name.value =="")
{
document.getElementById("errorf").innerHTML="Invalid name ...";
name.focus();
return false;
}
else
{
document.getElementById("errorf").innerHTML="";  
}

if(posp<1 || posat<1 || (lastposp-posat)<2 || lastposp==email.value.length-1 || countat !=1)
{
    document.getElementById("errore").innerHTML="Invalid email ...";
    email.focus();
    return false;
}
else
{
    document.getElementById("errore").innerHTML="";  
}
if(password.value =="")
{
document.getElementById("errorpa").innerHTML="Type a password ...";
password.focus();
return false;
}
else
{
document.getElementById("errorpa").innerHTML="";  
}
if(confirmp.value != password.value){
  document.getElementById("errorp").innerHTML="Password is not matched ...";
  confirmp.focus();
  return false;
}
else
{
  document.getElementById("errorp").innerHTML="";
}
}
