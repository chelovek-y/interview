<?php


class Controller extends ControllerCore 
{

    public function surroundVars()
    {
        
        parent::surroundVars();

        $curVars=array('login'=>$_SESSION['login']);

        $this->vars = array_merge($this->vars,$curVars);

    ;}





    public function auth(){
        $this->model->auth(getVar('login'), getVar('password'), getVar('remember'));
        ;exit;
    ;}

    public function logout(){

        $this->model->logout();
        $this->redir(ROOT_URI);

    ;}


    public function genLinkView($view)
    {
        return ROOT_URI.$view;
    ;}
    
    public function genLinkTask($task)
    {
        return ROOT_URI."?t=".$task;
    ;}

    public function link($view)
    {
        return self::genLinkView($view);
    ;}

    public function task($task)
    {
        return self::genLinkTask($task);
    ;}



    function access()
    {

        $accesses=array(
            'main',
            'page1',
            'page2',
        );

        if (!in_array($this->view, $accesses)) { 
            $this->redir(ROOT_URI);
        ;}


    ;}




}

