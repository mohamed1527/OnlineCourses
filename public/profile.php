<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/TeacherModel.php");
require_once(__ROOT__ . "controller/TeacherController.php");
require_once(__ROOT__ . "view/ViewTeacher.php");

$model = new Teacher();
$controller = new TeacherController($model);
$view = new ViewTeacher($controller, $model);


echo $view->Teachers();

?>

