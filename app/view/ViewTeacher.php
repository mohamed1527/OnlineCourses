

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../lib/css/amr.css">

</head>
<body>

<div class ="nos">

<div class="card">
 
<?php

require_once("View4.php");
class ViewTeacher extends View4{
	
    public function Teachers(){
        $str="";
        $str.="<h1>".$this->model->getFirstName()."<br>".$this->model->getLastName()."</h1>";
        $str.='<p>'.$this->model->getPhone()."</p>";
        $str.='<p>'.$this->model-> getCareer()."</p>";
        $str.='<p>'.$this->model-> getExperience()."</p>";
        $str.='<a href="#"><i class="fa fa-dribbble"></i></a>';
        $str.='<a href="#"><i class="fa fa-twitter"></i></a>';
        $str.='<a href="#"><i class="fa fa-linkedin"></i></a>';
        $str.='<a href="#"><i class="fa fa-facebook"></i></a>';
        $str.='<br>';
        $str.='<input type="submit" value ="Available">';
        $str.='</div>';
        $str.='</div>';

        return $str;
    }
}
?>

</body>
</html>

