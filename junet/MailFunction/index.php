<?php
	
	include 'warnScript.inc.php';
	
	$enroll_num = $_REQUEST['enroll_no'];
	$teacher_id = $_REQUEST['teacher_id'];
	$course_id = intval($_REQUEST['course_id']);

	warnButtonMessage($enroll_num,false,$teacher_id,$course_id);

?>
