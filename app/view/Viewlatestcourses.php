<!DOCTYPE html>
<html>
<section class="ftco-section">
<h1 style="text-align: center;">Latest <span> Courses </span></h1>
<hr>
<br>
<div class="container">
<div class="row d-flex">
<?php
require_once("View2.php");

class ViewLatestCourses extends View2{
    public function latestcourses(){ 
    $str = ""; 
    $courses = $this->model->getCourses();
    
    foreach($courses as $course){
    
    foreach($course->getSections() as $section){
        $str .='
        
        <div class="col-md-3 d-flex ftco-animate">';
        $str.='<div class="blog-entry align-self-stretch">';
        $str.='<div class="card">';
        $str.='<a href="sectiondesc.php?cid='.$course->getID().'&id='.$section->getID().'"><img src="images/'.$course->getCourseImage().'"  style="width:100%;">';
        $str.='<h3>'.$section->getSectionname().'</h3>';
        $str.='<div class="chip">';
        $str.='<img src="images/'.$section->getTeacher()->getImage().'" alt="Person" width="80" height="90">';
        $str.='<p>'.$section->getTeacher()->getFirstName().'<br> <a href="viewteacher.php?id='.$section->getTeacher()->getID().'&cid='.$course->getID().'&sid='.$section->getID().'">view profile</a></p></div>';     
        $str.='<a href="sectiondesc.php?cid='.$course->getID().'&id='.$section->getID().'"><button>'.$section->getSectioncost().'</button>';
        $str.=  '</div>
            </div>
            </div>';
        }
      }
        return $str;
    
    
  }
}?>

