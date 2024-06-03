<?php

include  'warnMessage.inc.php';

require 'mailFunction/vendor/autoload.php';

function courseInfo(&$db,
					$course_id){
	
	$course_id = strval($course_id);
	$query = "SELECT * FROM courses WHERE course_id = ".$course_id.";";
	
	$result = $db->query($query);
	
	$row = $result->fetch_assoc();
	
	$courseName = $row['course_name'];
	
	return $courseName;
	
}

function student_email(&$db,
						$enroll_num){
							
	$query = "SELECT * FROM student_record WHERE enrollment_no = ".$enroll_num.";";
	
	$result = $db->query($query);
	
	$row = $result->fetch_assoc();
	
	$stud_email = $row['stud_email'];
	
	return $stud_email;
}

function ward_email(&$db,
						$enroll_num){
							
	$query = "SELECT * FROM student_record WHERE enrollment_no = ".$enroll_num.";";
	
	$result = $db->query($query);
	
	$row = $result->fetch_assoc();
	
	$ward_email = $row['ward_email'];
	
	return $ward_email;
}

function teacher_email(&$db,
						$teacher_id){

	
	$teacher_id = strval($teacher_id);
							
	$query = "SELECT * FROM teacher_record WHERE teacher_id = ".$teacher_id.";";
		
	$result = $db->query($query);
	
	$row = $result->fetch_assoc();
	
	$teacher_email = $row['teacher_email'];
	
	return $teacher_email;
}


function warnButtonMessage($enroll_num,
					$to_parent = false,
					$teacher_id,
					$course_id,
					$bodyFilename = 'MailContent/bodyContent.txt',
					$altBodyFilename = 'MailContent/altBodyContent.txt'){

	
	@ $db = new mysqli('localhost' , 'usr' , 'admin@1224' , 'main_bpitattendance_db');
	
	if( mysqli_connect_errno() ){
		echo 'Error: Could not connect to database. Please try later.';
		exit;
	}
	
	$courseName = courseInfo($db , $course_id);
	
	$course_no = strval($course_id);
	$handle = fopen($bodyFilename,"a+");
	
	
	$bodyContent = fread($handle,filesize($bodyFilename));
	ftruncate($handle,0);
	$bodyContent = str_replace( 'course_name', $courseName , $bodyContent);
	$bodyContent = str_replace( 'course_id', $course_no , $bodyContent);
	
	fwrite($handle,$bodyContent);
	
	fclose($handle);
	
	$handle = fopen($altBodyFilename,"a+");
	
	$altBodyContent = fread($handle,filesize($altBodyFilename));
	ftruncate($handle,0);
	$altBodyContent = str_replace('course_name',$courseName , $altBodyContent);
	$altBodyContent = str_replace('course_id',$course_no , $altBodyContent);

	fwrite($handle,$altBodyContent);
	
	fclose($handle);
	
	
	$stud_email = student_email($db,$enroll_num);
	$ward_email = ward_email($db,$enroll_num);
		
	sendMessage($stud_email);
	
	if( $to_parent ){
		sendMessage($ward_email);
	}
	
}

?>
