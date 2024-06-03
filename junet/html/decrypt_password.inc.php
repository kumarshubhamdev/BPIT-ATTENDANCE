<?php
	function decrypt_password($sz_pwd,$password){
		$en_pwd = substr($password,0,$sz_pwd);
		$key = substr($password,$sz_pwd);

		$key_arr = array();
		for( $i = 0 ; $i < $sz_pwd ; $i++ ){
			$key_arr[$i] = ord($key[$i]) - 33;
		}

		$dcpt_pwd = new SplFixedArray($sz_pwd);
		
		for( $i = 0 ; $i < $sz_pwd ; $i++ ){
			$dcpt_pwd[$key_arr[$i]] = $en_pwd[$i];
		}

		$decrypt_password = '';

		for( $i = 0 ; $i < $sz_pwd ; $i++ ){
			$decrypt_password .= $dcpt_pwd[$i];
		}

		return $decrypt_password;
	}
?>
