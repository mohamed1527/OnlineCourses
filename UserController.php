<?php

  require_once(__ROOT__ . "controller/Controller.php");

class UserController extends Controller{
    public function loginController() {
          // Escape user inputs for security
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

      $this->model->login($email,$password);
    }

    public function signupController(){
     $fname = $_REQUEST['firstname'];
		 $lname = $_REQUEST['lastname'];
		 $email = $_REQUEST['email'];
		 $password = $_REQUEST['password'];
		 $phone = $_REQUEST['phone'];
		 //$age = $_REQUEST['age'];
     $image=$_FILES["Image"]["name"];
     
     $this->model->signup($fname,$lname,$email,$password,$phone,$image);

    }
    public function profileController(){

      $email = $_REQUEST['email'];

      $this->model->viewprofile($email);
    }
    public function AddUser(){
      
      $fname = $_REQUEST['FirstName'];
		  $lname = $_REQUEST['LastName'];
		  $email = $_REQUEST['Email'];
		  $password = $_REQUEST['Password'];
      $phone = $_REQUEST['Phone'];
      //move_uploaded_file($_FILES["img"]["tmp_name"],  $_FILES["img"]["name"]);
      //$image=$_FILES["img"]["name"];
      $usertype = $_REQUEST['UserType'];
		  //$phone = $_REQUEST['phone'];
      //$age = $_REQUEST['age'];
      
      
      $this->model->adduser($fname,$lname,$email,$password,$phone,$usertype);
    }

    public function EditUser(){
      $id = $_REQUEST['id'];
      $fname = $_REQUEST['FirstName'];
		  $lname = $_REQUEST['LastName'];
		  $email = $_REQUEST['Email'];
		  $password = $_REQUEST['Password'];
      $phone = $_REQUEST['Phone'];
     // move_uploaded_file($_FILES["Image"]["tmp_name"],  $_FILES["Image"]["name"]);
      //$image=$_FILES["Image"]["name"];
      $usertype = $_REQUEST['UserType'];
      //$age = $_REQUEST['age'];
      
      $this->model->edituser($id,$fname,$lname,$email,$password,$phone,$usertype);
    }
    public function DeleteUser(){
      $id = $_REQUEST['id'];
      echo $id;
      $this->model->deleteuser($id);
    }
  }