<?php

namespace Eshoppy\Utility;

class Utility
{
    const PROJECT_PATH = '/eshoppy/';

    const ADMIN_WEB = 'http://localhost/eshoppy/back/admin/';
    const ADMIN_WEBVIEW = 'http://localhost/eshoppy/back/admin/views/';
    const ADMIN_THEMES = '/eshoppy/public/themes/admin-lte/';
    const ADMIN_ELEMENTS = '/eshoppy/back/admin/views/elements/';
    const ADMIN_LAYOUTS = '/eshoppy/back/admin/views/layouts/';
    const ADMIN_VIEWS = '/eshoppy/back/admin/views/';
//    const ADMIN_PRODUCT_UPLOAD = '/BitmCtg/eshoppy/back/admin/views/Products/upload/images/';

    const FRONT_WEBURL = 'http://localhost/eshoppy/';
    const FRONT_ASSETS = 'http://localhost/eshoppy/public/themes/ecommerce-shoppy/';
    const FRONT_ELEMENTS = '/eshoppy/front/views/elements/';
    const FRONT_WEBVIEW = 'http://localhost/eshoppy/front/views/';
    const FRONT_LAYOUTS = '/eshoppy/front/views/layouts/';
    const FRONT_IMAGEVIEW = 'http://localhost/eshoppy/back/admin/views/Products/upload/images/';
    const FRONT_IMAGEVIEWONE = 'http://localhost/eshoppy/back/admin/views/';

//    const FRONT_THEME = '/BitmCtg/eshoppy/public/themes/ecommerce-shoppy/';

    public static function redirect($path)
    {
        header("Location: $path");
    }

    public static function getAdminElement($element_name)
    {
        return $_SERVER['DOCUMENT_ROOT'] . SELF::ADMIN_ELEMENTS . $element_name;
    }

    public static function getFrontElement($element_name)
    {
        return $_SERVER['DOCUMENT_ROOT'] . SELF::FRONT_ELEMENTS . $element_name;
    }
}
