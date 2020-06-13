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
    <style>
      #paypal-button-container{

        text-align: center;
      }

    </style>
 
    
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
<br>
<br>
<div id="paypal-button-container"></div>
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
  paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
      },
      createOrder: function(data, actions) {
          return actions.order.create({
              purchase_units: [{
                  amount: {
                      value: '1'
                  }
              }]
          });
      },
      onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
      }
  }).render('#paypal-button-container');
</script>


</body>
</html>