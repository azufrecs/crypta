<?php

$CLAVE_SECRETA = 'La Baby nacio en el 2013 */';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $secretKey = $_POST['secretKey'];
    $encryptedPassword = encrypt_password($password, $secretKey);
    echo $encryptedPassword;
    exit;
}

function encrypt_password($password, $CLAVE_SECRETA)
{
    $hash = hash_hmac('sha256', $password, $CLAVE_SECRETA);
    return $hash;
}