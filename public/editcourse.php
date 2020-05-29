<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/CourseModel.php");
  require_once(__ROOT__ . "controller/CourseController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Course();
  $controller = new CourseController($model);
  $view = new ViewTable($controller, $model);


?>
<?php
$id=$_GET['id'];
foreach($model->getCourses() as $course)
{
    if($course->getCourseID() == $id)
    {
        $userid = $course->getID();
        $coursename = $course->getCourseName();
        $courseid = $course->getCourseID();
        $coursetype = $course->getCourseType();
        $coursecost = $course->getCourseCost();
        $coursedescription = $course ->getCourseDescription();
        $courseimage = $course ->getCourseImage();
        $courseweeks = $course->getCourseWeeks();
        $coursehours = $course->getCourseHours();
        $startdate = $course->getStart();
        $enddate = $course->getEnd();
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
<form  method = "post" action="showcourses.php?action=EditCourse">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>CourseID</th>
              <th>Type</th>
              <th>Cost</th>
              <th>Description</th>
              <th>Image</th>
              <th>Weeks</th>
              <th>Hours</th>
              <th>StartDate</th>
              <th>EndDate</th>
              <th>Edit</th>
            </tr>
          </thead>
        <tbody>
    
<tr>  
    <td><?php echo $id;?></td> 
      
    <td><input type="text"  id="CourseName" placeholder="Enter Course name" name="CourseName" value="<?php echo $coursename;?>"></td>
    <td><input type="text"  id="CourseID" placeholder="Enter Course ID" name="CourseID" value="<?php echo $courseid;?>"></td>
    <td><input type="text"  id="CourseType" placeholder="Enter Course Type" name="CourseType" value="<?php echo $coursetype;?>"></td>
    <td><input type="text"  id="CourseCost" placeholder="Enter Course Cost" name="CourseCost" value="<?php echo $coursecost;?>"></td>
    <td><input type="text"  id="CourseDescription" placeholder="Enter Course Description" name="CourseDescription" value="<?php echo $coursedescription;?>"></td>
    <td><input type="file"  id="CourseImage" placeholder="Enter Course Image" name="CourseImage" accept="image/gif, image/jpeg, image/png" value="<?php echo $courseimage;?>"></td>
    <td><input type="text"  id="CourseWeeks" placeholder="Enter Course Weeks" name="CourseWeeks" value="<?php echo $courseweeks;?>"></td>
    <td><input type="text"  id="CourseHours" placeholder="Enter Course Hours" name="CourseHours" value="<?php echo $coursehours;?>"></td>
    <td><input type="date"  id="StartDate"name="StartDate" value="<?php echo $startdate;?>"></td>
    <td><input type="date"  id="EndDate"name="EndDate" value="<?php echo $enddate;?>"></td>
    <td><button type="submit" class="btn btn-default">Are you sure to edit ? </button></td>
    <td><input type="hidden" name="id" id="id" value='<?php echo $id;?>'>

</table>
</div>
</div>
</div>
</div>
</form>
</body>
</html>

