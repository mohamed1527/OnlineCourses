<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/CourseModel.php");
  require_once(__ROOT__ . "controller/CourseController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Course();
  $controller = new CourseController($model);
  $view = new ViewTable($controller, $model);


  if (isset($_GET['action']) && !empty($_GET['action'])) {
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
<form  method = "post" action="showcourses.php?action=AddCourse">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Cost</th>
              <th>Description</th>
              <th>Weeks</th>
              <th>Hours</th>
              <th>StartDate</th>
              <th>EndDate</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
        <tbody>
    
<?php
      echo $view->output();
?>
<tr>  
    <td></td> 
    <td><input type="text"  id="CourseName" placeholder="Enter Coursename" name="CourseName"></td> 
    <td><input type="text"  id="CourseType" placeholder="Enter CourseType" name="CourseType" ></td>
    <td><input type="text"  id="CourseCost" placeholder="Enter CourseCost" name="CourseCost" ></td>
    <td><input type="text"  id="CourseDescription" placeholder="Enter Description" name="CourseDescription" ></td>
    <td><input type="text"  id="CourseWeeks" placeholder="Enter CourseWeeks" name="CourseWeeks" ></td>
    <td><input type="text"  id="CourseHours" placeholder="Enter CourseHours" name="CourseHours" ></td>
    <td><input type="Date"  id="StartDate" placeholder="StartDate" name="StartDate" ></td>
    <td><input type="Date"  id="EndDate" placeholder="EndDate" name="EndDate" ></td>
    <td> <button type="submit" class="btn btn-default">Insert</button> </td>
   </table>
</div>
</div>
</div>
</div>
</form>
</body>
</html>

