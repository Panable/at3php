<?php
if ($argc < 2) {
    die("Usage: php hash_password.php <password>\n");
}

$password = $argv[1];
$hash = password_hash($password, PASSWORD_DEFAULT);

if ($hash === false) {
    die("Password hash failed.\n");
}

echo "Hashed password ($password): $hash\n";
?>

