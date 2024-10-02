<?php
require "DataBaseConfig.php";

class DataBase
{
    private $conn;
    private $sql;

    public function dbConnect()
    {
        $config = new DataBaseConfig();
        $this->conn = new mysqli($config->servername, $config->username, $config->password, $config->databasename);

        if ($this->conn->connect_error) {
            return false;
        } else {
            return true;
        }
    }

    public function prepareData($data)
    {
        return mysqli_real_escape_string($this->conn, stripslashes(htmlspecialchars($data)));
    }

    public function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "SELECT * FROM " . $table . " WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = $this->conn->query($this->sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function signUp($table, $fullname, $email, $username, $password)
    {
        $fullname = $this->prepareData($fullname);
        $email = $this->prepareData($email);
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "INSERT INTO " . $table . " (fullname, email, username, password) VALUES ('" . $fullname . "', '" . $email . "', '" . $username . "', '" . $password . "')";
        if ($this->conn->query($this->sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>