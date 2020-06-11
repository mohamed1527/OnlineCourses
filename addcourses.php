<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="HTTPS://fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="HTTPS://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php

include "database.php";

class Course{
        public $ID;  
        public $coursename;
        public $courseid;
        public $coursedescription;
        public $coursetype;
        public $coursecost;
        public $courseweeks;
        public $coursehours;
        public $startdate;
        public $enddate;
      
      
static function addcourses($mysqli){

        $coursename=$_POST['name'];
        $courseid=$_POST['courseid'];
        $courseweeks=$_POST['weeks'];
        $coursehours=$_POST['hours'];
        $coursetype=$_POST['type'];
        $coursecost=$_POST['cost'];
        $startdate=$_POST['start'];
        $enddate=$_POST['end'];


  $sql = "INSERT into  Course(CourseName,CourseID) Values('$coursename','$courseid');";
  $sql .= "INSERT into  Course_Info(CourseType,CourseCost,CourseID) Values('$coursetype','$coursecost','$courseid');";
  $sql .= "INSERT INTO  Course_Time_Info(CourseWeeks,CourseHours,StartDate,End_Date,CourseID) Values('$courseweeks','$coursehours','$startdate','$enddate','$courseid');";
 
  if (mysqli_multi_query($mysqli,$sql)){


        echo" Added Courses successfully";
        header("Location:index.php");
    }

  else{
    echo "Invalid CourseID or CourseName or still not accepted";
    }	

    }


    }
if (isset($_POST['submit'])){
    Course::addcourses($mysqli);


    }
      
?>


</head>
<body id="bod">

    <center><h1 style="color: #00043c;margin-top:50px;margin-top: 50px;"><span>Add Courses</span></h1></center>

  
<div class="s">
 <div class="ss">
    <div class="inss">
    <form action="#" method="post">
    <label>CourseName </label><br>
    
    <input type="text" maxlength="16" name="name" id="name"  >
    <span id="availability"></span>
            <br><br>
    <label>CourseID</label><br>
    <input type="text" maxlength="16" name="courseid" id="courseid" required>
            <br><br>
    
    <label>CourseWeeks</label><br>
    <input type="text" maxlength="11" name="weeks" id="weeks" required >
            <br><br>        

    <label>CourseHours</label><br>
            
    <input type="text" name="hours" id="hours" required>
            <br><br>
    <label>CourseType</label><br>
    <input type="text" maxlength="30" name="type" id="types" required>
            <br><br>
    <label>CourseCost</label><br>
    <input type="text" maxlength="30" name="cost" id="cost" required>
            <br><br>        

    <label>StartDate</label><br>
    <input type="date" name="start" id="start" required>
          
<br>
    <label>EndDate</label><br>
    <input type="date" name="end" id="end" required>
         
            <br>
        
        <br>
        <input type="submit"   name="submit"   value="Save"><br>
        </div>
    </div>
    </form>
