<?php
/**
 * Created by PhpStorm.
 * User: Sonjoy
 * Date: 16-Aug-19
 * Time: 11:26 AM
 */

namespace Eshoppy\Categories;

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Db\Db;
use PDO;

class Categories {

    public $id = "";
    public $name = "";
    public $picture = "";
    public $link = "";
    public $soft_delete = "";
    public $is_draft = "";
    public $created_at = "";

    public $conn = null;

    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storeCategory($data, $file) {

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Categories/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;


// Check if image file is a actual image or fake image

//      if(isset($_POST["submit"])) {

        $check = getimagesize($tmp_dir);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
//    }
// Check if file already exists
        if (file_exists($upload_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($image_size > 11000000) { // 11000000kb = ...mb
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tmp_dir, $upload_dir.$new_image_name)) {
                echo "The file " . $this->picture . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $sql = "INSERT INTO tbl_categories (name, picture, link, soft_delete, is_draft, created_at) VALUES (:name, picture, :link, :soft_delete, :is_draft, :created_at)";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":name", $data['name']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);
        $statement->bindParam(":is_draft", $data['is_draft']);

        $createdAt = date('Y-m-d h:i:s', time());
        $statement->bindParam(":created_at", $createdAt);


        $result = $statement->execute();


//        Debugger::dbugdieOne($result);

        return $result;

    }

    public function readCategories() {

        $sql = "SELECT * FROM tbl_categories ORDER BY category_id ASC LIMIT 4";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function editCategory($category_id) {


        $sql = "SELECT * FROM tbl_categories WHERE category_id = '$category_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);

        return $category;

    }

    public function updateCategory($data, $file) {

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
//        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Categories/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;

        unlink($upload_file.$new_image_name);

        move_uploaded_file($tmp_dir, $upload_dir.$new_image_name);

        $sql = "UPDATE tbl_categories SET name = :name, picture = :picture, link = :link, soft_delete = :soft_delete, is_draft = :is_draft, modified_at = :modified_at WHERE category_id = :category_id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":category_id", $data['category_id']);
        $statement->bindParam(":name", $data['name']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);
        $statement->bindParam(":is_draft", $data['is_draft']);

        $modifiedAt = date('Y-m-d h:i:s', time());
        $statement->bindParam(":modified_at", $modifiedAt);


        $result = $statement->execute();

//        Debugger::dbugdieOne($result);

            if($result) {
                return true;
            }
            else {
                return false;
            }
    }

    public function showCategory($category_id) {

        $sql = "SELECT * FROM tbl_categories WHERE category_id = '$category_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }

    public function deleteCategory($category_id) {

        $sql = "DELETE FROM tbl_Categories WHERE category_id = '$category_id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }


}