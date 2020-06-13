<?php 
define('__ROOT__', "../app/");
//include('app_logic.php');
require_once(__ROOT__ . "model\UserModel.php");
require_once(__ROOT__ . "controller\UserController.php");


$model = new User();
$controller = new UserController($model);

if (isset($_GET['action']) && !empty($_GET['action']))
{
  $controller->{$_GET['action']}();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/SEmvc7/lib/css/mycss.css">
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
<body>

	<form class="newpassword-form" action="index.php?action=chnagepassword" method="post">
        <h1><b>Reset Your New Password :-</b></h1>
        <hr> <br>

            <h4><b>New password</b></h4>
			<input type="password" name="password" placeholder="Enter Your New Password Here" class="form-control" id="pass" required>
            Show Password <input type="checkbox" onclick="myFunction3()"> 
            <!-- Start of Show Password -->
            <script>
                function myFunction3() 
                {
                    var x = document.getElementById("pass");
                    if (x.type === "password")
                    {
                        x.type = "text";
                    } 
                    else 
                    {
                        x.type = "password";
                    }
                }
            </script>
            <!-- End of Show Password -->

            <br>
            <h4><b>Confirm Password</b></h4>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" id="confirmpass" required >
            Show Password <input type="checkbox" onclick="myFunction4()"> 
            <!-- Start of Validation of confirm password & show confirm password-->
            <script>
                var pass = document.getElementById("pass"); 
                var confirmpass = document.getElementById("confirmpass");
                function validatePassword2()
                {
                    if(pass.value != confirmpass.value) 
                    {
                        confirmpass.setCustomValidity("Passwords Don't Match");
                    } 
                    else
                    {
                        confirmpass.setCustomValidity('');
                    }
                }
                pass.onchange = validatePassword2;
                confirmpass.onkeyup = validatePassword2;
                function myFunction4() 
                {
                    var x = document.getElementById("confirmpass");
                    if (x.type === "password")
                    {
                        x.type = "text";
                    } 
                    else 
                    {
                        x.type = "password";
                    }
                }
            </script>
            <!-- End of Validation of confirm password & show confirm password -->

            <h4><b>Your Token Number That You Received in Your mail</b></h4>
            <input type="text" name="token" class="form-control"><br>
            


			<button type="submit" name="new_password" class='btn btn-warning' style=" color:black; font-size:20px;">Submit</button>
	
	</form>
</body>
</html>
