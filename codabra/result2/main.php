<?php


class Main
{

    public function __construct()
    {
        
        ini_set('default_charset', 'UTF-8');
        session_start();
        
        $this->functions();


        require_once 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
                
        $k = new \Klein\Klein();
        
        ORM::configure('mysql:host='.DB_HOST.';dbname='.DB_NAME);
        ORM::configure('username', DB_USER);
        ORM::configure('password', DB_PASS);
        
        $clWs=new Andrey\ClosedWebsite();
        
        
        $this->routing($k, $clWs, $_SESSION['login']);

    }

    public function routing($k, $clWs, $loginView)
    {

        $this->accesses=array(
            'main',
            'page1',
            'page2',
        );

        $k->respond(array('POST','GET'), '/?', function ($request) {
            
            $this->t=$request->t;
          
        });
        
        $this->v='main';
        
        $k->respond('GET', '/[*:view]', function ($request) {
            if (!in_array($request->view, $this->accesses)) { 
                $this->redir(ROOT_URI);
            }
            $this->v=$request->view;
            
        });
        
        $k->dispatch();
        
        
        $t=$this->t;
        if ($t) {$clWs->$t();} // выполняем задачу 
        
        $this->includeView($this->v, $loginView);// подключаем шаблон 
    }


    public function includeView($view, $login)
    {
        $templDir='templates'.DIRECTORY_SEPARATOR;
        
        $indexFile = $templDir."index.php";

        $bodyFile=$templDir.$view.".php";
        $headerFile=$templDir."header.php";
        $footerFile=$templDir."footer.php";

        require_once($indexFile);
    }


    public function functions()
    {
        function getVar($name){
            
            if ($_POST[$name]) {
                $var=$_POST[$name];
            } elseif ($_GET[$name]) {
                $var=$_GET[$name];
            }
            
            $var=filter_var($var, FILTER_SANITIZE_STRING);
            return $var;
            
        }
        
    }



}

