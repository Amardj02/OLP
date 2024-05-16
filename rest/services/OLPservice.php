<?php
require_once __DIR__."/../dao/OLPdao.php";

class OLPService {
    private $dao;

    public function __construct() {
        $this->dao = new OLPDao();
    }

    public function getCourses() {
        return $this->dao->getCourses();
    }

    public function getLectures() {
        return $this->dao->getLectures();
    }

    public function getUsers() {
        return $this->dao->getUsers();
    }

    public function addMaterial($data) {
        return $this->dao->addMaterial($data);
    }

    public function addCourse($data) {
        return $this->dao->addCourse($data);
    }

    public function addUser($data) {
        return $this->dao->addUser($data);
    }

    public function addLecture($data) {
        return $this->dao->addLecture($data);
    }

    public function deleteLecture($id) {
        return $this->dao->deleteLecture($id);
    }

    public function deleteCourse($id) {
        return $this->dao->deleteCourse($id);
    }

    public function deleteUser($id) {
        return $this->dao->deleteUser($id);
    }
}