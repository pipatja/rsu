<?php
include('database connection.php');
include('function.php');
if(isset($_POST["course_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT *,
		DATEDIFF(date2, date1) AS walk , 
		DATEDIFF(date3, date1) AS complete,
		price/type AS sqm
		FROM course WHERE id = '".$_POST["course_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// $output["id"] = $row["id"];
		$output["mr"] = $row["mr"];
		$output["name"] = $row["name"];
		$output["phone"] = $row["phone"];
		$output["email"] = $row["email"];
		$output["line"] = $row["line"];
		$output["room"] = $row["room"];
		$output["agent"] = $row["agent"];
		$output["date1"] = $row["date1"];
		$output["date2"] = $row["date2"];
		$output["date3"] = $row["date3"];
		$output["date4"] = $row["date4"];
		$output["sales"] = $row["sales"];
		$output["campaign"] = $row["campaign"];
		$output["status1"] = $row["status1"];
		$output["media1"] = $row["media1"];
		$output["media2"] = $row["media2"];
		$output["media3"] = $row["media3"];
		$output["walk"] = $row["walk"];
		$output["custstatus"] = $row["custstatus"];
		$output["complete"] = $row["complete"];
		$output["type"] = $row["type"];
		$output["price"] = $row["price"];
		$output["sqm"] = $row["sqm"];
		$output["add1"] = $row["add1"];
		$output["add2"] = $row["add2"];

	}
	echo json_encode($output);
}
?>