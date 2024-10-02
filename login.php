<?php
require "DataBase.php";
$db = new DataBase();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username && $password) {
    if ($db->dbConnect()) {
        $loginSuccess = $db->logIn("users", $username, $password);
        if ($loginSuccess) {
            echo "Login Success";
        } else {
            echo "Username or Password wrong";
        }
    } else {
        echo "Error: Database connection";
    }
} else {
    echo "All fields are required";
}
?>