<?php

namespace Eshoppy\Pages;


use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Utility;
use Eshoppy\Db\Db;
use PDO;

class Pages
{
    public $id = "";
    public $title = "";
    public $description = "";
    public $link = "";

    public $conn = null;


    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storePage($data) {

        $sql = "INSERT INTO tbl_pages (title, description, link) VALUES (:title, :description, :link)";

        $statement = $this->conn->prepare($sql);


        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":description", $data['description']);
        $statement->bindParam(":link", $data['link']);


        $result = $statement->execute();


//        Debugger::dbugdieOne($result);

        return $result;


    }


    public function readPage() {

        $sql = "SELECT * FROM tbl_pages ORDER BY id DESC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $pages = $statement->fetchAll(PDO::FETCH_OBJ);

        return $pages;

    }

    public function editPage($id) {


        $sql = "SELECT * FROM tbl_pages WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $page = $statement->fetch(PDO::FETCH_ASSOC);

        return $page;

    }

    public function updatePage($data) {

        $sql = "UPDATE tbl_pages SET title = :title, description = :description, link = :link WHERE id = :id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":id", $data['id']);
        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":description", $data['description']);
        $statement->bindParam(":link", $data['link']);



        $result = $statement->execute();

//        Debugger::dbugdieOne($result);

        if($result) {
            return true;
        }
        else {
            return false;
        }

    }

    public function showPage($id) {

        $sql = "SELECT * FROM tbl_pages WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }

    public function deletePage($id) {

        $sql = "DELETE FROM tbl_pages WHERE id = '$id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }








}