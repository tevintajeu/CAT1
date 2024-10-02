<?php
require "DataBase.php";
$db = new DataBase();

$fullname = $_POST['fullname'] ?? null;
$email = $_POST['email'] ?? null;
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($fullname && $email && $username && $password) {
    if ($db->dbConnect()) {
        $signUpSuccess = $db->signUp("users", $fullname, $email, $username, $password);
        if ($signUpSuccess) {
            echo "Sign Up Success";
        } else {
            echo "Sign up Failed";
        }
    } else {
        echo "Error: Database connection";
    }
} else {
    echo "All fields are required";
}
?>