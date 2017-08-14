<?php

ini_set("error_reporting",E_ALL & ~E_NOTICE & ~E_STRICT);

class Cookie 
{
    
    private static $object;
    
    private function __construct()
    {
        //echo "объект успешно создан";
    }
    
    public static function start()
    {
        if (self::$object !== null) {
             echo "объект из этого класса уже создан"; exit;
        } else{
            self::$object = new self;
        }
    }
    
    private function check()
    {
        if (self::$object === null) {
             echo "Нельзя выполнить.  используйте метод start для начала работы с классом"; exit;
        } 
    }
    
    public function set($var, $val)
    {
        self::check();
        setcookie ($var, $val, time()+60*60*24*365);
    }
    
    public function remove($var)
    {
        self::check();
        unset($_COOKIE[$var]);
    }
    
    public function get($var)
    {
        self::check();
        return $_COOKIE[$var];
    }

    private function __clone() {}

    private function __wakeup() {}
}

Cookie::start(); 

Cookie::set("lo32", "timofei"); 
; 
print_r(Cookie::get("lo32")); print_r('<br/>');
