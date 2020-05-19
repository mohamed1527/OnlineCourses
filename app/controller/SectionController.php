<?php

  require_once(__ROOT__ . "controller/Controller.php");

class SectionController extends Controller{
    public function AddSection() {
          
        $sectionname=$_REQUEST['SectionName'];
        $sectiontime=$_REQUEST['SectionTime'];
        $sectioncost=$_REQUEST['SectionCost'];
        $sectionlink=$_REQUEST['SectionLink'];
  
      $this->model->addSection($sectionname,$sectiontime,$sectioncost,$sectionlink);
    }

    public function EditSection(){
        $id = $_REQUEST['id'];
        $sectionname=$_REQUEST['SectionName'];
        $sectiontime=$_REQUEST['SectionTime'];
        $sectioncost=$_REQUEST['SectionCost'];
        $sectionlink=$_REQUEST['SectionLink'];

     $this->model->editSection($id,$sectionname,$sectiontime,$sectioncost,$sectionlink);

    }
    public function DeleteSection(){
        $id = $_REQUEST['id'];
        $this->model->deleteSection($id);
      }
    }