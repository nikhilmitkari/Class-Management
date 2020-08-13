<?php
	if(isset($_GET['id'])){
		require '../connection.php';
		
		$query = "DELETE FROM cm_teacher_details where t_id =" .$_GET['id'];
		$res = mysqli_query($conn, $query);
		$message = "";
		
		if($res){
			$message = "Data Deleted Successfully!";
		}else{
			$message = mysqli_error($conn);
		}
		
		header("Location: teacher_data.php?u_msg=$message");
	}
?>