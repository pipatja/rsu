<?php
include('database connection.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO course (name, mr, phone, email, line, room, agent, media1, media2, media3, walk, 
			complete, custstatus, date1, date2, date3, date4, sales, campaign, status1, type, price, sqm, 
			add1, add2) 
			VALUES (:name, :mr, :phone, :email, :line, :room, :agent, :media1, :media2, :media3, :walk, 
			:complete, :custstatus, :date1, :date2, :date3, :date4, :sales, :campaign, :status1, :type, 
			:price, :sqm, :add1, :add2)");
		$result = $statement->execute(
			array(
				':mr'			=>	$_POST["mr"],
				':name'			=>	$_POST["name"],
				':phone'		=>	$_POST["phone"],
				':email'		=>	$_POST["email"],
				':line'			=>	$_POST["line"],
				':room'			=> 	$_POST["room"],
				':agent'		=> 	$_POST["agent"],
				':date1'		=>	$_POST["date1"],
				':date2'		=>	$_POST["date2"],
				':date3'		=>	$_POST["date3"],
				':date4'		=>	$_POST["date4"],
				':sales'		=>  $_POST["sales"],
				':campaign'		=>	$_POST["campaign"],
				':status1'		=>	$_POST["status1"],
				':media1'		=>	$_POST["media1"],
				':media2'		=>	$_POST["media2"],
				':media3'		=>	$_POST["media3"],
				':walk'			=>	$_POST["walk"],
				':custstatus'	=>	$_POST["custstatus"],
				':complete'		=>	$_POST["complete"],
				':type'			=>	$_POST["type"],
				':price'		=>	$_POST["price"],
				':sqm'			=>	$_POST["sqm"],
				':add1'			=>	$_POST["add1"],
				':add2'			=>	$_POST["add2"],
			)
		);
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE course
			SET name = :name, mr = :mr, phone = :phone, email = :email, line = :line, room = :room, agent = :agent, media1 = :media1, media2 = :media2, 
			media3 = :media3, walk = :walk, complete = :complete, custstatus = :custstatus, date1 = :date1, date2 = :date2, date3 = :date3, date4 = :date4, 
			sales = :sales, campaign = :campaign ,status1 = :status1, type = :type, price = :price , sqm = :sqm, add1 = :add1, add2 = :add2 WHERE id = :id");
		$result = $statement->execute(
			array(
				':mr'			=>	$_POST["mr"],
				':name'			=>	$_POST["name"],
				':phone'		=>	$_POST["phone"],
				':email'		=>	$_POST["email"],
				':line'			=>	$_POST["line"],
				':room'			=> 	$_POST["room"],
				':agent'		=> 	$_POST["agent"],
				':date1'		=>	$_POST["date1"],
				':date2'		=>	$_POST["date2"],
				':date3'		=>	$_POST["date3"],
				':date4'		=>	$_POST["date4"],
				':sales'		=>  $_POST["sales"],
				':campaign'		=>	$_POST["campaign"],
				':status1'		=>	$_POST["status1"],
				':media1'		=>	$_POST["media1"],
				':media2'		=>	$_POST["media2"],
				':media3'		=>	$_POST["media3"],
				':walk'			=>	$_POST["walk"],
				':custstatus'	=>	$_POST["custstatus"],
				':complete'		=>	$_POST["complete"],
				':type'			=>	$_POST["type"],
				':price'		=>	$_POST["price"],
				':sqm'			=>	$_POST["sqm"],
				':add1'			=>	$_POST["add1"],
				':add2'			=>	$_POST["add2"],
				':id'			=>	$_POST["course_id"]
			)
		);
	}
}

?>