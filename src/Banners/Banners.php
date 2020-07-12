<?php

namespace Eshoppy\Banners;

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Db\Db;
use PDO;


class Banners {

    public $id = "";
    public $title = "";
    public $picture = "";
    public $link = "";
    public $promotional_message = "";
    public $html_banner = "";
    public $is_active = "";
    public $is_draft = "";
    public $soft_delete = "";
    public $max_display = "";
    public $created_at = "";
    public $modified_at = "";

    public $conn = null;


    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storeBanner($data, $file) {

//        $this->picture = "abcd.jpg";

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Banners/upload/images/";
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


        $sql = "INSERT INTO tbl_banners (title, picture, link, promotional_message, html_banner, is_active, soft_delete, is_draft, max_display, created_at) VALUES (:title, :picture, :link, :promotional_message, :html_banner, :is_active, :soft_delete, :is_draft, :max_display, :created_at)";

        $statement = $this->conn->prepare($sql);


        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":promotional_message", $data['promotional_message']);
        $statement->bindParam(":html_banner", $data['html_banner']);
        $statement->bindParam(":is_active", $data['is_active']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);
        $statement->bindParam(":is_draft", $data['is_draft']);
        $statement->bindParam(":max_display", $data['max_display']);
        $created_at = date('Y-m-d h:i:s', time());
        $statement->bindParam(":created_at", $created_at);


        $result = $statement->execute();


        //                Debugger::dbugdieOne($result);

        return $result;


    }


    public function readBanner() {

        $sql = "SELECT * FROM tbl_banners ORDER BY id DESC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $banners = $statement->fetchAll(PDO::FETCH_OBJ);

        return $banners;

    }


    public function editBanner($id) {


        $sql = "SELECT * FROM tbl_banners WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $banner = $statement->fetch(PDO::FETCH_ASSOC);

        return $banner;

    }


    public function updateBanner($data, $file)
    {
//        Debugger::dbugDieTwo($id, $data);


        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
//        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Banners/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;

        unlink($upload_file.$new_image_name);

        move_uploaded_file($tmp_dir, $upload_dir.$new_image_name);



        $sql = "UPDATE tbl_Banners SET title = :title, picture = :picture, link = :link, promotional_message = :promotional_message, html_banner = :html_banner, is_active = :is_active, soft_delete = :soft_delete, is_draft = :is_draft, max_display = :max_display, modified_at = :modified_at WHERE id = :id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":id", $data['id']);
        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":link", $data['link']);
        $statement->bindParam(":promotional_message", $data['promotional_message']);
        $statement->bindParam(":html_banner", $data['html_banner']);
        $statement->bindParam(":is_active", $data['is_active']);
        $statement->bindParam(":soft_delete", $data['soft_delete']);
        $statement->bindParam(":is_draft", $data['is_draft']);
        $statement->bindParam(":max_display", $data['max_display']);

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


    public function showBanner($id) {

        $sql = "SELECT * FROM tbl_banners WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }


    public function deleteBanner($id) {

        $sql = "DELETE FROM tbl_banners WHERE id = '$id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }

    public function activeBanner($id) {

        $sql = "UPDATE tbl_banners SET is_active = 1 WHERE tbl_banners . id = :id";

        $statement = $this->conn->prepare($sql);
//
//        echo $sql;
//        die();

        $statement->bindParam(":id", $id);

        $result = $statement->execute();

        return $result;
    }

    public function deactiveBanner($id) {

        $sql = "UPDATE tbl_banners SET is_active = 0 WHERE tbl_banners . id = :id";

        $statement = $this->conn->prepare($sql);
//
//        echo $sql;
//        die();

        $statement->bindParam(":id", $id);

        $result = $statement->execute();

        return $result;
    }

}