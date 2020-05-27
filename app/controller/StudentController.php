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
        $image = $_REQUEST['Image'];
        $phone = $_REQUEST['Phone'];
        $address = $_REQUEST['Address'];
        // $attendence = $_SESSION['Attendence'];
        $this->model->editaccount($id,$fname,$lname,$email,$image,$phone,$address);
    }

}