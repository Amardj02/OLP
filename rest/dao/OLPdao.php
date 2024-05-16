<?php
require_once __DIR__ . '/../config.php';
class OLPDao {

    private $conn;

    public function __construct(){
        try {

        $servername = "localhost";
        $serverport = "3306";
        $username = "root";
        $password = "root";
        $schema = "online_learning_platform";

        /*options array neccessary to enable ssl mode - do not change*/
        /*$options = array(
        	PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );*/

        $this->conn = new PDO("mysql:host=$servername;port=$serverport;dbname=$schema", $username, $password);  
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getCourses(){
        $query = "select * from courses;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

   

    public function getLectures(){
        $query = "select * from lectures;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

  
    public function getUsers(){
        $query = "select * from users;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function addMaterial($data){
        $query = "INSERT INTO materials (";
        foreach ($data as $column => $value) {
            $query.=$column.",";
        }
        $query = substr($query, 0, -1);
        $query.=") VALUES (";
        foreach ($data as $column => $value) {
            $query.="'$value',";
        }
        $query = substr($query, 0, -1);
        $query.=");";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function addCourse($data){
        $query = "INSERT INTO courses (";
        foreach ($data as $column => $value) {
            $query.=$column.",";
        }
        $query = substr($query, 0, -1);
        $query.=") VALUES (";
        foreach ($data as $column => $value) {
            $query.="'$value',";
        }
        $query = substr($query, 0, -1);
        $query.=");";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function addUser($data){
        $query = "INSERT INTO users (";
        foreach ($data as $column => $value) {
            $query.=$column.",";
        }
        $query = substr($query, 0, -1);
        $query.=") VALUES (";
        foreach ($data as $column => $value) {
            $query.="'$value',";
        }
        $query = substr($query, 0, -1);
        $query.=");";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    
    public function addLecture($data){
        $query = "INSERT INTO lectures (";
        foreach ($data as $column => $value) {
            $query.=$column.",";
        }
        $query = substr($query, 0, -1);
        $query.=") VALUES (";
        foreach ($data as $column => $value) {
            $query.="'$value',";
        }
        $query = substr($query, 0, -1);
        $query.=");";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }



    
    public function deleteLecture($id){
        $query = "DELETE FROM lectures WHERE id=$id;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        echo "\nDeleted $id successfully.";
    }
    public function deleteCourse($id){
        $query = "DELETE FROM courses WHERE id=$id;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        echo "\nDeleted $id successfully.";
    }

    public function deleteUser($id){
        $query = "DELETE FROM users WHERE id=$id;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        echo "\nDeleted $id successfully.";
    }
}
