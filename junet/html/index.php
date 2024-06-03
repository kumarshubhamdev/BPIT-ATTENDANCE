<?php

include 'encrypt_password.inc.php';
include 'hash_gen.inc.php';
include 'decrypt_password.inc.php';

$password = $_REQUEST['password'];
$en_pwd = encrypt_password($password);

echo "Given Passowrd: ".$password."<br>";
echo "Encrypted Password for database: ".$en_pwd." <br>";
echo "Hash value of given password: ".gen_hash($password)."<br>";
echo "Decrypted Password from the database: ".decrypt_password(strlen($password),$en_pwd);
?>
