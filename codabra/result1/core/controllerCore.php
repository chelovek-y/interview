<?php

class ControllerCore 
{

    public function __construct($conf=false)
    {

        $this->conf=$conf;

        require_once 'model.php';
        $this->model = new Model();

        $this->surroundVars();

        //$this->access();
        $this->routing();

        if ($t=getVar('t')) {$this->$t(); }

        require_once 'view.php';
        new View($this->vars);

    ;}


    public function surroundVars()
    {

        $this->c = getVar('c');
        if (!$this->c) {$this->c='main';}
        $this->t = getVar('t');

        $this->view = $this->getView($this->c, getVar('v'));

        $this->section = getVar('section');
        if (!$this->section) {$this->section='mains';}
        $this->option = getVar('option');

        $this->part=getVar('part');

        $this->dirs=$this->model->dirs();

        $this->vars=array(
        'view'=>$this->view,
        'section'=>$this->section,
        'option'=>$this->option,
        'part'=>$this->part,
        //'userId'=>$this->userId,
        'dirs'=>$this->dirs,
        );
        
    ;}


    public function routing()
    {
       
        $k=$this->model->klein;
        

        $accesses=array(
            'main',
            'page1',
            'page2',
        );
        

        $k->respond('GET', '/[*:page]', function ($request, $response) {
            
            print_r($request->page); print_r('<br/>');

            exit;
});
        $k->dispatch();
        
        
        
        if (!in_array($this->view, $accesses)) { 
            //$this->redir(ROOT_URI);
        ;}
        
    ;}



    public function getView($c, $v)
    {
        if ($v) {
            $v=str_replace("/", "", $v);
            if ($v=="index.php") {$v="";} ;
        ;}

        if (!$v) {$v=$c;} ;
        return $v;
    ;}


    public function genLink($view=false, $section=false,$option=false, $params2=false)
    {

        if ($view) {$params[]='v='.$view;}
        if ($section) {$params[]='section='.$section;}
        if ($option) {$params[]='option='.$option;}


        if ($params2) {
            foreach($params2 as $name=>$val){
                $params[]=$name.'='.$val;
            ;}
        ;}


        return '?'.implode('&',$params);

    ;}


    public function redir($url)
    {
        header('Location: '.$url);
        exit;
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
        
/*
        $accessesLk=array(
            'lk',
            'profile',
        );

        if ($this->userId) {
            $accesses=array_merge($accesses,$accessesLk);
        ;}
*/


    ;}



}

