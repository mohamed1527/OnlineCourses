<?php
  //define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/UserModel.php");
  require_once(__ROOT__ . "controller/UserController.php");
  //require_once(__ROOT__ . "view/ViewTables.php");
  //require_once(__ROOT__ . "view/bar.php");
  $model = new User();
  $controller = new UserController($model);
 // $view = new ViewTable($controller, $model);
 

  
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../lib/css/amr.css">

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
<form>
	<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
</form>
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
        $str.="<h1>".$teacher->getFirstName()." ".$teacher->getLastName()."</h1>";
		$str.='<ul class="list-group list-group-flush">';
		$str.='<li class="list-group-item">'.$teacher->getPhone()."</li>";
        $str.='<li class="list-group-item">'.$teacher-> getCareer()."</li>";
        $str.='<li class="list-group-item">'.$teacher-> getExperience()."</li></ul>";
        $str.='</div></div>';
		

        return $str;
    

}

}

?>
</nav>
</body>
</html>

