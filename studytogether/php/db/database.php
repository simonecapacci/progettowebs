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

    public function getGroups(){
        $query = "
            SELECT
                sg.id,
                sg.name,
                sg.description,
                sg.date,
                sg.time,
                sg.created_at,
                sg.subject_id,
                s.name AS subject_name,
                sg.creator_id,
                u.username AS creator_username,
                u.name AS creator_name,
                u.surname AS creator_surname
            FROM study_group sg
            INNER JOIN subject s ON sg.subject_id = s.id
            INNER JOIN `user` u ON sg.creator_id = u.id
            ORDER BY sg.date ASC, sg.time ASC, sg.created_at DESC
        ";

        $result = $this->db->query($query);
        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsers(){
        $query = "
            SELECT
                id,
                username,
                role,
                name,
                surname,
                active,
                created_at
            FROM `user`
            ORDER BY surname ASC, name ASC, username ASC
        ";

        $result = $this->db->query($query);
        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getGroupsByUsername($username){
        $query = "
            SELECT
                sg.id,
                sg.name,
                sg.description,
                sg.date,
                sg.time,
                sg.created_at,
                sg.subject_id,
                s.name AS subject_name,
                sg.creator_id,
                u.username AS creator_username,
                u.name AS creator_name,
                u.surname AS creator_surname
            FROM study_group sg
            INNER JOIN subject s ON sg.subject_id = s.id
            INNER JOIN `user` u ON sg.creator_id = u.id
            WHERE u.username = ?
            ORDER BY sg.date ASC, sg.time ASC, sg.created_at DESC
        ";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param("s", $username);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getGroupsBySubject($subjectName){
        $query = "
            SELECT
                sg.id,
                sg.name,
                sg.description,
                sg.date,
                sg.time,
                sg.created_at,
                sg.subject_id,
                s.name AS subject_name,
                sg.creator_id,
                u.username AS creator_username,
                u.name AS creator_name,
                u.surname AS creator_surname
            FROM study_group sg
            INNER JOIN subject s ON sg.subject_id = s.id
            INNER JOIN `user` u ON sg.creator_id = u.id
            WHERE s.name = ?
            ORDER BY sg.date ASC, sg.time ASC, sg.created_at DESC
        ";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param("s", $subjectName);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getSubjects(){
        $query = "
            SELECT
                id,
                name
            FROM subject
            ORDER BY name ASC
        ";

        $result = $this->db->query($query);
        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
