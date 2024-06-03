<?php
function gen_hash($password){
	$h_value = hash('xxh128',$password);

	return $h_value;
}
?>
