<?php
 
  //session_start();
  require_once(__ROOT__ . "model/UserModel.php");
class Student extends User{
    private $id;
    private $attendence;

    function __construct($attendence="") {
        $this->attendence = $attendence;
    }

    public function getID()
    {
        return $this->id;
    }
    public function setID($id)
    {
        $this->id = $id;
    }
    public function setAttendence($attendence){
        $this->attendence = $attendence;
    }
    public function getAttedence(){
        return $this->attendence;
    }

    function editaccount($id,$fname,$lname,$email,$password,$phone)
    {
        // Attempt insert query execution
        $id = $_POST['id'];
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $password = $_POST['Password'];
        $phone = $_POST['Phone'];
        //$attendence = $_POST['attendence'];
        $updateddate = date("Y/m/d H:i:s");
        

        $sql = "UPDATE User
        SET FirstName = '$fname' , LastName = '$lname' , Email='$email' , Password ='$password' , Phone = $phone 
        WHERE ID=$id";
    
        $sql1 = "SELECT ID FROM User WHERE Email='$email'";
    
        $dbh = new dbh();
        if($dbh->query($sql) == true){
    
          $userID = $dbh->query($sql1);
          $row = $dbh->fetchRow($userID);
          $uid = $row['ID'];
         // echo $uid;
        // echo "<script>alert('Updated successfully')</script>";
          $sql2 = "UPDATE Student
        SET  UpdatedDate = '$updateddate'
        WHERE Student_ID=$uid";
        //echo $sql2;
        $result = $dbh->query($sql2);
      
        if($dbh->query($sql2) === true){
            if(!isset($_SESSION)){session_start();}
            $_SESSION['FirstName']=$fname;
            $_SESSION['LastName']=$lname;
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            $_SESSION['Phone']=$phone;
          echo "<script>alert('Updated successfully')</script>";
         
      } else{
          echo "<script>alert('Not Updated')</script>";
      }
    
    }
    }
}

?>

    