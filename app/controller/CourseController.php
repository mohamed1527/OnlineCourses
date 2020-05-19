<?php

  require_once(__ROOT__ . "controller/Controller.php");

class CourseController extends Controller{
    public function AddCourse() {
          // Escape user inputs for security
          $coursename=$_REQUEST['CourseName'];
         // $courseid=$_REQUEST['CourseID'];
          $courseweeks=$_REQUEST['CourseWeeks'];
          $coursehours=$_REQUEST['CourseHours'];
          $coursetype=$_REQUEST['CourseType'];
          $coursedescription = $_REQUEST['CourseDescription'];
          $coursecost=$_REQUEST['CourseCost'];
          $startdate=$_REQUEST['StartDate'];
          $enddate=$_REQUEST['EndDate'];
          $createdDate = date("Y/m/d H:i:s");
  
      $this->model->addcourses($coursename,$courseweeks,$coursehours,$coursetype,$coursedescription,$coursecost,$startdate,$enddate,$createdDate);
    }

    public function EditCourse(){
        $id = $_REQUEST['id'];
        $coursename=$_REQUEST['CourseName'];
        $courseid=$_REQUEST['CourseID'];
        $courseweeks=$_REQUEST['CourseWeeks'];
        $coursehours=$_REQUEST['CourseHours'];
        $coursetype=$_REQUEST['CourseType'];
        $coursecost=$_REQUEST['CourseCost'];
        $coursedescription = $_REQUEST['CourseDescription'];
        $startdate=$_REQUEST['StartDate'];
        $enddate=$_REQUEST['EndDate'];
        $updateddate = date("Y/m/d H:i:s");

     $this->model->editcourse($id,$coursename,$courseid,$coursetype,$coursecost,$coursedescription,$courseweeks,$coursehours,$startdate,$enddate,$updateddate);

    }
    public function DeleteCourse(){
        $courseid = $_REQUEST['id'];
        $this->model->deletecourse($courseid);
      }
    }