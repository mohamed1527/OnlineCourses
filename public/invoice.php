<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/FPDF/fpdf.php");
  require_once(__ROOT__ . "controller/InvoiceController.php");
  require_once(__ROOT__ . "model/CourseModel.php");
  require_once(__ROOT__ . "model/SectionModel.php");
  //require_once(__ROOT__ . "view/ViewTables.php");

  //$model = new FPDF();
  $model = new Course();
  $controller = new InvoiceController($model);
  //$controller1 = new Course($model1);
 // $view = new ViewTable($controller, $model);


  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
  }
  
?>

<form action="invoice.php?action=printReceipt" method="post"> 
    
     <button type="submit" name="login" class="btn">Print Receipt</button>
     <input type="hidden" name="id" id="id" value='<?php echo $_SESSION['ID'];?>'>
  
</form>