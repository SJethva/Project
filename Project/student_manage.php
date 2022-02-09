<?php
	/**************************Connection********************************/
	
	$connection=new mysqli("localhost","root","","movies");
	if($connection->connect_errno)
	{
		echo $connection->connect_error;
		exit;
	}

	$id=isset($_GET['id'])?$_GET['id']:"";
	$edit_id = isset($_GET['edit_id'])?$_GET['edit_id']:"";

	// get data from the form
	$name=$_POST['movie_name'];
	$actor=$_POST['actor'];
	$actress=$_POST['actress'];
	$director=$_POST['director'];
	$year=$_POST['year'];


	/**************************DELETE************************************/

	if($id!="")
	{
		$qry="DELETE FROM movie WHERE id=".$id;
		$result=$connection->query($qry);
		header("location:index.php");
		exit; 
	}

	/**************************UPDATE************************************/
      
		if($edit_id)
		{	
			$qry="UPDATE movie SET name='$name',actor='$actor',actress='$actress',director='$director',year='$year' WHERE id=$edit_id";
			$connection->query($qry);
			header("location:index.php");
			exit;
		}
	

	/**************************INSERT************************************/
 	
 		$qry="INSERT INTO movie values('NULL','$name','$actor','$actress','$director','$year')";

		$connection->query($qry);
		header("location:index.php");
		exit;
?>