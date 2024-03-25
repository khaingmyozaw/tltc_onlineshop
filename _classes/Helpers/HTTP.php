<?php

namespace Helpers;

class HTTP {
    static $base = "http://localhost/tltcshop/";
    
    static function redirect($url, $q="")
    {
        $path = static::$base . $url;
        header("Location: $path");
        if($q){
            $path .= "?$q";
            header("Location: $path");
        }
    }
}