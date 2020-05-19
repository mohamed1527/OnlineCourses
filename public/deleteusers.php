<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/UserModel.php");
  require_once(__ROOT__ . "controller/UserController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new User();
  $controller = new UserController($model);
  $view = new ViewTable($controller, $model);


?>
<?php
$id=$_GET['id'];
foreach($model->getUsers() as $user)
{
    if($user->getID() == $id)
    {
        $userid = $user->getID();
        $fname = $user->getFirstName();
        $lname = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $phone = $user ->getPhone();
        $image = $user ->getImage();
        $usertype= $user->getUserType();
    }
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
<form  method = "post" action="showusers.php?action=DeleteUser">
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
                <th>UserType</th>                
                <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          <tr>   
    <td><?php echo $userid;?></td>
     
    <td><input type="text"  id="FirstName" placeholder="Enter First name" name="FirstName" value="<?php echo $fname;?>"disabled></td>
    <td><input type="text"  id="LastName" placeholder="Enter Last name" name="LastName" value="<?php echo $lname;?>"disabled></td>
    <td><input type="email"  id="Email" placeholder="Enter Email" name="Email" value="<?php echo $email;?>"disabled></td> 
    <td><input type="text"  id="Password" placeholder="Enter Password" name="Password" value="<?php echo $password;?>"disabled></td>
    <td><input type="text"  id="Phone" placeholder="Enter Phone Number" name="Phone" value="<?php echo $phone;?>"disabled></td>
    <td><input type="file"  id="Image" placeholder="Choose Image" name="Image" value="<?php echo $image;?>"disabled></td>
    <td><input type="text"  id="UserType" placeholder="Enter UserType" name="UserType" value="<?php echo $usertype;?>"disabled></td>
    <td><input type="text" name="id" id="id" value='<?php echo $userid;?>'hidden>
    <td> <button type="submit" class="btn btn-default">Are you sure to Delete ? </button> </td>
    
    
</table>
</div>
</div>
</div>
</div>
</form>
</body>
</html>