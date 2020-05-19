<?php
  define('__ROOT__', "../app/");
  require_once(__ROOT__ . "model/SectionModel.php");
  require_once(__ROOT__ . "controller/SectionController.php");
  require_once(__ROOT__ . "view/ViewTables.php");

  $model = new Section();
  $controller = new SectionController($model);
  $view = new ViewTable($controller, $model);
?>

<?php
$id=$_GET['id'];
foreach($model->getSections() as $section)
{
    if($section->getID() == $id)
    {
        $id = $section->getID();
        $Sectionname = $section->getSectionname();
        $Sectiontime = $section->getSectiontime();
        $Sectioncost = $section->getSectioncost();
        $Sectionlink = $section->getSectionlink();
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/SEmvc7/lib/css/mycss.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="../lib/css/animate.css">
    
    <link rel="stylesheet" href="../lib/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../lib/css/magnific-popup.css">

    <link rel="stylesheet" href="../lib/css/ionicons.min.css">
    
    <link rel="stylesheet" href="../lib/css/flaticon.css">
    <link rel="stylesheet" href="../lib/css/icomoon.css">
    <link rel="stylesheet" href="../lib/css/style.css">
<body>
<?php
    require_once(__ROOT__ . "view/bar.php");
    $view1 = new Bar($controller, $model);
    if (isset($_SESSION['type']) && !empty($_SESSION['type'])) {
      switch($_SESSION['type']){
        case 'Admin': 
          echo $view1->AdminBar();
          break;
        case 'Teacher':
          echo $view1->TeacherBar();
          break;
        case 'Student':
          echo $view1->StudentBar();
          break;       
      }
    }
    else {
      echo $view1->NormalBar();

    }
    ?>  
<form  method = "post" action="showsections.php?action=EditSection">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>SectionName</th>
              <th>SectionTime</th>
              <th>SectionCost</th>
              <th>SectionLink</th>
              <th>Edit</th>
              </tr>
          </thead>
          <tbody>
          <tr>   
    <td><?php echo $id;?></td>
     
    <td><input type="text"  id="SectionName" placeholder="Enter Section name" name="SectionName" value="<?php echo $Sectionname;?>"></td>
    <td><input type="time"  id="SectionTime" placeholder="Enter Section time" name="SectionTime" value="<?php echo $Sectiontime;?>"></td>
    <td><input type="text"  id="SectionCost" placeholder="Enter Section cost" name="SectionCost" value="<?php echo $Sectioncost;?>"></td>
    <td><input type="text"  id="SectionLink" placeholder="Enter Section link" name="SectionLink" value="<?php echo $Sectionlink;?>"></td>
    <td> <button type="submit" class="btn btn-default">Are you sure to edit ? </button> </td>
    <td><input type="hidden" name="id" id="id" value='<?php echo $id;?>'>
</table>
</div>
</div>
</div>
</div>
</form>
</body>
</html>