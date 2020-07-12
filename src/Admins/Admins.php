<?php


namespace Eshoppy\Admins;


use Eshoppy\Utility\Utility;
use Eshoppy\Session\Session;
use Eshoppy\Db\Db;

Session::loginCheck();

use PDO;



class Admins
{
    public $id = "";
    public $name = "";
    public $email = "";
    public $username = '';
    public $password = '';
    public $phone = '';
    public $created_at = '';
    public $modified_at = '';

    public $conn = null;

    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }

    public function adminLogin($username, $password) {

        $sql = "SELECT COUNT(*) as totalUser FROM tbl_admins WHERE username = :username AND password = :password";

        $statement = $this->conn->prepare($sql);

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $statement->bindParam(':username',$username);
        $statement->bindParam(':password',$password);


        $statement->execute();
        $value = $statement->fetch();

        extract($value);

        Session::set('User', true);
        Session::set('username', $username);
        Session::set('password', $password);


        return $value;


    }

    public function loginDestroy() {
        $logout = session_destroy();
        return $logout;
    }

    public function storeAdmin($data) {

        $sql = "INSERT INTO tbl_admins (name, email, username, password, soft_delete, created_at) VALUES (:title, :link, :is_draft, :is_active, :soft_delete, :created_at)";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":is_draft", $data['is_draft']);
        $statement->bindParam(":is_active", $data['is_active']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);

        $createdAt = date('Y-m-d h:i:s', time());
        $statement->bindParam(":created_at", $createdAt);


        $result = $statement->execute();


//        Debugger::dbugdieOne($result);

        return $result;

    }

    public function readBrand() {

        $sql = "SELECT * FROM tbl_brands ORDER BY brand_id ASC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);

        return $result;

    }

    public function editBrand($brand_id) {


        $sql = "SELECT * FROM tbl_brands WHERE brand_id = '$brand_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $brand = $statement->fetch(PDO::FETCH_ASSOC);

        return $brand;

    }

    public function updateBrand($data) {

        $sql = "UPDATE tbl_brands SET title = :title, link = :link, is_draft = :is_draft, is_active = :is_active, soft_delete = :soft_delete, modified_at = :modified_at WHERE brand_id = :brand_id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":brand_id", $data['brand_id']);
        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":is_draft", $data['is_draft']);
        $statement->bindParam(":is_active", $data['is_active']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);

        $modifiedAt = date('Y-m-d h:i:s', time());
        $statement->bindParam(":modified_at", $modifiedAt);


        $result = $statement->execute();

//        Debugger::dbugdieOne($result);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function showBrand($brand_id) {

        $sql = "SELECT * FROM tbl_brands WHERE brand_id = '$brand_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }

    public function deleteBrand($brand_id) {

        $sql = "DELETE FROM tbl_brands WHERE brand_id = '$brand_id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }


}