<?php


namespace Eshoppy\Carts;


use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Utility;
use Eshoppy\Session\Session;
use Eshoppy\Db\Db;
use PDO;


class Carts {

    public $cart_id = "";
    public $sId = "";
    public $product_id = "";
    public $picture = "";
    public $product_title = "";
    public $qty = "";
    public $unit_price = "";
    public $total_price = "";

    public $conn = null;

    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storeCart($data, $file) {

//        $this->picture = "abcd.jpg";

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Carts/upload/images/";
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


        $sql = "INSERT INTO tbl_carts (sId, product_id, picture, product_title, qty, unit_price, total_price) VALUES (:sId, :product_id, :picture, :product_title, :qty, :unit_price, :total_price)";

        $statement = $this->conn->prepare($sql);


        $statement->bindParam(":sId", $data['sId']);
        $statement->bindParam(":product_id", $data['product_id']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":product_title", $data['product_title']);
        $statement->bindParam(":qty", $data['qty']);
        $statement->bindParam(":unit_price", $data['unit_price']);
        $statement->bindParam(":total_price", $data['total_price']);


        $result = $statement->execute();


        //                Debugger::dbugdieOne($result);

        return $result;


    }


    public function readCart() {

        $sql = "SELECT * FROM tbl_carts ORDER BY cart_id ASC";
//        $sql = "SELECT p.*, b.title, c.name, l.title FROM tbl_products as p, tbl_brands as b, tbl_categories as c, tbl_labels as l WHERE p.brand_id = b.brand_id AND p.category_id = c.category_id AND p.label_id = l.label_id ORDER BY p.id DESC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $carts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $carts;

    }


    public function editCart($cart_id) {


        $sql = "SELECT * FROM tbl_carts WHERE cart_id = '$cart_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        return $product;

    }


    public function updateCart($data, $file)
    {
//        Debugger::dbugDieTwo($id, $data);


        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
//        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Carts/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;

        unlink($upload_file.$new_image_name);

        move_uploaded_file($tmp_dir, $upload_dir.$new_image_name);



        $sql = "UPDATE tbl_carts SET sId = :sId, product_id = :product_id, picture = :picture, picture = :picture, product_title = :product_title, qty = :qty, unit_price = :unit_price, total_price = :total_price WHERE cart_id = :cart_id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":cart_id", $data['cart_id']);
        $statement->bindParam(":sId", $data['sId']);
        $statement->bindParam(":product_id", $data['product_id']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":product_title", $data['product_title']);
        $statement->bindParam(":qty", $data['qty']);
        $statement->bindParam(":unit_price", $data['unit_price']);
        $statement->bindParam(":total_price", $data['total_price']);


        $result = $statement->execute();

//        Debugger::dbugdieOne($result);

        if($result) {
            return true;
        }
        else {
            return false;
        }

    }


    public function showCart($cart_id) {

        $sql = "SELECT * FROM tbl_carts WHERE id = '$cart_id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }


    public function deleteCart($cart_id) {

        $sql = "DELETE FROM tbl_carts WHERE id = '$cart_id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }

    public function addToCart($data) {

        $quantity = $data['qty'];
        $product_id = $data['id'];
        $sId = session_id();

        $sql = "SELECT * FROM tbl_products WHERE id = '$product_id'";

        $statement = $this->conn->prepare($sql);

//        $statement->bindParam(":product_id", $data['product_id']);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;

    }



}