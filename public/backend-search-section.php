<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . 'db/Dbh.php');
$dbh=new Dbh();

$output = '';
if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	$query = "
	SELECT * FROM Section
    WHERE SectionName LIKE '%".$search."%'
    OR SectionTime LIKE '%".$search."%'
	OR SectionCost LIKE '%".$search."%' 
	OR SectionLink LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM Section ORDER BY ID";
}
$result =$dbh->query($query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="container">
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
				</tr>';
	while($row = $dbh->fetchRow($result))
	{
		$output .= '
            <tr>
                <td>'.$row["ID"].'</td>
				<td>'.$row["SectionName"].'</td>
				<td>'.$row["SectionTime"].'</td>
				<td>'.$row["SectionCost"].'</td>
				<td>'.$row["SectionLink"].'</td>
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