<!DOCTYPE html>
<html>
<section class="ftco-section">
<h1 style="text-align: center;">Latest <span> Courses </span></h1>
<hr>
<br>
 </div>

<?php
require_once("View2.php");

class ViewLatestCourses extends View2{
    public function latestcourses(){ 
        //$id='9';
    $str = ""; 
    $courses = $this->model->getCourses();
    //echo "<script> alert('".print_r($courses)."')</script>";
    foreach($courses as $course){
    
    foreach($course->getSections() as $section){
      
       $str = $str .'<div class="container">'; 
        $str.='<div class="row d-flex">';
        $str.=  '<div class="col-md-3 d-flex ftco-animate">';
        $str.= '   <div class="blog-entry align-self-stretch">';
        $str.= '<div class="card">';
        $str.=  '<img src="images/literature.jpg"  style="width:100%;">';
        $str.=  '<h3>'.$section->getSectionname().'</h3>';
        $str.=   '<div class="chip">';
        $str.=   '<img src="images/'.$section->getTeacher()->getImage().'" alt="Person" width="80" height="90">';
        $str.=    '<p>'.$section->getTeacher()->getFirstName().' <a href="index.html">view profile</a> </p>';     
        $str.=      '<button>'.$section->getSectioncost().'</button>';
        $str.=  '</div>
            </div>
          </div>';
        }
      }
        return $str;
    
    
  }
}?>