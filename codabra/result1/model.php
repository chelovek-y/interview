<?php

class Model extends ModelCore {

    public function includeLibs()
    {	
        //$this->klein = new vendor\klein\klein();

        require_once __DIR__ . '/vendor/autoload.php';
        $this->klein = new \Klein\Klein();
        

        try
        {
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        }
        catch(PDOException $e)
        {
            echo "You have an error: ".$e->getMessage()."<br>";
            echo "On line: ".$e->getLine();
        }
    ;}

    public function auth($login, $password, $remember)
    {

        $login=$this->db->quote($login);
        $password=$this->db->quote(md5($password));
        $q = "SELECT login FROM users WHERE login = $login AND password=$password";
        $query = $this->db->query($q);
        if (is_object($query)) {
            $result = $query->FETCH(PDO::FETCH_NUM);
            $loginDB = $result[0];
        ;} ;

        if ($loginDB) {
            if ($remember=="true") {
                ini_set('session.gc_maxlifetime', 10000000000); 
            ;}else{
                ini_set('session.gc_maxlifetime', 1800); //30 минут
            ;} ;
            $_SESSION['login']=$loginDB;
            echo 1;
        ;}


    ;}


    public function logout(){
        $_SESSION['login']=false;
    ;}	

 

}