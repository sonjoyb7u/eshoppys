<?php

namespace Eshoppy\Utility;


class Debugger {


    static function dbugOne($var1) {
        echo "<pre>";
            var_dump($var1);
        echo "</pre>";
    }
    static function dbugTwo($var1, $var2) {
        echo "<pre>";
        var_dump($var1, $var2);
        echo "</pre>";
    }



    static function dbugDieOne($var1) {
        echo "<pre>";
        var_dump($var1);
        echo "</pre>";

        die();
    }
    static function dbugDieTwo($var1, $var2) {
        echo "<pre>";
            var_dump($var1, $var2);
        echo "</pre>";

        die();

    }

}