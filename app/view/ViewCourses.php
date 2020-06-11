<?php
require_once("View3.php");
class ViewCourses extends View3{
	
    public function coursesdescription(){
        $id = $_GET['id'];
        $cid = $_GET['cid'];
        $str = "";
        $section = $this->model->getCourses()[$cid]->getSections()[$id];
        $course = $this->model->getCourses()[$cid];
  
                $str .= $str . '<div class="card mb-3">';
                $str .= '<img src="images/'.$course->getCourseImage().'" class="card-img-top" alt="Error">';
                $str .='<div class="card-body">';$cid = $_GET['cid'];
                $str .='<h2 class="card-title">$'.$section->getSectioncost().'</h2>';
                $str .='<a href="#" class="btn btn-primary">Buy Now</a>';
                $str .='<a href="invoice.php?action=printReceipt&id='.$id.'&cid='.$cid.'" class="btn btn-primart">Print Recipt</a>';
                $str .='<p class="card-text">'.$section->getSectionTime().'</p>';
                $str .='</div>';
                $str .='</div>';
            
        
        return $str;
    }
}
?>
                