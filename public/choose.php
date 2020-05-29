<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/TeacherModel.php");
require_once(__ROOT__ . "controller/TeacherController.php");
require_once(__ROOT__ . "view/ViewTeacher.php");

$model = new Teacher();
$controller = new TeacherController($model);
$view = new ViewTeacher($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}

if(isset($_POST['submit']))	{
	$name1=$_REQUEST["name1"];
    $name2=$_REQUEST["name2"];
	$sql = " SELECT * FROM user where FirstName='$name1' and LastName='$name2' ";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["ID"]=$row["Teacher_ID"];
        $_SESSION["FirstName"]=$row["FirstName"];
        $_SESSION["LastName"]=$row["LastName"];
		header("Location:profile.php");
	}
}

?>

<form action="choose.php" method="post">
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../lib/css/amr.css">



</head>
<body>


<div class="nos">
<h2 style="text-align:center">Choose Teacher</h2>
	  <div class="card">

        <div><input type="text" name="name1" placeholder="Enter first name"/></div><br>
		<div><input type="text" name="name2" placeholder="Enter last name"/></div><br>
		 <br><br>
  
		 <div><input type="submit" name="submit"/></div>
      </div>
    
</div>


</body>
</html>

</form>


































