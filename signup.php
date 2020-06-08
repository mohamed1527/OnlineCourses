<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/UserModel.php");
require_once(__ROOT__ . "controller/UserController.php");
//require_once(__ROOT__ . "view/bar.php");

$model = new User();
$controller = new UserController($model);
//$view = new Bar($controller, $model);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Study</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="../lib/css/animate.css">
    
    <link rel="stylesheet" href="../lib/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../lib/css/magnific-popup.css">

    <link rel="stylesheet" href="../lib/css/ionicons.min.css">
    
    <link rel="stylesheet" href="../lib/css/flaticon.css">
    <link rel="stylesheet" href="../lib/css/icomoon.css">
    <link rel="stylesheet" href="../lib/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script>
  function matching(){
    if($("#password").val() !=$("#repeatpassword").val()){
    $("#msg").html("Password do not match").css("color","red");
  }
  else{
    $("#msg").html("Password matched").css("color","green");
  }
}


    </script>
    <script>

function count(){
     var a=document.getElementById('password').value;
     var submitB=document.getElementById('register').value;
     if (a.length<8){
        alert('password must be 8 character or more');
      document.getElementById("register").disabled = true;
            }
      else
      {
         document.getElementById("register").disabled =false;

      }
          }
function ValidateEmail(e)
{

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var e=document.getElementById('email').value;
submitc=document.getElementById('register').value;
if(e.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}

    </script>
    <style>
        
        * {box-sizing: border-box;}

/* Style the input container */
.input-container {
  display: flex;
  width: 40%;
  margin-bottom: 40px;
  margin-left: 450px;
  padding-bottom:0px; 
  margin-bottom: 0px;
}
.invalid {
    border: 2px solid pink !important;
}
body {

  background-color: 
}
/* Style the form icons */
.icon {
  padding: 17px;
  background-color: #fdbe34;
  color: white;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: #00043c;
  color: #fdbe34;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
  margin-left: 450px;
}

.btn:hover {
  opacity: 1;
}
.sml{
margin-top: 0px;
margin-left: 455px;
padding-top: 0px;

}

    </style>
    
    
  </head>
  <body>
 <div class="sup"> 
<form action="index.php?action=signupController" enctype="multipart/form-data" method="post">
  
  <h2 style="margin-left: 600px;color:#00043c  ">Sign Up</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" id="inputFirstName" type="text" placeholder="First Name" name="firstname" required minlength="3" maxlength="20">
    
    
  </div>
  <div class="sml"> 
  <small  id="firstNameInvalid" class="form-text text-muted hidden">First Name is invalid.</small> 
  </div>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" id="inputLastName" type="text" placeholder="Last Name" name="lastname" required>
    
    
  </div>
  <div class="sml"> 
 <small id="firstNameInvalid" class="form-text text-muted hidden">Last Name is invalid.</small>
 </div>
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" id="inputEmail" type="email" placeholder="Email"  required>
    
  </div>
  <div class="sml"> 
 <small id="emailInvalid" class="form-text text-muted hidden">Email Address must be a valid email address, contain @ and .com/.net/etc. </small>
    <small id="emailExists" class="form-text text-muted hidden" style="color:red;">This email address is already registered.</small>
  </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" id="inputPassword" type="password" placeholder="Password" id="password" name="password" required>
    
    
  </div>
  <div class="sml"> 
  <small id="passHelp" class="form-text text-muted">Your password must be at least 8 characters long, 1 upper case letter and digit.</small>
</div>
<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" id="inputConfirmPassword" type="password" placeholder="Re-type Password" id="repeatpassword" name="repeatpassword"  required>
    
  </div>
  <div class="sml"> 
  <small id="passwordInvalid" class="form-text text-muted hidden">Your passwords must be the same.</small>
</div>
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="input-field" id="inputPhoneNumber" type="phone" placeholder="Mobile number" maxlength="11" min="0" max="9">
    
   
  </div> 
  <div class="sml">  
 <small id="phoneNumberInvalid" class="form-text text-muted hidden">Your phone number must be 11 digits only.</small>
    <small id="phoneNumberExists" class="form-text text-muted hidden"style="color:red;">This phone number is already registered.</small>
  </div>

  <button id="submitSignUp" class="btn btn-success btn-lg btn-block">Submit</button>
</form>
<div id="response"></div>
            <button type="button" id="responseButton" data-toggle="modal" data-target=".modal" hidden></button>

        </div>
</div>

 <script src="../lib/js/jquery.min.js"></script>
  <script src="../lib/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../lib/js/popper.min.js"></script>
  <script src="../lib/js/bootstrap.min.js"></script>
  <script src="../lib/js/jquery.easing.1.3.js"></script>
  <script src="../lib/js/jquery.waypoints.min.js"></script>
  <script src="../lib/js/jquery.stellar.min.js"></script>
  <script src="../lib/js/jquery.animateNumber.min.js"></script>
  <script src="../lib/js/owl.carousel.min.js"></script>
  <script src="../lib/js/jquery.magnific-popup.min.js"></script>
  <script src="../lib/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../lib/js/google-map.js"></script>
  <script src="../lib/js/main.js"></script>
  <script src="../lib/js/signup.js"></script>  
  </body>
  </html>