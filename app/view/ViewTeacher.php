<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../lib/css/amr.css">

</head>
<body>

<div class="container pt-5">
			<div class="row justify-content-between">
				<div class="col">
					<a class="navbar-brand" href="index.php">Online<span>Study.</span></a>
				</div>
				<div class="col d-flex justify-content-end">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    <div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav mr-auto">
<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
<li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
<li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
</ul>
</div></div>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
			

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
        $str.='<img src="images/'.$section->getTeacher()->getImage().'" alt="Person" width="225" height="190">';
        $str.="<h1>".$teacher->getFirstName()."<br>".$teacher->getLastName()."</h1>";
        $str.='<p>'.$teacher->getPhone()."</p>";
        $str.='<p>'.$teacher-> getCareer()."</p>";
        $str.='<p>'.$teacher-> getExperience()."</p>";
        $str.='</div></div>';
		

        return $str;
    

}

}

?>
</nav>
</body>
</html>

