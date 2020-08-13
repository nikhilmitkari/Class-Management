
<?php
if($_SERVER['REQUEST_METHOD']== "POST" && isset($_GET['id'])){
		require('../connection.php');
				
		$name = $_POST['t_name'];
		$gender = $_POST['t_gender'];
		$qualification = $_POST['t_qua'];
		$experience = $_POST['t_exp'];
		$phone = $_POST['t_phone'];
		$email = $_POST['t_mail'];

		
		$query = " UPDATE cm_teacher_details".
		" SET t_name = '$name', t_gender = '$gender', t_qualification = '$qualification', t_experience = '$experience', t_phone_no = '$phone', t_mail_id = '$email'".
		 "where t_id =" .$_GET['id'] ;                                                         
																								
		$res = mysqli_query($conn, $query);
		$message =" ";
		
		if($res){
			$message = "Information updated succefully !";
		}else{
			$message = mysqli_error($conn);
		}
		header("Location: teacher_data.php?u_msg=$message");
}
?>