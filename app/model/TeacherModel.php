<?php
 
  //session_start();
  require_once(__ROOT__ . "model/UserModel.php");
class Teacher extends User{
    private $id;
    private $career;
    private $experience;

    function __construct($career="",$experience="") {
        $this->career = $career;
        $this->experience = $experience;
    }
    public function getID()
    {
        return $this->id;
    }
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getCareer(){
        return $this->career;
    }
    public function setCareer($career){
        $this->career = $career;
    }
    public function getExperience(){
        return $this->experience;
    }
    public function setExperience($experience){
        $this->experience = $experience;
    }
    function editaccount($id,$fname,$lname,$email,$phone,$image,$career,$experience)
    {
        // Attempt insert query execution
        $id = $_POST['id'];
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $phone = $_POST['Phone'];
        $image = $_POST['Image'];
        $career = $_POST['Career'];
        $experience = $_POST['Experience'];
        $updateddate = date("Y/m/d H:i:s");
        

        $sql = "UPDATE User
        SET FirstName = '$fname' , LastName = '$lname' , Email='$email' , Phone = $phone ,Image = '$image'
        WHERE ID=$id";
    
        $sql1 = "SELECT ID FROM User WHERE Email='$email'";
    
        $dbh = new dbh();
        if($dbh->query($sql) == true){
          
          $userID = $dbh->query($sql1);
          $row = $dbh->fetchRow($userID);
          $uid = $row['ID'];
          $sql2 = "UPDATE Teacher
        SET  Career='$career',Experience='$experience',UpdatedDate = '$updateddate'
        WHERE Teacher_ID=$uid";
        $result = $dbh->query($sql2);
        
        if($dbh->query($sql2) === true){
            if(!isset($_SESSION)){session_start();}
            $_SESSION['FirstName']=$fname;
            $_SESSION['LastName']=$lname;
            $_SESSION['email']=$email;
            $_SESSION['Image']=$image;
            $_SESSION['Career']=$career;
            $_SESSION['Experience']=$experience;
            $_SESSION['Phone']=$phone;
            echo "<div class='alert alert-success' role='alert'> Updated Successfully </div>";
         
      } else{
          echo "<script>alert('Not Updated')</script>";
      }
    
    }
    }


  function readTeacher(){
    $sql = "SELECT User.* , teacher.* FROM User INNER Join teacher
      ON User.ID = teacher.Teacher_ID"  ;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->$fname = $row['FirstName'];
        $_SESSION['FirstName']=$row['FirstName'];
        $this->$lname = $row['LastName'];
        $_SESSION['LastName']=$row['LastName'];
        $this->phone = $row["Phone"];
        $this->career=$row["Career"];
        $this->experience=$row["Experience"];
    }
    else {
        $this->fname = "";
        $this->lname = "";
        $this->phone = "";
        $this->career = "";
        $this->experience = "";
    }
  }






}

?>
