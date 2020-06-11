<?php
//session_start();
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/SectionModel.php");
class Course extends Model{ 
        private $id;
        private $coursename;
        private $courseid;
        private $coursedescription;
        private $courseimage;
        private $coursetype;
        private $coursecost;
        private $courseweeks;
        private $coursehours;
        private $startdate;
        private $enddate;
        private $sections;
        private $dbh;

    function __construct($sections="",$teacher="",$coursename="",$courseid="",$coursetype="",$courseimage="",$startdate="",$enddate="") {
            $this->coursename = $coursename;
            $this->courseid = $courseid;
            $this->coursetype= $coursetype;
            $this->courseimage = $courseimage;
            $this->startdate = $startdate;
            $this->enddate = $enddate;
            $this->sections = array();

          }
          public function setAllSections($sections){
            $this->sections = $sections;
          }
          public function setSection($secId, $sections)
          {
          $this->sections[$secId] = $sections;
          }
          public function getSections()
          {
              return $this->sections;
          }
          function getCourseImage() {
            return $this->courseimage;
          }
          function setCourseImage($courseimage) {
            return $this->courseimage = $courseimage;
          }
          function getCourseName() {
            return $this->coursename;
          }
          function setCourseName($coursename) {
            return $this->coursename = $coursename;
          }
          function getCourseDescription() {
            return $this->coursedescription;
          }
          function setCourseDescription($coursedescription) {
            return $this->coursedescription =$coursedescription;
          } 
          function getCourseID() {
            return $this->courseid;
          }
          function setCourseID($courseid) {
            return $this->courseid = $courseid;
          }
          function getCourseType() {
            return $this->coursetype;
          }
          function setCourseType($coursetype) {
            return $this->coursetype = $coursetype;
          }
          function getCourseCost() {
            return $this->coursecost;
          }
          function setCourseCost($coursecost) {
            return $this->coursecost = $coursecost;
          }
          function getCourseWeeks() {
            return $this->courseweeks;
          }
          function setCourseWeeks($courseweeks) {
            return $this->courseweeks = $courseweeks;
          }
          function getCourseHours() {
            return $this->coursehours;
          }
          function setCourseHours($coursehours) {
            return $this->coursehours = $coursehours;
          }
          function getStart() {
            return $this->startdate;
          }
          function setStart($startdate) {
            return $this->startdate = $startdate;
          }
          function getEnd() {
            return $this->enddate;
          }
          function setEnd($enddate) {
            return $this->enddate = $enddate;
          }
          function setID($id){
            return $this->id =$id;
          }
          function getID() {
            return $this->id;
          }
          function getCourses(){
            $sql = "SELECT *,Course.ID as cid FROM Course INNER Join Course_Duration
            ON Course.ID = Course_Duration.CourseID" ;
            $dbh = new Dbh();
            $section = new Section();
            $result = $dbh->query($sql);
            $courses = array();
            while($row=mysqli_fetch_assoc($result)){
              $course = new Course();
              $course->setID($row['cid']);
              $course->setCourseID($row['CourseID']);
              $course->setCourseName($row['CourseName']);
              $course->setCourseType($row['CourseType']);
              $course->setCourseCost($row['CourseCost']);
              $course->setCourseDescription($row['CourseDescription']);
              $course->setCourseImage($row['CourseImage']);
              $course->setCourseWeeks($row['CourseWeeks']);
              $course->setCourseHours($row['CourseHours']);
              $course->setStart($row['StartDate']);
              $course->setEnd($row['End_Date']);
              $course->setAllSections($section->getCourseSections($row['cid']));
              $courses[$row['cid']] = $course;
              //echo "<script>alert('".$row['CourseID']."')</script>";
            }

            //echo "<script>alert('hi')</script>";
            return $courses;
          }
      
static function addcourses($coursename,$courseweeks,$coursehours,$coursetype,$coursedescription,$courseimage,$coursecost,$startdate,$enddate,$createdDate){

        $coursename=$_POST['CourseName'];
        //$courseid=$_POST['CourseID'];
        $coursedescription = $_POST['CourseDescription'];
        $courseimage = $_POST['CourseImage'];
        $courseweeks=$_POST['CourseWeeks'];
        $coursehours=$_POST['CourseHours'];
        $coursetype=$_POST['CourseType'];
        $coursecost=$_POST['CourseCost'];
        $startdate=$_POST['StartDate'];
        $enddate=$_POST['EndDate'];
        $createdDate = date("Y/m/d H:i:s");


  $sql = "INSERT into  Course(CourseName,CourseType,CourseCost,CourseDescription,CourseImage) Values('$coursename','$coursetype','$coursecost','$coursedescription','$courseimage');";
  $sql1 = "SELECT ID FROM Course WHERE CourseName='$coursename'";
  //$sql .= "INSERT INTO  Course_Time_Info(CourseWeeks,CourseHours,StartDate,End_Date,CourseID) Values('$courseweeks','$coursehours','$startdate','$enddate','$courseid');";
  $dbh = new Dbh();

 if($dbh->query($sql) === true){

  $courseID = $dbh->query($sql1);
  $row = $dbh->fetchRow($courseID);
  $id = $row['ID'];
  echo $id;

  $sql2 = "INSERT INTO Course_Duration(CourseWeeks,CourseHours,StartDate,End_Date,CourseID,CreatedDate) Values('$courseweeks','$coursehours','$startdate','$enddate',($id),'$createdDate');";
  echo $sql2;
  if($dbh->query($sql2) === true){
    
    echo" Added Courses successfully";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
        
    }
  }
function editcourse($id,$coursename,$coursetype,$coursecost,$coursedescription,$courseimage,$courseweeks,$coursehours,$startdate,$enddate,$updateddate){
  // Attempt insert query execution
  $id = $_POST['id'];
  $coursename=$_POST['CourseName'];
  //$courseid=$_POST['CourseID'];
  $coursedescription = $_POST['CourseDescription'];
  $courseimage = $_POST['CourseImage'];
  $coursetype=$_POST['CourseType'];
  $coursecost=$_POST['CourseCost'];
  $courseweeks=$_POST['CourseWeeks'];
  $coursehours=$_POST['CourseHours'];
  $startdate=$_POST['StartDate'];
  $enddate=$_POST['EndDate'];
  $updateddate = date("Y/m/d H:i:s");

  $sql = "UPDATE Course 
  SET CourseName = '$coursename' , CourseType ='$coursetype' , CourseCost = $coursecost ,  CourseDescription='$coursedescription' , CourseImage='$courseimage'
  WHERE ID='$id'";

  //echo $sql;
  $dbh = new dbh();
  if($dbh->query($sql) == true){

    $sql2 = "UPDATE Course_Duration
  SET   CourseWeeks='$courseweeks' , CourseHours='$coursehours' , StartDate='$startdate' , End_Date='$enddate' , UpdatedDate='$updateddate'
  WHERE CourseID='$id'";
  //echo $sql2;
  $result = $dbh->query($sql2);
  if($dbh->query($sql2) === true){
    echo "updated successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
  }
}
function deletecourse($courseid){
  $courseid = $_POST['id'];

  $sql="DELETE from Course_Duration 
  where CourseID='$courseid';";
  $dbh = new dbh();

  if($dbh->query($sql) == true){
    $sql1 ="DELETE from Course where ID='$courseid';";

  $result = $dbh->query($sql1);
  if($dbh->query($sql1) === true){
          echo "Course Deleted successfully.";
         
      } else{
          echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
}
}
function addteacher(){


     $sql = "INSERT into  User(FirstName,LastName,Email,Password,Phone) Values('$fname','$lname','$email','$password','$phone');";
     $sql1 = "SELECT ID FROM User WHERE FirstName='$fname' AND LastName='$lname' AND Email='$email'";
     $dbh = new Dbh();
     
     if($dbh->query($sql) == true){
       
       $userID = $dbh->query($sql1);
       $row = $dbh->fetchRow($userID);
        
       $id = $row['ID'];     
       $sql2 = "INSERT INTO  User_Type(UserType,User_Id) Values('Teacher',($id));";
       if($dbh->query($sql) == true){
       
        $usertype = $dbh->query($sql2);
        $row1 = $dbh->fetchRow($usertype);
              
       $sql3 = "INSERT INTO  Teacher(User_Id,Career,Experience) Values(($id),'$career','$experience');";
       if($dbh->query($sql2) == true){
        if($dbh->query($sql3) == true){
          $this->setTeachers($teacher->getId(), $teacher);
        echo" Teacher Added Successfully";
      
      }
    }
  
 else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
        
    }
}
}
}

      
?>