<?php
require_once("View3.php");
class ViewCourses extends View3{
	
    public function coursesdescription(){
        $id = $_GET['id'];
        $cid = $_GET['cid'];
        $str = "";
        $courses = $this->model->getCourses()[$cid];
    

            foreach($courses->getSections() as $section){

                $str = $str . '<div class="card mb-3">';
                $str .= '<img src="images/'.$courses->getCourseImage().'" class="card-img-top" alt="Error">';
                $str .='<div class="card-body">';
                $str .='<h2 class="card-title">$'.$section->getSectioncost().'</h2>';
                $str .='<a href="#" class="btn btn-primary">Buy Now</a>';
                $str .='<p class="card-text">'.$section->getSectionTime().'</p>';
                $str .='</div>';
                $str .='</div>';
            }
        
        return $str;
    }
}
?>
                