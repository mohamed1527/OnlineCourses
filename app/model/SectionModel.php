<?php
//session_start();
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/TeacherModel.php");
require_once(__ROOT__ . "model/StudentModel.php");
class Section extends Model{ 
        private $sectionname;
        private $sectioncost;
        private $sectiontime;
        private $sectionlink;
        private $teacher;
        private $students;
        
    function __construct($sectionname="",$sectioncost="",$sectiontime="",$sectionlink="") {
            $this->sectionname = $sectionname;
            $this->sectioncost = $sectioncost;
            $this->sectiontime = $sectiontime;
            $this->sectionlink = $sectionlink;
            $this->students = array();
            $this->teacher = new Teacher();
          }
          public function setAllStudents($students){
            $this->students = $students;
          }
          public function setTeacher( $teacher)
          {
          $this->teacher = $teacher;
          }
          public function getTeacher()
          {
              return $this->teacher;
          }
          public function setStudents($studentId, $students)
          {
          $this->students[$studentId] = $students;
          }
          public function getStudents()
          {
              return $this->students;
          }
          function getSectionname() {
            return $this->sectionname;
          }
          function setSectionname($sectionname) {
            return $this->sectionname = $sectionname;
          }
          
          function getSectioncost() {
            return $this->sectioncost;
          }
          function setSectioncost($sectioncost) {
            return $this->sectioncost = $sectioncost;
          }
          function getSectiontime() {
            return $this->sectiontime;
          }
          function setSectiontime($sectiontime) {
            return $this->sectiontime = $sectiontime;
          }
          function getSectionlink() {
            return $this->sectionlink;
          }
          function setSectionlink($sectionlink) {
            return $this->sectionlink = $sectionlink;
          }
          function getID(){
            return $this->id;
          }
          function setID($id){
            return $this->id = $id;
          }
          function getSections(){
            $sql = "SELECT * FROM Section" ;
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            $sections= array();
            while($row=mysqli_fetch_assoc($result)){
              $section = new Section();
              $section->setID($row['ID']);
              $section->setSectionname($row['SectionName']);
              $section->setSectiontime($row['SectionTime']);
              $section->setSectioncost($row['SectionCost']);
              $section->setSectionlink($row['SectionLink']);
              $sections[$row['ID']] = $section;
            }
            return $sections;
          }
          function getCourseSections($id){
            $sql = "SELECT * FROM Section where CourseID=$id" ;
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            $sections= array();
          
            while($row=mysqli_fetch_assoc($result)){
              $section = new Section();
              $section->setID($row['ID']);
              $section->setSectionname($row['SectionName']);
              $section->setSectiontime($row['SectionTime']);
              $section->setSectioncost($row['SectionCost']);
              $section->setSectionlink($row['SectionLink']);
              $section->setAllStudents($this->getSectionStudents($row['ID']));
              $section->setTeacher($this->getSectionTeacher($row['ID']));
              $sections[$row['ID']] = $section;
              
            }
            return $sections;
          }
          function getSectionStudents($id){
            $sql = "SELECT * FROM Student Inner Join User ON Student.Student_ID=User.ID where Section_ID = $id" ;
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            $students= array();
            while($row=mysqli_fetch_assoc($result)){
              $student = new Student();
              $student->setID($row['ID']);
              $student->setFirstName($row['FirstName']);
              $student->setLastName($row['LastName']);
              $student->setEmail($row['Email']);
              $student->setPassword($row['Password']);
              $student->setPhone($row['Phone']);  
              $student->setAddress($row['Address']);  
              $students[$row['ID']] = $student;
            }
            return $students;


          }

          function getSectionTeacher($id){
            $sql = "SELECT * FROM Teacher Inner Join User ON Teacher.Teacher_ID=User.ID where Section_ID = $id" ;
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            //$teachers= array();
            $teacher = new Teacher();
            while($row=mysqli_fetch_assoc($result)){
              
              $teacher->setID($row['ID']);
              $teacher->setFirstName($row['FirstName']);
              $teacher->setLastName($row['LastName']);
              $teacher->setEmail($row['Email']);
              $teacher->setImage($row['Image']);
              $teacher->setPassword($row['Password']);
              $teacher->setPhone($row['Phone']);  
              $teacher->setCareer($row['Career']);
              $teacher->setExperience($row['Experience']);  
             // $teachers[] = $teacher;
            }
            return $teacher;


          }
      
static function addsection($sectionname,$sectiontime,$sectioncost,$sectionlink){

        $sectionname=$_POST['SectionName'];
        $sectiontime=$_POST['SectionTime'];
        $sectioncost=$_POST['SectionCost']; 
        $sectionlink=$_POST['SectionLink'];

  $sql = "INSERT into  Section(SectionName,Sectiontime,Sectioncost,Sectionlink,CourseID) Values('$sectionname','$sectiontime','$sectioncost','$sectionlink',42);";
  
  $dbh = new Dbh();

  $result = $dbh->query($sql);

 if($result == true){
    echo "<div class='alert alert-success' role='alert'> Add Section Successfully </div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
  }
  }
  static function editsection($id,$sectionname,$sectiontime,$sectioncost,$sectionlink){

    $sectionname=$_POST['SectionName'];
    $sectiontime=$_POST['SectionTime'];
    $sectioncost=$_POST['SectionCost']; 
    $sectionlink=$_POST['SectionLink'];

    $sql = "UPDATE Section
    SET SectionName = '$sectionname' , SectionTime = '$sectiontime', SectionCost =$sectioncost , SectionLink = '$sectionlink' 
    Where ID='$id'";
    $dbh = new Dbh();

    $result = $dbh->query($sql);

    if($dbh->query($sql) == true){
      echo "<div class='alert alert-success' role='alert'> Edit Section Successfully </div>";
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
    }
    function deleteSection($id){
  
        $sql="DELETE from Section where ID='$id';";
        $dbh = new Dbh();

        $result = $dbh->query($sql);
      
       if($dbh->query($sql) == true){
                echo "<div class='alert alert-success' role='alert'> Delete Section Successfully </div>";
                
            } else{
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
      }
        }

    

      
?>