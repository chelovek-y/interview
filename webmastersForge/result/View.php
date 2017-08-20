<?php

class View 
{
    public function __construct($vars=false)
    {
        $dirs = $vars['dirs'];
        $templDir=$dirs['templates'];
        $uploadsDir = $dirs['uploads'];
        $imagesDir = $dirs['images'];
        $view = $vars['view'];
        $lang = $vars['lang'];
        $login = $vars['user']['login'];

        $checkFields = $vars['checkFields'];

        
        $jsFiles = $this->jsFiles($dirs['js'],$view);
        $cssFiles = $this->cssFiles($dirs['css']);

        $indexFile = "$templDir/index.php";
        $viewFile = "$view.php";

        require_once($indexFile);
        
    }



    public function jses($view)
    {
        return [
            'ajaxupload.3.5',
            'main',
            $view
        ];
    ;}
    
    public function csses()
    {
        return [
            'style',
       ];
    ;}



    public function jsFiles($dir,$view)
    {
        $jses=$this->jses($view);

        $jsFiles=array();

        foreach($jses as $js){
            $jsFile= $dir.$js.'.js';
            if (is_file($jsFile)) {$jsFiles[] = $jsFile.'?'.rand(100,20000);} ;
        ;}
        
        return $jsFiles;
        
    }



    public function cssFiles($dir)
    {
        $csses=$this->csses();
        
        $cssFiles=array();

        foreach($csses as $css){
            $cssFile= $dir.$css.'.css';
            if (is_file($cssFile)) {$cssFiles[] = $cssFile.'?'.rand(100,20000);} ;
        ;}
        
        return $cssFiles;
        
    }

}