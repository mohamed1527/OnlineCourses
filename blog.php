<?php
 define('__ROOT__', "../app/");
 require_once(__ROOT__ . "model/UserModel.php");
 require_once(__ROOT__ . "model/CourseModel.php");
 require_once(__ROOT__ . "controller/UserController.php");
 require_once(__ROOT__ . "controller/CourseController.php");

 

  $model = new User();
  //$model = new Course();
  $controller = new UserController($model);
  //$controller = new CourseController($model);
  

if (isset($_GET['action']) && !empty($_GET['action'])) {
  $controller->{$_GET['action']}();
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Study</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="../lib/css/animate.css">
    
    <link rel="stylesheet" href="../lib/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../lib/css/magnific-popup.css">

    <link rel="stylesheet" href="../lib/css/ionicons.min.css">
    
    <link rel="stylesheet" href="../lib/css/flaticon.css">
    <link rel="stylesheet" href="../lib/css/icomoon.css">
    <link rel="stylesheet" href="../lib/css/style.css">
  </head>
  <body>

    <?php
    require_once(__ROOT__ . "view/bar.php");
    $view = new Bar($controller, $model);
    if (isset($_SESSION['type']) && !empty($_SESSION['type'])) {
      switch($_SESSION['type']){
        case 'Admin': 
          echo $view->AdminBar();
          break;
        case 'Teacher':
          echo $view->TeacherBar();
          break;
        case 'Student':
          echo $view->StudentBar();
          break;       
      }
    }
    else {
      echo $view->NormalBar();

    }
    ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </section>
   	
		<section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>

          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_4.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_5.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
              
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_6.jpg');">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4">
								<h2 class="footer-heading">About us</h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<ul class="ftco-footer-social p-0">
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
		            </ul>
							</div>
							<div class="col-md-8">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-10">
										<div class="row">
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Services</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Construction</a></li>
						              <li><a href="#" class="py-1 d-block">House Renovation</a></li>
						              <li><a href="#" class="py-1 d-block">Painting</a></li>
						              <li><a href="#" class="py-1 d-block">Arhictecture Design</a></li>
						            </ul>
											</div>
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">About</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Staff</a></li>
						              <li><a href="#" class="py-1 d-block">Team</a></li>
						              <li><a href="#" class="py-1 d-block">Careers</a></li>
						              <li><a href="#" class="py-1 d-block">Blog</a></li>
						            </ul>
											</div>
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Resources</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Security</a></li>
						              <li><a href="#" class="py-1 d-block">Global</a></li>
						              <li><a href="#" class="py-1 d-block">Charts</a></li>
						              <li><a href="#" class="py-1 d-block">Privacy</a></li>
						            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
					  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
						<h2 class="footer-heading">Request A Quote</h2>
						<form action="#" class="contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
              	<button type="submit" class="form-control submit px-3">Send</button>
              </div>
            </form>
					</div>
				</div>
			</div>
		</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../lib/js/jquery.min.js"></script>
  <script src="../lib/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../lib/js/popper.min.js"></script>
  <script src="../lib/js/bootstrap.min.js"></script>
  <script src="../lib/js/jquery.easing.1.3.js"></script>
  <script src="../lib/js/jquery.waypoints.min.js"></script>
  <script src="../lib/js/jquery.stellar.min.js"></script>
  <script src="../lib/js/jquery.animateNumber.min.js"></script>
  <script src="../lib/js/owl.carousel.min.js"></script>
  <script src="../lib/js/jquery.magnific-popup.min.js"></script>
  <script src="../lib/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../lib/js/google-map.js"></script>
  <script src="../lib/js/main.js"></script>
    
  </body>
</html>