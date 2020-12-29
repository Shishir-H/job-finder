<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'jobfinder');
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
		die();
	}
?>