<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['allocate'])){
		require '../connection.php';
		
		$teacher_id = $_POST['sel_teacher'];
		$subject = $_POST['sel_sub'];
		$class = $_POST['sel_class'];
			
		if($teacher_id!='err' && $subject!='err' && $class!='err'){	
		$query = "INSERT INTO cm_mapping(map_tid, map_sname, map_clsname) values('$teacher_id', '$subject', '$class')";
		$res = mysqli_query($conn, $query);		
		$message= "";
		if($res){
			$message = "Completed!" ;
		}else{
			$message = mysqli_error($conn);
		}
	header("Location: teacher_mapping.php?toast=$message");
	}else{
	$message = "Please select all the fields!";
	header("Location: teacher_mapping.php?toast_err=$message");
	}
}
?>