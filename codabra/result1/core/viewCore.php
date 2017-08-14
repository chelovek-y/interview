<?php
class ViewCore {

    public function __construct($vars=false)
    {

        if ($vars) {foreach($vars as $var=>$val){$this->$var=$val;$$var=$val;}}

        $this->functions();
        $jses=$this->jses();
        $jsFiles = $this->jsFiles($jses, $view, $section);


        $templDir=$this->dirs['templates'];

        $indexFile = $templDir."index.php";

        $bodyFile=$templDir.$view.".php";
        $headerFile=$templDir."header.php";
        $footerFile=$templDir."footer.php";

        require_once($indexFile);

    ;}



    public function jses()
    {
        $jses[]='jquery.ajaxupload';
    ;}

    public function viewFile($view, $section, $templDir)
    {

        $templatesDir=$this->dirs['templates'];

        $templDir=$templatesDir.$view."/";
        $viewFile=$view.".php";
        if ($section) {$bodyFile=$section.".php";}

        return $templDir.$viewFile;
    ;}



    public function jsFiles($jses, $view, $section)
    {

        $jsFiles=array();

        $jsDir=$this->dirs['js'];

        $jses[]=$view;
        if ($section) {$jses[]=$section;} ;

        foreach($jses as $js){
            $jsFile= $jsDir.$js.'.js';
            if (is_file($jsFile)) {$jsFiles[] = $jsFile;} ;
        ;}
        
        return $jsFiles;
        
    ;}








}