<?php 
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
 }
 else
 {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 }
 require_once(__ROOT__ . "view/View1.php");
 ?>
<!DOCTYPE html>
<html>
<body>
<div class="container pt-5">
			<div class="row justify-content-between">
				<div class="col">
					<a class="navbar-brand" href="index.php">Online<span>Study.</span></a>
				</div>
				<div class="col d-flex justify-content-end">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="www.facebook.com" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="www.twitter.com" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="www.instagram.com" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="www.dribbble.com" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
				<form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
    
        </form>
					  
<?php 



class Bar extends View1{
	
	public function NormalBar(){
		$str='';
		$str.='<div class="collapse navbar-collapse" id="ftco-nav">';
	    $str.='<ul class="navbar-nav mr-auto">';
	    $str.='<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>';
	    $str.='<li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>';
        $str.='<li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>';
	    $str.='<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>';
	    $str.='<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>';
	    $str.='<li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>';
	    $str.='<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>';         
        $str.='</ul>';
	    $str.='</div></div>
		</nav>';
	    
		return $str;
		
}
	public function StudentBar(){
		$str="";	
		$str.='<div class="collapse navbar-collapse" id="ftco-nav">';
	    $str.='<ul class="navbar-nav mr-auto">';
	    $str.='<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>';
	    $str.='<li class="nav-item"><a href="sendmessage.php" class="nav-link">Send Messages</a></li>';
        $str.='<li class="nav-item"><a href="courses.php" class="nav-link">MyCourses</a></li>';
	    $str.='<li class="nav-item"><a href="editaccount.php" class="nav-link">MyAccount</a></li>';
		$str.='<li class="nav-item"><a href="invoice.php" class="nav-link">View Courses</a></li>';
		$str.='<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>';	          
		$str.='<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';       
        $str.='</ul>';
	    $str.='</div></div>
		</nav>';
	    
		return $str;
}
	public function TeacherBar(){
		$str="";	
		$str.='<div class="collapse navbar-collapse" id="ftco-nav">';
	    $str.='<ul class="navbar-nav mr-auto">';
	    $str.='<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>';
	    $str.='<li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>';
        $str.='<li class="nav-item"><a href="editTeacherAccount.php" class="nav-link">MyAccount</a></li>';
		$str.='<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>';
		$str.='<li class="nav-item"><a href="blog.php" class="nav-link">View Courses</a></li>';
	    $str.='<li class="nav-item"><a href="signup.php" class="nav-link">Included Courses</a></li>';
		$str.='<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';           
        $str.='</ul>';
	    $str.='</div></div>
		</nav>';
	    
		return $str;
	}

	public function AdminBar(){
		$str="";	
		$str.='<div class="collapse navbar-collapse" id="ftco-nav">';
	    $str.='<ul class="navbar-nav mr-auto">';
	    $str.='<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>';
	    $str.='<li class="nav-item"><a href="showsections.php" class="nav-link">Show Sections</a></li>';
        $str.='<li class="nav-item"><a href="showcourses.php" class="nav-link">Show Courses</a></li>';
	    $str.='<li class="nav-item"><a href="showmessages.php" class="nav-link">View Messages</a></li>';
		$str.='<li class="nav-item"><a href="showusers.php" class="nav-link">Show Users</a></li>';
		$str.='<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';          
		$str.='</ul>';
		$str.='</div></div>
		</nav>';
		
	    
		return $str;
	}
}
?>
</body>
</html>