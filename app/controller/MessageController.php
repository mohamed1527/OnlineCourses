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
    public function ContactUSMessage(){
        $sender = $_REQUEST['email'];
        $receiver = $_REQUEST['receiver'];
        $message = $_REQUEST['Message'];

        $this->model->contactus($sender,$receiver,$message);
    }
    public function BlogMessage(){
        $sender = $_REQUEST['email'];
        $receiver = $_REQUEST['receiver'];
        $message = $_REQUEST['Message'];


        $this->model->blog($sender,$receiver,$message);
    }
}