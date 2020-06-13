<?php

  require_once(__ROOT__ . "controller/Controller.php");

class MessageController extends Controller{
    public function SendMessage() {
       // $sender = $_SESSION['Email'];
        $receiver = $_REQUEST['receiver'];
        $message = $_REQUEST['Message'];

        $this->model->send($receiver,$message);
    }
    public function DeleteMessage(){
        $id = $_REQUEST['id'];

        $this->model->delete($id);
    }
}