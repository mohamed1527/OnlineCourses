<?php
//session_start();
require_once(__ROOT__ . "model/Model.php");

class Message extends Model{ 
        private $id;
        private $sender;
        private $receiver;
        private $message;

        function __construct($sender="",$receiver="",$message="") {
            $this->sender = $sender;
            $this->receiver = $receiver;
            $this->message= $message;
        }
        function getID(){
            return $this->id;
          }
          function setID($id){
            return $this->id = $id;
          }
        function getSender() {
            return $this->sender;
          }
          function setSender($sender) {
            return $this->sender = $sender;
          }
          function getReceiver() {
            return $this->receiver;
          }
          function setReceiver($receiver) {
            return $this->receiver =$receiver;
          } 
          function getMessage() {
            return $this->message;
          }
          function setMessage($message) {
            return $this->message = $message;
          }
          function getMessages(){
            $sql = "SELECT * FROM Messages";
            $dbh = new Dbh();
            $result = $dbh->query($sql);
            $messages = array();
            while($row=mysqli_fetch_assoc($result)){
              $message = new Message();
              $message->setID($row['ID']);
              $message->setSender($row['Sender']);
              $message->setReceiver($row['Receiver']);
              $message->setMessage($row['Message']);
             
              $messages[] = $message;
            }
            return $messages;
          }

          static function send($receiver,$message){
                $sender = $_SESSION['email'];
                $receiver = 'Admin';
                $message = $_POST['Message'];
                $sql="Insert Into Messages (Sender,Receiver,Message) values('$sender', '$receiver','$message');";
                $dbh = new dbh();
                $result = $dbh->query($sql);
                
                if($result === true){
                    echo "<div class='alert alert-success' role='alert'> Send Successfully </div>";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . $conn->error;
                }
          }
          static function contactus($sender,$receiver,$message){
            $sender = $_POST['email'];
            $receiver = 'Admin';
            $message = $_POST['Message'];
            $sql="Insert Into Messages (Sender,Receiver,Message) values('$sender', '$receiver','$message');";
            $dbh = new dbh();
            $result = $dbh->query($sql);
        
            
            if($result === true){
              echo "<div class='alert alert-success' role='alert'> Send Successfully </div>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
      }
      static function blog($sender,$receiver,$message){
        $sender = $_POST['email'];
        $receiver = 'Admin';
        $message = $_POST['Message'];
        $sql="Insert Into Messages (Sender,Receiver,Message) values('$sender', '$receiver','$message');";
        $dbh = new dbh();
        $result = $dbh->query($sql);
    
        
        if($result === true){
          echo "<div class='alert alert-success' role='alert'> Send Successfully </div>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
          static function delete($id){
              $id = $_POST['id'];
              $sql = "DELETE From Messages where ID ='$id';";
              $dbh = new dbh();
              $result = $dbh->query($sql);
              if($result === true){
                echo "Delete Successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . $conn->error;
            }
          }
          }