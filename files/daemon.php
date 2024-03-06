<?php
function make_seed()
{

  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$random = rand();
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./";
$salt = 'substr($chars, $random % 64, 1) . substr($chars, ($random / 64) % 64, 1)';
if(isset($_GET['pw'])){
    $pass = $_GET['pw'];
$crypted = crypt($pass, $salt);
echo $crypted . "";
}else{
    echo '網址缺少 pw 參數';
}
