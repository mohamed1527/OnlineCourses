<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . 'db/Dbh.php');
$dbh=new Dbh();

$output = '';
if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	$query = "
	SELECT * FROM User
    WHERE FirstName LIKE '%".$search."%'
    OR LastName LIKE '%".$search."%'
	OR Email LIKE '%".$search."%' 
	OR Phone LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM User ORDER BY ID";
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
					<th>FirstName</th>
					<th>LastName</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>';
	while($row = $dbh->fetchRow($result))
	{
		$output .= '
            <tr>
                <td>'.$row["ID"].'</td>
				<td>'.$row["FirstName"].'</td>
				<td>'.$row["LastName"].'</td>
				<td>'.$row["Email"].'</td>
				<td>'.$row["Phone"].'</td>
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