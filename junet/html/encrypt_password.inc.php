<?php
	function encrypt_password($password){
		$encrypt_psswd = '';
		$encrypt_idcs = '';
		$sz = strlen($password);
		$idx;

		$set = new \Ds\Set();
		for( $i = 0 ; $i < $sz ; $i++ ){
			$idx = rand(0,$sz-1);
			while( $set->contains($idx) ){
				$idx = rand(0,$sz-1);
			}
			$encrypt_psswd .= $password[$idx];
			$set->add($idx);
			$encrypt_idcs .= chr($idx+33);
		}

		$encrypt_psswd .= $encrypt_idcs;

		return $encrypt_psswd;
	}
?>
