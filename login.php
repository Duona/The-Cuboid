<?php
$link = mysqli_connect("localhost", "root", "abcd@1234", 'cuboid');


if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " , mysqli_connect_error();
}

$email=$_POST['email']; 
$pwd=$_POST['pwd'];  

$sqlQuery = "SELECT userdetails.password
FROM userdetails
WHERE userdetails.email='".$email."'";

$resDetails = mysqli_query($link,$sqlQuery);

foreach($resDetails as $row)
{
	$temppwd=$row['password'];
	if ($temppwd == $pwd )
	{
		$sqlQuery1 = "SELECT userdetails.firstname, userdetails.lastname
		FROM userdetails
		WHERE userdetails.email='".$email."'";
		
		$resDetails1 = mysqli_query($link,$sqlQuery1);
		foreach($resDetails1 as $row1)
		{
			$tempfirstname=$row1['firstname'];
			$templastname=$row1['lastname'];
			echo "$tempfirstname $templastname";
		}
	}
	else
	{
		echo 'fail';
	}
}
?>