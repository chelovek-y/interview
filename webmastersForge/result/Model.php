<?php

class Model
{

    public function __construct()
    {
        require_once('conf.php');
        
        $this->sets=$this->sets();

        $this->dirs=$this->dirs();

        $this->includeLibs();
    }
    

    public function sets()
    {
        ini_set('default_charset', 'UTF-8');
        session_start();
        
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if (mysqli_connect_errno()) { 
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
            exit; 
        }

    ;}

    public function dirs()
    {	
        $dirs['lang'] = "../languages/";
        $dirs['includes'] = "includes/";
        $dirs['uploads'] = "uploads/";
        $dirs['images'] = "images/";
        $dirs['templates'] = "templates/";
        $dirs['js'] = "js/";
        $dirs['css'] = "css/";
        return $dirs; 
    }

    
    
    public function loadImage()
    {
        $uploaddir = $this->dirs['uploads']; 
        $file = $_FILES['loadImage']['name']; 
 
        $ext = substr($file, strrpos($file,'.'), strlen($file)-1); 
        $filetypes = array('.jpg','.gif','.bmp','.png');

        if(in_array(mb_strtolower($ext),$filetypes)){ 
              
            // тут по идее надо делать уникальное имя файла
            $fileMove = basename($file); 
        
            $fileMove = iconv('utf-8', 'windows-1251', $fileMove);

            $fileMoveFull = $uploaddir.$fileMove; 
            if (move_uploaded_file($_FILES['loadImage']['tmp_name'], $fileMoveFull)) { 
                $mess = "success"; 
            } else {
                $mess = "error";
            }
            
        }

        return array(
            'mess' => $mess,
            'image' => $fileMove,
        );
    }

    public function login($login, $password)
    {
    
        $login = $this->db->real_escape_string($login);
        $password = $this->db->real_escape_string(crypt($password,'Ve3F&$*#'));


        $result = $this->db->query("SELECT login, email, image FROM users WHERE login = '$login' AND password = '$password'");

        if (!is_object($result)) {
            exit(); 
        }else{
            $row = $result->fetch_assoc();
            $result->close();
        ;} ;
   
        if (!$row) {
            exit(); 
        }else{
            $this->userToSession($row['login'], $row['email'], $row['image']);
            return 'success';
        } 
    
    }
    
    
    public function register($login, $email, $password, $password2){

        $errors = $this->checkFields($login, $email, $password, $password2);
        if ($errors) { return $errors;} ;
        
        $login = $this->db->real_escape_string($login);
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string(crypt($password,'Ve3F&$*#'));
            
        $q="INSERT INTO users (id, login, email, password, image) VALUES (NULL, '$login', '$email', '$password', '{$_SESSION['image']}');";     

        if ($this->db->query($q)) {
            $this->userToSession($login, $email, $_SESSION['image']);
        } 
        
        unset($_SESSION['image']);
        
        return "success";
        
    }
    
    
    public function logout(){
        unset($_SESSION['user']);
    }
    
    
    public function userToSession($login, $email, $image){
        $_SESSION['user']=[
            'login'=>$login,
            'email'=>$email,
            'image'=>$image,
        ];
    }	
    
    public function checkFields($login, $email, $password, $password2){
      
        $this->password=$password;
        $this->password2=$password2;
       
        $checkFields=$this->getCheckFieldsRegister();
        foreach($checkFields as $field=>$check){
            $error = $this->checkField($field, $$field, $check);
            if ($error) {$errors[$field]=$error;} ;
        }
        return $errors;
        
    }
    
    public function checkField($field, $fieldVal, $check){

        if ($check['required'] && !$fieldVal) {
            return 'requiredErr';
        } 
        
        if ($check['check'] && $fieldVal) {
            if (!$this->regularIsset("^".$check['check']."$",$fieldVal)) { return 'checkErr';} ;
        } 
        
        if ($check['dupErr'] && $fieldVal) {
          //логин, либо емэйл, проверка на дублирование в базе
            $checkDuplicate = $this->db->real_escape_string($fieldVal);
          
            $result = $this->db->query("SELECT $field FROM users WHERE $field = '$checkDuplicate'");
            $row = $result->fetch_assoc();
            $result->close();
            
            if ($row) {return 'dupErr';} 
        } 
        
        if ($check['compareErr']) {
            if ($this->password!=$this->password2) { return 'compareErr';} 
        } 
        

    }

    public function getCheckFieldsRegister()
    {	
        return $checkFields=[
        
            'login'=>[
                'required'=>1, 
                'requiredErr'=>lm('loginErrReq'), 
                'check'=>"[0-9a-zA-Z]{2,32}",
                'checkErr'=>lm('loginErrCheck'),
                'dupErr'=>lm('loginErrDup')
            ],
            
            'email'=>[
                'required'=>0, 
                'requiredErr'=>lm('loginErrReq'), 
                'check'=>"\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+",
                'checkErr'=>lm('emailErrCheck'),
                'dupErr'=>lm('emailErrDup')
            ],
            'password'=>[
                'required'=>1, 
                'requiredErr'=>lm('passwordErrReq'), 
                'check'=>"[!@#$%^&*\(\)\[\]_0-9а-яА-Яa-zA-Z]{6,32}",
                'checkErr'=>lm('passwordErrCheck'),
                'compareErr'=>lm('passwordCompareErr')
            ],
            'password2'=>[
                'required'=>1, 
                'requiredErr'=>lm('password2ErrReq'), 
                'check'=>"[!@#$%^&*\(\)\[\]_0-9а-яА-Яa-zA-Z]{6,32}",
                'checkErr'=>lm('password2ErrCheck'),
                'compareErr'=>lm('passwordCompareErr')
            ],
          
        ]
    ;}
    
    public function setLang($lang){
        $_SESSION['lang']=$lang;
    }
    
    
    public function getLangPhrases($lang, $langDir){
        $lang = mb_strtoupper($lang);
        $lines=file($langDir.$lang.'.txt');
        foreach($lines as $line){
            $line=trim($line);
            if (!$line OR mb_strpos($line,'#')===0) {continue;} ;
            $shabl="/^(.*?) (.*)$/s";
            preg_match($shabl, trim($line), $matches);
            if (!trim($matches[1])) {continue;} ;
            $phrases[trim($matches[1])]=trim($matches[2]);
        ;}
        return $phrases;
    }


    public function includeLibs(){	

    }




    public function regularIsset($pattern,$i_t)
    {
        preg_match("/$pattern/us", $i_t, $result);
        if ($result[0]) {$return=true;} else {$return=false;}
        return $return;
    }

}