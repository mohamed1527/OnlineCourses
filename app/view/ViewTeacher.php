<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../lib/css/amr.css">

</head>
<body>


<div class="card">
 
<?php

require_once("View4.php");
class ViewTeacher extends View4{
	
    public function Teachers(){
        $id=$_GET['id'];
        $sid=$_GET['sid'];
        $cid=$_GET['cid'];
        $str = ""; 

        $courses = $this->model->getCourses()[$cid];
        $section = $courses->getSections()[$sid];
        $teacher = $section->getTeacher();  

        $str.="<h1>".$teacher->getFirstName()."<br>".$teacher->getLastName()."</h1>";
        $str.='<p>'.$teacher->getPhone()."</p>";
        $str.='<p>'.$teacher-> getCareer()."</p>";
        $str.='<p>'.$teacher-> getExperience()."</p>";
        $str.='<a href="#"><i class="fa fa-dribbble"></i></a>';
        $str.='<a href="#"><i class="fa fa-twitter"></i></a>';
        $str.='<a href="#"><i class="fa fa-linkedin"></i></a>';
        $str.='<a href="#"><i class="fa fa-facebook"></i></a>';
        $str.='<br>';
        $str.='<input type="submit" value ="Available">';
        $str.='</div>';

        return $str;
    

}
}
?>

</body>
</html>

