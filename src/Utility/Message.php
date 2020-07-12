<?php

namespace Eshoppy\Utility;

session_start();


class Message
{
    public function __construct()
    {
        session_start();
    }

    static function set($message) {
        $_SESSION['message'] = $message;
    }

    static function get() {
        return $_SESSION['message'];
    }

    static function flush() {
        $message = $_SESSION['message'];
        $_SESSION['message'] = null;
        return $message;
    }

    static function hasMessage() {
        $message = self::get();

        if(empty($message)) {
            return false;
        }
        return true;

    }
}