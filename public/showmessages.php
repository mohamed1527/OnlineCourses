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
<form  method = "post" action="showmessages.php">
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
          

<?php
      echo $view->Messages();

?>
<tr> 
<td><input type="hidden" name="id" id="id" value='<?php echo $id;?>'></td>   
   </table>
   </div>    
</div>
</div>
</div>
</form>
</body>
</html>