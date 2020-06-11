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
   <title>Study Room</title>
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
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Courses</h1>
          </div>
        </div>
      </div>
    </section>
    <br>
    <br>

    

<section class="ftco-section">
     <h1 style="text-align: center;">Latest <span> Courses </span></h1>
     <hr>
     


      </div>
      <div class="container"> 
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
             <div class="card">
              <img src="images/literature.jpg"  style="width:100%;">
               <h3>Literature</h3>
                <div class="chip">
                 <img src="images/manar.jpeg" alt="Person" width="80" height="90">
                  <p>Manar Ahmed <a href="index.html">view profile</a> </p>
                  

                  
                 </div>
                <button>30$</button>
             </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/Math.jpg"  style="width:100%">
               <h3>Math</h3>
                <div class="chip">
                 <img src="images/reham.jpeg" alt="Person" width="80" height="90">
                  <p>Reham Hassan <a href="index.html">view profile</a> </p>
                  
                 </div>

  <button>30$</button>
</div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              
             <div class="card">
              <img src="images/Arabic.jpg" style="width:100%">
               <h3>Arabic OL</h3>
                <div class="chip">
                 <img src="images/awad.jpeg" alt="Person" width="80" height="90">
                  <p>Mahmoud Awad <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
         
   <div class="card">
              <img src="images/Economics.jpg"  style="width:100%">
               <h3>Economics Busit</h3>
                <div class="chip">
                 <img src="images/sally.jpeg" alt="Person" width="80" height="90">
                  <p>Sally Mahfouz <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>
        </div>
        

          <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              
           <div class="card">
              <img src="images/ESL.jpg"  style="width:100%">
               <h3>ESL</h3>
                <div class="chip">
                 <img src="images/reem.jpg" alt="Person" width="80" height="90">
                  <p>Reem  Sayed <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/french.jpg"  style="width:100%">
               <h3>French</h3>
                <div class="chip">
                 <img src="images/marwa.jpeg" alt="Person" width="80" height="90">
                  <p>Marwa Ahmed<a href="index.html">view profile</a></p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>
                 <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              
       <div class="card">
              <img src="images/biology.jpg"  style="width:100%">
               <h3>Biology</h3>
                <div class="chip">
                 <img src="images/heba.jpeg" alt="Person" width="80" height="90">
                  <p>Heba Sadek <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>
                 <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              
     <div class="card">
              <img src="images/Enviromental.jpg"  style="width:100%">
               <h3>Enviromental</h3>
                <div class="chip">
                 <img src="images/assem.jpeg" alt="Person" width="80" height="90">
                  <p>Abdel Monem <a href="index.html">view profile</a> </p>
                 </div>  
                 <button>30$</button>
</div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/chemistry.jpg"  style="width:100%">
               <h3>Chemistry OL</h3>
                <div class="chip">
                 <img src="images/amany.jpeg" alt="Person" width="80" height="90">
                  <p>Amany Hamdy <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/literature.jpg"  style="width:100%">
               <h3>Chemistry AL</h3>
                <div class="chip">
                 <img src="images/manar.jpeg" alt="Person" width="80" height="90">
                  <p>Manar Ahmed <a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/Arabic.jpg"  style="width:100%">
               <h3>Chemistry AL</h3>
                <div class="chip">
                 <img src="images/awad.jpeg" alt="Person" width="80" height="90">
                  <p>Mahmoud Awad<a href="index.html">view profile</a> </p>
                 </div>
  <button>30$</button>
</div>
            </div>
          </div>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <div class="card">
              <img src="images/Economics.jpg"  style="width:100%">
               <h3>Economics Busit</h3>
                <div class="chip">
                 <img src="images/sally.jpeg" alt="Person" width="80" height="90">
                  <p>Sally Mahfouz <a href="index.html">view profile</a> </p>
                 </div>
  <button>$30</button>
</div>
            </div>
          </div>
        </div>
</div>

       
    </section>

    
    
    <section class="ftco-section testimony-section bg-primary">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <span class="subheading">Testimonial</span>
            <h2 class="mb-4">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Roger Scott</p>
                        <span class="position">Marketing Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h5 class="font-weight-bold">Home Builder</h5>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          </div>
          <div class="col-md-4">
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="bg-primary w-100 rounded px-md-0 px-4">
              <div class="row d-flex justify-content-center">
                <div class="col-lg-8 py-4">
                  <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                      <h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                      <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                          <input type="text" class="form-control" placeholder="Enter email address">
                          <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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