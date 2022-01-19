<?php
	require("db.php");

	// $res = $obj->add_teacher($_POST);
	
	// if( $res == 1){
	// 	header("Location:teachers.php");
	// }
	// else{
	// 	echo "sorry";
	// }
	$res = $obj->add_student($_POST);
	
	if( $res == 1){
		header("Location:students.php");
	}
	else{
		echo "sorry";
	}
?>