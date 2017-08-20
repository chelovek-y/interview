<?php


class Controller
{

    public function __construct()
    {
      
  
        $this->functions();

        $this->model = new Model();
     
        $this->surroundVars();

        if ($task = $this->task) {$this->$task();}

        $this->access();
        
        require_once 'View.php';
        new View($this->vars);

    }


    public function surroundVars()
    {
        global $phrases;
        $this->view = str_replace('/', '', getVar('view'));
        if (!$this->view) {$this->view='register';} ;
        
        $dirs = $this->model->dirs;
        
        if (!$_SESSION['lang']) {$_SESSION['lang']='ru';}
        $lang=$_SESSION['lang'];
        $phrases = $this->getLangPhrases($lang, $dirs['lang']);
   
        $this->task = getVar('task');

        $curVars=[
            'user'=>$_SESSION['user'],
            'lang'=>$_SESSION['lang'],
            'view'=>$this->view,
            'dirs'=>$dirs,
        ];
        
     
        $curVars['checkFields']=$this->checkFieldsFrontEnd($this->view);
      

        $this->vars = $curVars;

    }



    public function loadImage()
    {
        $answer = $this->model->loadImage();
        if ($answer['mess']=='success') {
          $_SESSION['image']=$answer['image'];
        ;} 
        echo $answer['mess'];
        exit();
    }
    
    public function checkFieldsFrontEnd()
    {
        if ($this->view=='register') {
            $checkFields = $this->model->getCheckFieldsRegister();
            return str_replace('\\','[slash]',json_encode($checkFields));
        }elseif($this->view=='login'){
            return lm('authErr');
        }
        
    }
    
    public function setLang(){
      
        $this->model->setLang(getVar('lang'));
        $this->redir(ROOT_URI);
        
    }

	function getLangPhrases($lang, $langDir){

		return $this->model->getLangPhrases($lang, $langDir);

	;}


    public function login(){
      
        echo $this->model->login(getVar('login'), getVar('password'));
        exit;
        
    ;}

    public function logout(){

        $this->model->logout();
        $this->redir(ROOT_URI.'login');

    ;}

    public function register(){

        $answer = $this->model->register(getVar('login'), getVar('email'), getVar('password'), getVar('password2') );
        print_r(json_encode($answer));
;exit;
    ;}


    



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
        
        
        
        function lm($phrase){
            global $phrases;
            if ($phra = $phrases[$phrase]) {
            return $phra;
        } ;
        }
        
        function l($phrase){
            echo lm($phrase);
        }
          
        

        function link2($view)
        {
            return $view;
        }
        
        function task($task)
        {
            return ROOT_URI."?task=".$task;
        }
    
    }


    public function redir($url)
    {
      
        header('Location: '.$url);
        exit;
        
    ;}
    

    function access()
    {
        $accesses=array(
            'register',
            'login',
            'profile',
            '',
        );
        $noAuth=array(
            'register',
            'login',
            '',
        );
        $auth=array(
            'profile',
        );

        if (!in_array($this->view, $accesses)) { 
            $this->redir(ROOT_URI);
        ;}
        
        if (!$this->vars['user'] && in_array($this->view, $auth)) {
            $this->redir(ROOT_URI);
        } ;
        
        if ($this->vars['user'] && in_array($this->view, $noAuth)){
            $this->redir(ROOT_URI.'profile');
        } ;

    }
    
}

