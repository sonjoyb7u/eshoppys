<?php


namespace Eshoppy\Product;

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Db\Db;
use PDO;


class Products {

    public $id = "";
    public $brand_id = "";
    public $category_id = "";
    public $label_id = "";
    public $title = "";
    public $picture = "";
    public $short_description = "";
    public $description = "";
    public $total_sales = "";
    public $product_type = "";
    public $is_new = "";
    public $cost = "";
    public $mrp = "";
    public $special_price = "";
    public $is_active = "";
    public $soft_delete = "";
    public $is_draft = "";
    public $created_at = "";
    public $modified_at = "";

    public $conn = null;


    public function __construct() {

        $this->conn = Db::connect();// Static Class creating Object...
    }


    public function storeProduct($data, $file) {

//        $this->picture = "abcd.jpg";

        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Products/upload/images/";
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


            $sql = "INSERT INTO tbl_products (brand_id, category_id, label_id, title, picture, short_description, description, total_sales, product_type, is_new, cost, mrp, special_price, is_active, soft_delete, is_draft, created_at) VALUES (:brand_id, :category_id, :label_id, :title, :picture, :short_description, :description, :total_sales, :product_type, :is_new, :cost, :mrp, :special_price, :is_active,:soft_delete, :is_draft, :created_at)";

            $statement = $this->conn->prepare($sql);


            $statement->bindParam(":brand_id", $data['brand_id']);
            $statement->bindParam(":category_id", $data['category_id']);
            $statement->bindParam(":label_id", $data['label_id']);
            $statement->bindParam(":title", $data['title']);
            $statement->bindParam(":picture", $new_image_name);
            $statement->bindParam(":short_description", $data['short_description']);
            $statement->bindParam(":description", $data['description']);
            $statement->bindParam(":total_sales", $data['total_sales']);
            $statement->bindParam(":product_type", $data['product_type']);
            $statement->bindParam(":is_new", $data['is_new']);
            $statement->bindParam(":cost", $data['cost']);
            $statement->bindParam(":mrp", $data['mrp']);
            $statement->bindParam(":special_price", $data['special_price']);
            $statement->bindParam(":is_active", $data['is_active']);
            $statement->bindParam(":soft_delete", $data['soft_delete']);
            $statement->bindParam(":is_draft", $data['is_draft']);
            $created_at = date('Y-m-d h:i:s', time());
            $statement->bindParam(":created_at", $created_at);
    //                $modifiedAt = date('Y-m-d h:i:s', time());
    //                $statement->bindParam(":modified_at", $data['modifiedAt']);


            $result = $statement->execute();


    //                Debugger::dbugdieOne($result);

            return $result;


    }


    public function readProduct() {

        $sql = "SELECT * FROM tbl_products ORDER BY id ASC LIMIT 7";
//        $sql = "SELECT p.*, b.title, c.name, l.title FROM tbl_products as p, tbl_brands as b, tbl_categories as c, tbl_labels as l WHERE p.brand_id = b.brand_id AND p.category_id = c.category_id AND p.label_id = l.label_id ORDER BY p.id DESC";

        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;

    }


    public function editProduct($id) {


        $sql = "SELECT * FROM tbl_products WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        return $product;

    }


    public function updateProduct($data, $file)
    {
//        Debugger::dbugDieTwo($id, $data);


        $this->picture = basename($file['picture']['name']);
        $tmp_dir = $file['picture']['tmp_name'];
        $image_size = $file['picture']['size'];
//        $uploadOk = 1;

        $upload_dir = "C:/laragon/www/BitmCtg/eshoppy/back/admin/views/Products/upload/images/";
//        $target_dir = include_once($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_PRODUCT_UPLOAD);
        $upload_file = $upload_dir . $this->picture;
        $imageFileType = strtolower(pathinfo($this->picture, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $new_image_name = rand(1000, 1000000) . "." . $imageFileType;

        unlink($upload_file.$new_image_name);

        move_uploaded_file($tmp_dir, $upload_dir.$new_image_name);



        $sql = "UPDATE tbl_products SET brand_id = :brand_id, category_id = :category_id, label_id = :label_id, title = :title, picture = :picture, short_description = :short_description, description = :description, total_sales = :total_sales, product_type = :product_type, is_new = :is_new, cost = :cost, mrp = :mrp, special_price = :special_price, is_active = :is_active, soft_delete = :soft_delete, is_draft = :is_draft, modified_at = :modified_at WHERE id = :id";

        $statement = $this->conn->prepare($sql);

        $statement->bindParam(":id", $data['id']);
        $statement->bindParam(":brand_id", $data['brand_id']);
        $statement->bindParam(":category_id", $data['category_id']);
        $statement->bindParam(":label_id", $data['label_id']);
        $statement->bindParam(":title", $data['title']);
        $statement->bindParam(":picture", $new_image_name);
        $statement->bindParam(":short_description", $data['short_description']);
        $statement->bindParam(":description", $data['description']);
        $statement->bindParam(":total_sales", $data['total_sales']);
        $statement->bindParam(":product_type", $data['product_type']);
        $statement->bindParam(":is_new", $data['is_new']);
        $statement->bindParam(":cost", $data['cost']);
        $statement->bindParam(":mrp", $data['mrp']);
        $statement->bindParam(":special_price", $data['special_price']);
        $statement->bindParam(":is_active", $data['is_active']);
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


    public function showProduct($id) {

        $sql = "SELECT * FROM tbl_products WHERE id = '$id'";

        $statement = $this->conn->prepare($sql);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;


    }


    public function deleteProduct($id) {

        $sql = "DELETE FROM tbl_products WHERE id = '$id'";


        $statement = $this->conn->prepare($sql);

        $result = $statement->execute();

        return $result;
    }

    public function activeProduct($id) {

        $sql = "UPDATE tbl_products SET is_active = 1 WHERE tbl_products . id = :id";

        $statement = $this->conn->prepare($sql);
//
//        echo $sql;
//        die();

        $statement->bindParam(":id", $id);

        $result = $statement->execute();

        return $result;
    }

    public function deactiveProduct($id) {

        $sql = "UPDATE tbl_products SET is_active = 0 WHERE tbl_products . id = :id";

        $statement = $this->conn->prepare($sql);
//
//        echo $sql;
//        die();

        $statement->bindParam(":id", $id);

        $result = $statement->execute();

        return $result;
    }

    public function latestProduct() {
        $sql = "SELECT * FROM tbl_products ORDER BY id DESC";


        $statement = $this->conn->prepare($sql);


        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }




}