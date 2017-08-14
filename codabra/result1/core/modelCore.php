<?php

class ModelCore {


    public function __construct()
    {

        $this->sets=$this->sets();

        $this->dirs=$this->dirs();

        require_once('conf.php');

        $this->includeLibs();

    ;}


    public function sets()
    {	
        ini_set('default_charset', 'UTF-8');
        session_start();
    //set_time_limit(900);
    //	ini_set('memory_limit', '128M');
    ;}

    public function dirs()
    {	
        $dirs['reports'] = "reports/";
        $dirs['languages'] = "languages/";
        $dirs['includes'] = "includes/";
        $dirs['templates'] = "templates/";
        $dirs['js'] = "js/";
        return $dirs; 
    ;}


    public function includeLibs(){	

        require_once('dbAndrey.php');
        require_once('curl.class.php');
        require_once('simple_html_dom.php');
        require_once('andreyCSV.php');

        $config['tpf']='___Sevas';
        $this->db = new dbAndrey($config);
        $this->curl = new curl();
        //	$this->curl->setSleep(0.5,2);

        $this->dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
        $this->dom2 = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
        $this->csv = new andreyCSV();

    ;}


    /* общие, специализированные, узкоспециализированные */
    /*////////////// ОБЩИЕ //////////////*/

    /*пути, директории*/
 

    public function rootDir(){
        $sf=$_SERVER["SCRIPT_FILENAME"];
        return mb_substr($sf,0, mb_strrpos($sf,'/')+1);
    ;}



    public function getUserIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /* строки */
    public function shortTxt($txt, $len=40)
    {
        $lenTxt=mb_strlen($txt);

        if ($lenTxt>$len) {$txt=mb_substr($txt,0,($len-3)).'...';}

        return $txt;
    ;}





    public function regularIsset($shabl,$i_t)
    {

        preg_match("/$shabl/us", $i_t, $thumb80);

        if ($thumb80[0]) {$return=true;} else {$return=false;}

        return $return;

    ;}


    public function regularGet($shabl,$i_t)
    {
        //print_r($i_t); print_r('<br/>');
        preg_match_all("/$shabl/us", $i_t, $thumb80);


        if (count($thumb80)==1) {
            if (count($thumb80[0])==1) {
                $return=$thumb80[0][0];
            ;}else{
                $return=$thumb80[0];
            ;}
        ;} elseif (count($thumb80)==2) {
        if (count($thumb80[1])==1) {
            $return=$thumb80[1][0];
        ;}else{
            $return=$thumb80[1];
        ;}

        ;} else {
            $return=$thumb80;
        ;} ;
        return ($return) ?  ($return) :  (false)
    ;}

    public function getExtention ($fileName){
        return mb_substr($fileName,mb_strrpos($fileName,'.')+1);
    ;}

    public function generateCode($length=8,$mode=false)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz123456789";
        if ($mode!='small') {
            
            $chars = $chars."ABCDEFGHIJKLMNOPRQSTUVWXYZ";} ;

            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
            
        }
        
        return $code;
    }







}
