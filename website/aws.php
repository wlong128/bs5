<?php
// XAMPP 8.2 ProFTP Daemon 密碼加密規則
function make_seed()
{

  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$random = rand();
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./";
$salt = 'substr($chars, $random % 64, 1) . substr($chars, ($random / 64) % 64, 1)';
$pass = '123456';
$crypted = crypt($pass, $salt);
echo $crypted . "
	";
