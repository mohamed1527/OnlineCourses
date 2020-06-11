<?php
  include "database.php";

  session_start();

class user {

 public $email;
  public $password;  
  function __construct($email) {
    $this->email = $email;
	$this->password = $password;
  }
  function get_email() {
    return $this->email;
  }
  
 
  function get_password() {
    return $this->password;
  }

static function login($mysqli){
  
	$email=$_POST['email'];
	$password=$_POST['password'];
	
$sql = "SELECT email, password , ID FROM User where email='$email' AND password='$password'";

$result = mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);

//$userID = "SELECT UserType FROM User_Type_Info INNER JOIN User_Type_Info ON User.ID='".$row['ID']."'";

if (!empty($row)){
  //$id = $row['ID'];
  //$userID = "SELECT ID FROM User WHERE Email='$email'";
  $userID = "SELECT UserType FROM User_Type_Info where User_Id='".$row['ID']."'";
  $result = mysqli_query($mysqli,$userID);
  $row1=mysqli_fetch_array($result);
  
  if (!empty($row1)){
  //$userID='Admin';
if($row1['UserType']=='Student'){
    $_SESSION['type']=1;
  }
if($row1['UserType']=='Teacher'){
    $_SESSION['type']=2;
  }
if($row1['UserType']=='Admin'){
    $_SESSION['type']=3;
  }

echo" login successfully";
header("Location:index.php");
echo"$userID";
//echo"$id";
}

else{
echo "Invalid Email or Password or still not accepted";
}	

}

}
}
if (isset($_POST['login'])){
user::login($mysqli);


}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Study</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
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

<form action="login.php" method="post">
  <h2 style="margin-left: 570px;color:#00043c ">Login</h2>
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email">
  </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>
 <a style="margin-left:300px;" href="#">Forget Password?</a>
 <a style="margin-left: 335px;" href="signup.php">Don't Have Account?</a>
 <br>
 
  <button type="submit" name="login" class="btn">Login</button>
</form>

 <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
  </html>