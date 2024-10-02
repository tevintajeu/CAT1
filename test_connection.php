<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "DataBase.php";

$db = new DataBase();
if ($db->dbConnect()) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}
?>