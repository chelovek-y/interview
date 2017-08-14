<?php

namespace Andrey ;

class ClosedWebsite
{

    public function auth()
    {

        $login=getVar('login');
        $password=getVar('password');
        $remember=getVar('remember');

        $password=md5($password);
        
        $result = \ORM::for_table('users')->select('login')->where(array(
            'login' => $login,
            'password' => $password
        ))->find_one();



        if ($result->login) {
            if ($remember=="true") {
                ini_set('session.gc_maxlifetime', 10000000000); 
            }else{
                ini_set('session.gc_maxlifetime', 1800); //30 минут
            } ;
            $_SESSION['login']=$result->login;
            echo 1;
        }


        exit;
    }

    public function logout()
    {

        $_SESSION['login']=false;
        $this->redir(ROOT_URI);

    }


    public function redir($url)
    {
        header('Location: '.$url);
        exit;
    }


    public function genLinkView($view)
    {
        return ROOT_URI.$view;
    }
    
    public function genLinkTask($task)
    {
        return ROOT_URI."?t=".$task;
    }

    public function link($view='')
    {
        return self::genLinkView($view);
    }

    public function task($task)
    {
        return self::genLinkTask($task);
    }


}

