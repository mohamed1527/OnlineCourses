<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/FPDF/fpdf.php");
  require_once(__ROOT__ . "controller/InvoiceController.php");
  //require_once(__ROOT__ . "view/ViewTables.php");

  $model = new FPDF();
  $controller = new InvoiceController($model);
 // $view = new ViewTable($controller, $model);


  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }
?>

<form action="invoice.php?action=printReceipt" method="post"> 
    <hidden><?php echo $_SESSION['ID'];?></hidden>
     
     <input type="text"  id="FirstName" placeholder="Enter First name" name="FirstName" value="<?php echo $_SESSION['FirstName'];?>">
     <input type="text"  id="LastName" placeholder="Enter Last name" name="LastName" value="<?php echo $_SESSION['LastName'];?>">
     <input type="text"  id="Phone" placeholder="Enter Phone Number" name="Phone" value="<?php echo $_SESSION['Phone'];?>">
     <button type="submit" name="login" class="btn">Print Receipt</button>
     <input type="hidden" name="id" id="id" value='<?php echo $_SESSION['ID'];?>'>
  
</form>