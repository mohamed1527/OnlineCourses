<?php
  session_start();
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/MessageModel.php");
  require_once(__ROOT__ . "controller/MessageController.php");
  //require_once(__ROOT__ . "view/bar.php");

  $model = new Message();
  $controller = new MessageController($model);
  //$view = new ViewTable($controller, $model);
  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }

?>
<html>
<body>
<div class="div" >
<form action='sendmessage.php?action=SendMessage' method='post' >
<label><b>Message :<b><label><br>
<textarea name="Message" required ></textarea><br>
<input name="receiver" value="<?php echo $receiver;?>"  hidden />
<input name="id" value="<?php echo $id;?>"  hidden />
<button type='submit' name="send" class='btn btn-primary btn-sm' id='btn'>Send</button>
</form>
</div>
</body>
</html>



