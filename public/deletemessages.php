<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/MessageModel.php");
  require_once(__ROOT__ . "controller/MessageController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Message();
  $controller = new MessageController($model);
  $view = new ViewTable($controller, $model);

  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }

?>
<?php
$id=$_GET['id'];
foreach($model->getMessages() as $course)
{
    if($course->getID() == $id)
    {
        $messageid = $course->getID();
        $sender = $course->getSender();
        $receiver = $course->getReceiver();
        $message = $course->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/SEmvc7/lib/css/mycss.css">
</head>
<body>
<form  method = "post" action="showmessages.php?action=DeleteMessage">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Messages</th>
                <th>Delete</th>
              </tr>
          </thead>
          <tbody>
          
<tr> 
<td><?php echo $id;?></td> 
<td><input type="text"  id="sender" placeholder="Enter Sender" name="sender" value="<?php echo $sender;?>" disabled></td>
<td><input type="text"  id="reciever" placeholder="Enter Course ID" name="reciever" value="<?php echo $receiver;?>" disabled></td>
<td><input type="text"  id="message" placeholder="Enter Course Type" name="message" value="<?php echo $message;?>" disabled></td>  
<td> <button type="submit" class="btn btn-default">Are you sure to delete message?</button> </td>
<td><input type="hidden" name="id" id="id" value='<?php echo $id;?>'></td> 
   </table>
   </div>    
</div>
</div>
</div>
</form>
</body>
</html>