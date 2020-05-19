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
     if (a.length<6){
        alert('password must be more than 5 character');
			document.getElementById("register").disabled = true;
            }
			else
			{
				 document.getElementById("register").disabled =false;

			}
          }


    </script>
    <script>

function count1(){
     var a=document.getElementById('firstname').value;
     var submitB=document.getElementById('register').value;
     if (a.length<4){
        alert('First Name must be more than 3 character');
      document.getElementById("register").disabled = true;
            }
      else
      {
         document.getElementById("register").disabled =false;

      }
          }
</script>

<script>

function count2(){
     var a=document.getElementById('last').value;
     var submitB=document.getElementById('register').value;
     if (a.length<4){
        alert('Last name field must be more than 3 character');
      document.getElementById("register").disabled = true;
            }
      else
      {
         document.getElementById("register").disabled =false;

      }
          }
</script>
<script>

function count3(){
     var a=document.getElementById('phone').value;
     var submitB=document.getElementById('register').value;
     if (a.length>11){
        alert('Phone must be  11 Number');
      document.getElementById("register").disabled = true;
            }
      else
      {
         document.getElementById("register").disabled =false;

      }
          }
</script>
    <style>
        
        * {box-sizing: border-box;}

/* Style the input container */
.input-container {
  display: flex;
  width: 50%;
  margin-bottom: 15px;
  margin-left: 300px;
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
  width: 50%;
  opacity: 0.9;
  margin-left: 300px;
}

.btn:hover {
  opacity: 1;
}
    </style>
    
    
  </head>
  <body>
  <?php
    require_once(__ROOT__ . "view/bar.php");
    $view1 = new Bar($controller, $model);
    if (isset($_SESSION['type']) && !empty($_SESSION['type'])) {
      switch($_SESSION['type']){
        case 'Admin': 
          echo $view1->AdminBar();
          break;
        case 'Teacher':
          echo $view1->TeacherBar();
          break;
        case 'Student':
          echo $view1->StudentBar();
          break;       
      }
    }
    else {
      echo $view1->NormalBar();

    }
    ?>  
<form action="index.php?action=signupController" enctype="multipart/form-data" method="post">
  <h2 style="margin-left: 570px;color:#00043c ">Sign Up</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="First Name" name="firstname">
  </div>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Last Name" name="lastname">
  </div>
 
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" id="password" name="password" onchange="count();" onkeyup="matching()">
  </div>
<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Re-type Password" id="repeatpassword" name="repeatpassword" onchange="count();" onkeyup="matching()">
    <br>
    <div id="msg" > </div>
  </div>
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Mobile number" name="phone">
  </div>
  <div class="input-container">
    <i class="fa fa-image icon"></i>
    <input type="file" name="img" accept="image/gif, image/jpeg, image/png" /><br>
  </div>  
  <button type="submit" id="register" name="register" class="btn">Register</button>
</form>



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
    
  </body>
  </html>