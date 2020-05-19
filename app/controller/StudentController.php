<?php

//define('__ROOT__', "../app/");
require_once(__ROOT__ . "controller/Controller.php");
class StudnetController extends Controller
{

    public function EditStudentAccount()
    {
        $id = $_REQUEST['id'];
        $fname = $_REQUEST['FirstName'];
        $lname = $_REQUEST['LastName'];
        $email = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];
        $phone = $_REQUEST['Phone'];
       // $attendence = $_SESSION['Attendence'];
        echo $id;
        echo $fname;
        $this->model->editaccount($id,$fname,$lname,$email,$password,$phone);
    }

}