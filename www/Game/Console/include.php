<?php
$password = "monkeynuts2";
$salt = '$FmkgwmLEG2';
define("SETTINGS",
array(
"Cookie"=>'$'.hash("sha512",$salt.$password),
"Password"=>$password
));

/*
An autoloader only to be used on-site.
*/
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = $_SERVER['DOCUMENT_ROOT']."/../SharedCode/".str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader::register();
?>