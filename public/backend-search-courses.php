<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . 'db/Dbh.php');
$dbh=new Dbh();

$output = '';
if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	$query = "
	SELECT *,Course.ID  FROM Course INNER Join Course_Duration
    ON Course.ID = Course_Duration.CourseID 
    WHERE CourseName LIKE '%".$search."%'
    OR CourseType LIKE '%".$search."%'
	OR CourseCost LIKE '%".$search."%' 
    OR CourseDescription LIKE '%".$search."%' 
    OR Course_Duration.CourseWeeks LIKE '%".$search."%' 
    OR Course_Duration.CourseHours LIKE '%".$search."%'
    OR Course_Duration.StartDate LIKE '%".$search."%'
    OR Course_Duration.End_Date LIKE '%".$search."%'   
	";
}
else
{
	$query = "
	SELECT *,Course.ID  FROM Course INNER Join Course_Duration
    ON Course.ID = Course_Duration.CourseID ";
}
$result =$dbh->query($query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
    <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Cost</th>
                <th>Description</th>
                <th>Weeks</th>
                <th>Hours</th>
                <th>Start</th>
                <th>End</th>
              </tr>';
            
	while($row = $dbh->fetchRow($result))
	{
		$output .= '
            <tr>
                <td>'.$row["ID"].'</td>
				<td>'.$row["CourseName"].'</td>
				<td>'.$row["CourseType"].'</td>
				<td>'.$row["CourseCost"].'</td>
                <td>'.$row["CourseDescription"].'</td>
                <td>'.$row["CourseWeeks"].'</td>
                <td>'.$row["CourseHours"].'</td>
                <td>'.$row["StartDate"].'</td>
                <td>'.$row["End_Date"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>