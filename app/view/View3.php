<?php
abstract class  View3{
    protected $model;
    protected $controller;

    public function __construct($controller, $model) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    public abstract function coursesdescription();
   // public abstract function NormalBar();
    //public abstract function AdminBar();
    //public abstract function StudentBar();
    //public abstract function TeacherBar();
}?>