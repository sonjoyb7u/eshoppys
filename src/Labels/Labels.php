<?php


namespace Eshoppy\Labels;


use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Db\Db;
use PDO;


class Labels {

    public $label_id = "";
    public $title = "";
    public $picture = "";

    public $conn = null;

    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storeLabel($data, $file) {

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Labels/upload/images/";
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


        $sql = "INSERT INTO tbl_labels (title, picture) VALUES (:title, :picture)";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":picture", $new_image_name);


        $result = $statement->execute();


//        Debugger::dbugdieOne($result);

        return $result;


    }


    public function readLabel() {

        $sql = "SELECT * FROM tbl_labels ORDER BY label_id DESC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;

    }


    public function editLabel($label_id) {


        $sql = "SELECT * FROM tbl_labels WHERE label_id = '$label_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $label = $statement->fetch(PDO::FETCH_ASSOC);

        return $label;

    }


    public function updateLabel($data, $file)
    {
//        Debugger::dbugDieTwo($id, $data);


        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
//        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Labels/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;

        unlink($upload_file.$new_image_name);

        move_uploaded_file($tmp_dir, $upload_dir.$new_image_name);



        $sql = "UPDATE tbl_labels SET title = :title, picture = :picture WHERE label_id = :label_id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":label_id", $data['label_id']);
        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":picture", $new_image_name);


        $result = $statement->execute();

//        Debugger::dbugdieOne($result);

        if($result) {
            return true;
        }
        else {
            return false;
        }

    }


    public function showLabel($label_id) {

        $sql = "SELECT * FROM tbl_labels WHERE label_id = '$label_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }


    public function deleteLabel($label_id) {

        $sql = "DELETE FROM tbl_labels WHERE label_id = '$label_id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }




}