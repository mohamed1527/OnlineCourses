<?php
abstract class  View2{
    protected $model;
    protected $controller;

    public function __construct($controller, $model) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    public abstract function latestcourses();
   // public abstract function NormalBar();
    //public abstract function AdminBar();
    //public abstract function StudentBar();
    //public abstract function TeacherBar();
}?>