<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, "", $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        if (!$this->db->query("CREATE DATABASE IF NOT EXISTS `$dbname`")) {
            die("Database creation failed: " . $this->db->error);
        }

        if (!$this->db->select_db($dbname)) {
            die("Database selection failed: " . $this->db->error);
        }
    }
}
?>
