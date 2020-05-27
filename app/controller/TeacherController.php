<?php

//define('__ROOT__', "../app/");
require_once(__ROOT__ . "controller/Controller.php");
class TeacherController extends Controller
{

    public function EditTeacherAccount()
    {
        $id = $_REQUEST['id'];
        $fname = $_REQUEST['FirstName'];
        $lname = $_REQUEST['LastName'];
        $email = $_REQUEST['Email'];
        //$password = $_REQUEST['Password'];
        $image = $_REQUEST['Image'];
        $phone = $_REQUEST['Phone'];
        $career = $_REQUEST['Career'];
        $experience = $_REQUEST['Experience'];
       // $attendence = $_SESSION['Attendence'];
        echo $id;
        echo $fname;
        $this->model->editaccount($id,$fname,$lname,$email,$phone,$image,$career,$experience);
    }

}