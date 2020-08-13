
<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
		require('../connection.php');
				
		$name = $_POST['std_name'];
		$rollno = $_POST['std_rollno'];
		$gender = $_POST['std_gender'];
		$class = $_POST['std_class'];
		$phone = $_POST['std_phone'];
		$email = $_POST['std_mail'];

		
		$query = " UPDATE cm_student_details SET student_name = '$name', student_gender = '$gender', student_class = '$class', student_phone_no = '$phone', student_mailid = '$email' where student_roll_no = '$rollno' ";                                                         
																								
		$res = mysqli_query($conn, $query);
		$message =" ";
		
		if($res){
			$message = "Information updated succefully !";
		}else{
			$message = mysqli_error($conn);
		}
		header("Location: student_data.php?u_msg=$message");
}
?>