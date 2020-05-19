<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/TeacherModel.php");
  require_once(__ROOT__ . "controller/TeacherController.php");
  //require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Teacher();
  $controller = new TeacherController($model);
 // $view = new ViewTable($controller, $model);

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
<form  method = "post" action="editTeacherAccount.php?action=EditTeacherAccount">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Career</th>
                <th>Experience</th>
                <th>Edit</th>
              </tr>
          </thead>
          <tbody>
          <tr>   
    <td><?php echo $_SESSION['ID'];?></td>
     
    <td><input type="text"  id="FirstName" placeholder="Enter First name" name="FirstName" value="<?php echo $_SESSION['FirstName'];?>"></td>
    <td><input type="text"  id="LastName" placeholder="Enter Last name" name="LastName" value="<?php echo $_SESSION['LastName'];?>"></td>
    <td><input type="email"  id="Email" placeholder="Enter Email" name="Email" value="<?php echo $_SESSION['email'];?>"></td> 
    <td><input type="text"  id="Password" placeholder="Enter Password" name="Password" value="<?php echo $_SESSION['password'];?>"></td>
    <td><input type="text"  id="Phone" placeholder="Enter Phone Number" name="Phone" value="<?php echo $_SESSION['Phone'];?>"></td>
    <td><input type="file"  id="Image" placeholder="Choose Image" name="Image" accept="image/gif, image/jpeg, image/png" value="<?php echo $_SESSION['Image'];?>"></td>
    <td><input type="text"  id="Career" placeholder="Enter Career" name="Career" value="<?php echo $_SESSION['Career'];?>"></td>
    <td><input type="text"  id="Experience" placeholder="Enter Experience" name="Experience" value="<?php echo $_SESSION['Experience'];?>"></td>
    <td> <button type="submit" class="btn btn-default">Are you sure to edit ? </button> </td>
    <td><input type="hidden" name="id" id="id" value='<?php echo $_SESSION['ID'];?>'>
</table>
</div>
</div>
</div>
</div>
</form>
</body>
</html>