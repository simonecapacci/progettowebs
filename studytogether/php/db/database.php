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
                u.email AS creator_email,
                u.role AS creator_role
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
                email,
                role,
                active,
                created_at
            FROM `user`
            ORDER BY username ASC
        ";

        $result = $this->db->query($query);
        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByUsername($username){
        $query = "
            SELECT
                id,
                username,
                email,
                password,
                role,
                active,
                created_at
            FROM `user`
            WHERE username = ?
            LIMIT 1
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
        return $result ? $result->fetch_assoc() : null;
    }

    public function getUserByEmail($email){
        $query = "
            SELECT
                id,
                username,
                email,
                password,
                role,
                active,
                created_at
            FROM `user`
            WHERE email = ?
            LIMIT 1
        ";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function createUser($username, $email, $password){
        $query = "
            INSERT INTO `user` (username, email, password, role, active)
            VALUES (?, ?, ?, 'user', TRUE)
        ";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        if (!$stmt->execute()) {
            return false;
        }

        return true;
    }

    public function authenticateUser($username, $password){
        $user = $this->getUserByUsername($username);

        if (!$user || !(bool) $user['active']) {
            return false;
        }

        $storedPassword = (string) $user['password'];

        if (password_verify($password, $storedPassword) || hash_equals($storedPassword, $password)) {
            unset($user['password']);
            return $user;
        }

        return false;
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
                u.email AS creator_email,
                u.role AS creator_role
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
                u.email AS creator_email,
                u.role AS creator_role
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

    public function createGroup($name, $description, $subject_id, $date, $time, $creator_id){
    $query = "
        INSERT INTO study_group
        (name, description, subject_id, date, time, creator_id)
        VALUES (?, ?, ?, ?, ?, ?)
    ";

    $stmt = $this->db->prepare($query);

    if (!$stmt) {
        die("Prepare failed: " . $this->db->error);
    }

    $stmt->bind_param(
        "ssissi",
        $name,
        $description,
        $subject_id,
        $date,
        $time,
        $creator_id
    );

    return $stmt->execute();
    }
}
?>
