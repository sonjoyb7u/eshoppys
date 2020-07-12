<?php

namespace Eshoppy\Session;

use Eshoppy\Utility\Utility;



class Session {

     public static function init() {

         if(session_status() == PHP_SESSION_NONE) {
             session_start();
         }
         if( !(array_key_exists('User', $_SESSION) && !empty($_SESSION['User'])) ) {
             Utility::redirect('login.php');
         }
     }

     public static function set($key, $val) {

      $_SESSION[$key] = $val;
     }

     public static function get($key) {

      if (isset($_SESSION[$key])) {
       return $_SESSION[$key];
      }
      else {
       return false;
      }
     }

     public static function sessionCheck() {

      self::init();

      if (self::get("User")== false) {

       self::destroy();
//       Utility::redirect('../Users/login.php');
      }
     }

     public static function loginCheck() {

      self::init();

      if (self::get("User")== true) {

       Utility::redirect('../Page/dashboard.php');
      }
     }

     public static function destroy() {

      session_destroy();
      Utility::redirect('../Users/login.php');
     }


}

