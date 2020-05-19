<?php

  require_once(__ROOT__ . "controller/Controller.php");

class MessageController extends Controller{
    public function SendMessage() {
        $sender = $_SESSION['Email'];
        $receiver = $_REQUEST['Receiver'];
        $message = $_REQUEST['Message'];

        $this->model->send($sender,$receiver,$message);
    }
    public function DeleteMessage(){
        $id = $_POST['ID'];

        $this->model->delete($id);
    }
}