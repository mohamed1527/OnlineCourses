<?php

  require_once(__ROOT__ . "controller/Controller.php");

class UserController extends Controller{
    public function loginController() {
          // Escape user inputs for security
    $email = $_REQUEST['email'];
    $password=$_REQUEST['password'];

      $this->model->login($email,$password);
    }

    public function signupController(){
     $fname = $_REQUEST['firstname'];
		 $lname = $_REQUEST['lastname'];
     $email = $_REQUEST['email'];
     $password=$_REQUEST['password'];
		 $phone = $_REQUEST['phone'];
     $image=$_FILES['img']['name'];
     $address=$_REQUEST['Address'];
     $createdDate = date("Y/m/d H:i:s");
     
     $this->model->signup($fname,$lname,$email,$password,$phone,$image,$address,$createdDate);

    }
    public function profileController(){

      $email = $_REQUEST['email'];

      $this->model->viewprofile($email);
    }
    public function AddUser(){
      
      $fname = $_REQUEST['FirstName'];
		  $lname = $_REQUEST['LastName'];
		  $email = $_REQUEST['Email'];
     // $password = $_REQUEST['Password'];
      $password=$_REQUEST['Password'];
      $phone = $_REQUEST['Phone'];
      $image = $_REQUEST['Image'];
      $usertype = $_REQUEST['UserType'];
      $createdDate = date("Y/m/d H:i:s");
      
      $this->model->adduser($fname,$lname,$email,$password,$phone,$image,$usertype,$createdDate);
    }

    public function EditUser(){
      $id = $_REQUEST['id'];
      $fname = $_REQUEST['FirstName'];
		  $lname = $_REQUEST['LastName'];
		  $email = $_REQUEST['Email'];  
      $phone = $_REQUEST['Phone'];
      $image=$_REQUEST['Image'];
      $usertype = $_REQUEST['UserType'];
      $updateddate = date("Y/m/d H:i:s");

      $this->model->edituser($id,$fname,$lname,$email,$phone,$image,$usertype,$updateddate);
    }
    public function DeleteUser(){
      $id = $_REQUEST['id'];
      echo $id;
      $this->model->deleteuser($id);
    }
  }