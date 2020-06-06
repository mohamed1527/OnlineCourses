<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/CourseModel.php");
  require_once(__ROOT__ . "model/SectionModel.php");
  require_once(__ROOT__ . "controller/CourseController.php");
  require_once(__ROOT__ . "controller/SectionController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Course();
  $controller = new CourseController($model);
  $view = new ViewTable($controller, $model);


  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }
?>

<?php
$id=$_GET['id'];
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
              <th>SectionName</th>
              <th>SectionTime</th>
              <th>SectionCost</th>
              <th>SectionLink</th>
            </tr>
          </thead>
        <tbody>
        
<?php
      echo $view->CoursesSections();
?>
</table>
</div>
</div>
</div>
</div>
</form>
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
              <th>Phone</th>     
            </tr>
            </thead>
        <tbody>
        
<?php
      echo $view->SectionsStudents();
?>
<br><br>
           
   </table>
</div>
</div>
</div>
</div>
</form>
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
              <th>Phone</th>     
            </tr>
            </thead>
        <tbody>
        
<?php
      echo $view->SectionsTeacher();
?>
<br><br>
           
   </table>
   </div>
</div>
</div>
</div>
</form>
</body>
</html>

