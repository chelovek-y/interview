<?php

class View extends ViewCore {

    public function jses(){
        $jses[]='jquery.ajaxupload';
    ;}

    public function viewFile($view, $section, $templDir){
        $viewFile=$view.".php";
        return $templDir.$viewFile;
    ;}

    public function functions(){
        function fNumber3($numb){
            if (!$numb) {$numb="";}else{$numb=$numb+0;} ;
            return $numb;
        ;}
    ;}

}