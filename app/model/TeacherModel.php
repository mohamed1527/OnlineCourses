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
       // $password = $_POST['Password'];
        $phone = $_POST['Phone'];
        $image = $_POST['Image'];
        $career = $_POST['Career'];
        $experience = $_POST['Experience'];
        //$attendence = $_POST['attendence'];
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
         // echo $uid;
        // echo "<script>alert('Updated successfully')</script>";
          $sql2 = "UPDATE Teacher
        SET  Career='$career',Experience='$experience',UpdatedDate = '$updateddate'
        WHERE Teacher_ID=$uid";
        //echo $sql2;
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
          echo "<script>alert('Updated successfully')</script>";
         
      } else{
          echo "<script>alert('Not Updated')</script>";
      }
    
    }
    }
}

?>
