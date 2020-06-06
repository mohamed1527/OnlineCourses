<?php
 
  //session_start();
  require_once(__ROOT__ . "model/Model.php");
class User extends Model{
  private $id;
  private $fname;
  private $lname;
  private $phone;
  private $email;
  private $password; 
  private $image;
  private $address;
  private $usertype; 
  private $dbh;
  public $users;

  function __construct($email="",$password="",$fname="",$lname="",$address="",$image="") {
    $this->email = $email;
    $this->password = $password;
    $this->fname = $fname;
    $this->lname = $lname; 
    $this->image = $image; 
    $this->address = $address;
  }
  function setAddress($address){
    return $this->address = $address;
    
  }
  function getAddress(){
    
    return $this->address = $address;
  }
  function setFirstName($fname){
    return $this->fname = $fname;
    
  }
  function setLastName($lname){
    
    return $this->lname = $lname;
  }
  function getFirstName(){
    return $this->fname;
  }
  function getLastName(){
    
    return $this->lname;
  }
  function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  
  function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    return $this->password = $password;
  }
  function setPhone($phone){
    return $this->phone = $phone;
  }
  function getPhone(){
    return $this->phone;
  }
  function getID(){
    return $this->id;
  }
  function setID($id){
    return $this->id = $id;
  }
  function getImage(){
    return $this->image;
  }
  function setImage($image){
    return $this->image = $image;
  }
  function getUserType(){
    return $this->usertype;
  }
  function setUserType($usertype){
    return $this->usertype = $usertype;
  }
 
    function getUsers(){
      $sql = "SELECT User.* , User_Type.* FROM User INNER Join User_Type
      ON User.ID = User_Type.User_ID"  ;
      $dbh = new Dbh();
      $result = $dbh->query($sql);
      $users = array();
      while($row=mysqli_fetch_assoc($result)){
        $user = new User();
        $user->setID($row['ID']);
        $user->setFirstName($row['FirstName']);
        $user->setLastName($row['LastName']);
        $user->setEmail($row['Email']);
        $user->setPassword($row['Password']);
        $user->setPhone($row['Phone']);
        $user->setImage($row['Image']);
        $user->setUserType($row['UserType']);
        $users[] = $user;
      }
      return $users;
    }
  
  
  

static function login($email,$password){
  
	$email=$_POST['email'];
	$password=md5($password);

$sql = "SELECT * FROM User where Email='$email' AND Password='$password'";

$dbh = new Dbh();
$result = $dbh->query($sql);
$row=$dbh->fetchRow();
//echo $row;

if (!empty($row)){
  session_start();
  $_SESSION['ID']=$row['ID'];
  $_SESSION['FirstName']=$row['FirstName'];
  $_SESSION['LastName']=$row['LastName'];
  $_SESSION['email']=$row['Email'];
  $_SESSION['password']=$row['Password'];
  $_SESSION['Phone']=$row['Phone'];
  $_SESSION['Image']=$row['Image'];
  //$_SESSION['Address']=$row['Address'];
  

  echo $_SESSION['ID'];
  $userID = "SELECT UserType FROM User_Type where User_Id='".$row['ID']."'";
  $result = $dbh->query($userID);
  $row1=$dbh->fetchRow($result);

  if (!empty($row)){
  
if($row1['UserType']=='Student'){
    $_SESSION['type']='Student';
    $sql1 = "SELECT Address FROM Student where Student_ID='".$row['ID']."'";
    $result = $dbh->query($sql1);
    $row2=$dbh->fetchRow($result);
    if(!empty($row2)){
    $_SESSION['Address']=$row2['Address'];
    }
  }
if($row1['UserType']=='Teacher'){
    $_SESSION['type']='Teacher';
  }
if($row1['UserType']=='Admin'){
    $_SESSION['type']='Admin';
  }

echo" Login Successfully";

  
}

else{
echo "Invalid Email or Password or still not accepted";
}	


  }
}

function signup($fname,$lname,$email,$password,$phone,$image,$address,$createdDate){
     
		 //$fname = $_POST['firstname'];
		 //$lname = $_POST['lastname'];
		 //$email = $_POST['email'];
     //$password = $_POST['password'];
     $password=md5($password);
     //$phone = $_POST['phone'];
     //move_uploaded_file($_FILES["img"]["tmp_name"],  $_FILES["img"]["name"]);
     //$image=$_FILES['img']['name'];
     $createdDate = date("Y/m/d H:i:s");

     $sql = "INSERT into  User(FirstName,LastName,Email,Password,Phone,Image,CreatedDate) Values('$fname','$lname','$email','$password','$phone','$image','$createdDate');";
     $sql1 = "SELECT ID FROM User WHERE FirstName='$fname' AND LastName='$lname' AND Email='$email'";
     $dbh = new Dbh();
     
     if($dbh->query($sql) == true){
       
       $userID = $dbh->query($sql1);
       $row = $dbh->fetchRow($userID);
        
       $id = $row['ID'];     
       $sql2 = "INSERT INTO  User_Type(UserType,User_Id) Values('Student',($id));";
       if($dbh->query($sql2) == true){

        $sql3="INSERT INTO Student(Student_ID,Address) values (($id),'$address');";

       if($dbh->query($sql3)==true){ 
       echo" Signup successfully";
      
         }
       }
     
    else{
      echo "<script>alert('Email Already Taken');</script>";
       echo "ERROR: Could not able to execute $sql. " . $conn->error;
   }
  }
       }
       function adduser($fname,$lname,$email,$password,$phone,$image,$usertype,$createdDate){
        // Attempt insert query execution
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $email = $_POST['Email'];
        $password=md5($password);
        $phone = $_POST['Phone'];
        $image = $_POST['Image'];
        $usertype = $_POST['UserType'];
        $createdDate = date("Y/m/d H:i:s");
        
        $sql = "INSERT INTO User (FirstName,LastName,Email,Password,Phone,Image,CreatedDate) VALUES ('$fname','$lname','$email','$password','$phone','$image','$createdDate')";
        $sql1 = "SELECT ID FROM User WHERE Email='$email'";

        $dbh = new dbh();
        if($dbh->query($sql) == true){

        $userID = $dbh->query($sql1);
        $row = $dbh->fetchRow($userID);
        $uid = $row['ID'];
       // echo $uid;
  
        $sql2 = "INSERT INTO User_Type (UserType,User_Id) Values('$usertype',($uid));";
        if($dbh->query($sql2) == true){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
        //array_push($this->fruits, new Fruit("0","test","1.0"));
      
  }
}
  function edituser($id,$fname,$lname,$email,$phone,$image,$usertype,$updateddate){
    // Attempt insert query execution
    
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $image = $_POST['Image'];
    //$image=$_FILES['Image']['name'];
    $updateddate = date("Y/m/d H:i:s");
    $sql = "UPDATE User
    SET FirstName = '$fname' , LastName = '$lname' , Email='$email' , Phone = $phone, Image='$image'
    WHERE ID=$id";

    $sql1 = "SELECT ID FROM User WHERE Email='$email'";
    //echo $sql;
    //echo $sql1;
    $dbh = new dbh();
    if($dbh->query($sql) == true){

      $userID = $dbh->query($sql1);
      $row = $dbh->fetchRow($userID);
      $uid = $row['ID'];
      echo $uid;
  
      $sql2 = "UPDATE User_Type
    SET   UserType='$usertype'
    WHERE User_ID=$uid";
    //echo $sql2;
    $result = $dbh->query($sql2);
  
    if($dbh->query($sql2) === true){
      echo "Updated successfully.";
      //$this->fillArray();
  } else{
      echo "ERROR: Could not able to execute $sql. " . $conn->error;
  }

}
}
  
      function deleteuser($id){
        $id = $_POST['id'];

        $sql="DELETE from User_Type where User_ID='$id';";
        $dbh = new dbh();
        if($dbh->query($sql) == true){
          $sql1="DELETE From Student where Student_ID='$id';";  
          
        if($dbh->query($sql1) == true){

          $sql2 ="DELETE from User where ID='$id';"; 

        $result = $dbh->query($sql2);
        if($dbh->query($sql2) === true){
                echo "Deleted Successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
      }
    }
    }
    
  
  

    function viewprofile($email){

      $email = $_POST['email'];
      $sql="SELECT * from User where email = '$email' ";
      $dbh = new dbh();
      $result = $dbh->query($sql);
      if(!empty($result)){
        $row=$dbh->fetchRow($result);
        }else{
          echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
    }
}


