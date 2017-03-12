<?php
$link = mysqli_connect("localhost", "root", "abcd@1234", 'cuboid');


if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " , mysqli_connect_error();
}

$firstname=$_POST['firstname']; 
$lastname=$_POST['lastname']; 
$email=$_POST['email']; 
$pwd=$_POST['pwd'];  

$sqlQuery = "SELECT userdetails.email
FROM userdetails";


$resDetails = mysqli_query($link,$sqlQuery);

$notfound=true;
foreach($resDetails as $row)
{
	$tempemail=$row['email'];
	if ($tempemail == $email )
	{
		$notfound=false;
	}
}
if($notfound)
{
$sqlQuery= "INSERT INTO `cuboid`.`userdetails` (`email`, `password`, `firstname`, `lastname`) VALUES ('".$email."', '".$pwd."', '".$firstname."', '".$lastname."');";
mysqli_query($link,$sqlQuery);
}
else
{
	echo 'exists';
}


?>