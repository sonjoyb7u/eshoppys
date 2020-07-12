<?php

namespace Eshoppy\Db;
use \PDO;


class Db
{
    public static $db_host = "localhost";
    public static $db_user = "root";
    public static $db_pass = "";
    public static $db_name = "db_eshoppy";

    public static function connect() {

        try {
            $conn = new PDO("mysql:host=" . SELF::$db_host . ";dbname=" . SELF::$db_name, SELF::$db_user, SELF::$db_pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//            echo "Connected!";
            return $conn;
        }
        catch (\PDOException $exception) {
            echo "Connection Error!: " . $exception->getMessage();
        }
    }
}

//$db = new Db();
//$db->connect();