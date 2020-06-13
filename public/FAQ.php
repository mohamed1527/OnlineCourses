<html>
<title> FAQ Page</title>
<head>
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
    <link rel="stylesheet" href="../lib/css/FAQ.css">

    

</head>

<body>
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/CourseModel.php");
require_once(__ROOT__ . "controller/CourseController.php");
require_once(__ROOT__ . "view/ViewTables.php");

$model = new Course();
$controller = new CourseController($model);
$view = new ViewTable($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action'])) {
  $controller->{$_GET['action']}();
}


require_once(__ROOT__ . "view/bar.php");
    $view1 = new Bar($controller, $model);
    if (isset($_SESSION['type']) && !empty($_SESSION['type'])) {
      switch($_SESSION['type']){
        case 'Admin': 
          echo $view1->AdminBar();
          break;
        case 'Teacher':
          echo $view1->TeacherBar();
          break;
        case 'Student':
          echo $view1->StudentBar();
          break;       
      }
    }
    else {
      echo $view1->NormalBar();

    }
?>

<div class="container">
        
        <h1><b>FAQ :-</b></h1>
        <hr> <br>
        
         <tr>
         <td> <center>  <h1>Question </h1> </center></td> 
         <td>Why was the online system developed ??</td> <br>
         <td>Does The online Course served many courses in the feilds ??</td> <br> 
         <td>Is there many Teachers in the site ??</td> <br>
         <td>Is there any available teachers outside egypt ??</td>  <br>
         <td>What is the Most applied courses ??</td> <br>
         </tr>
         <br><br><br>


         <tr>
         <td> <center>  <h1>Answers </h1> </center></td> 
         <td>To faciltate the education between students and teachers</td> <br>
         <td>yes it has many courses through too many categories</td>  <br>
         <td>there is more teachers that will apply in the system</td> <br>
         <td>we have opened an online application to let teachers apply in the course </td> <br>  
         <td>The courses of the programming for computer science students </td> <br>
         </tr>




        

</div>


</div>

</body>

</html>