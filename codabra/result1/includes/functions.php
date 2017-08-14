<?php

function filters()
{

    $filters=array(
    'controller'=>'[a-zA-Z0-9_]{1,30}',
    'c'=>'[a-zA-Z0-9_]{1,30}',
    'task'=>'[a-zA-Z0-9_]{1,30}',
    't'=>'[a-zA-Z0-9_]{1,30}',
    'model'=>'[a-zA-Z0-9_]{1,30}',
    'v'=>'[a-zA-Z0-9_\/]{1,30}',
    'view'=>'[a-zA-Z0-9_]{1,30}',
    'section'=>'[a-zA-Z0-9_]{1,30}',
    'option'=>'[a-zA-Z0-9_]{1,30}',
    'part'=>'[a-zA-Z0-9_]{1,30}',
    'm'=>'[a-zA-Z0-9_]{1,30}',

    'name_'=>'[,!@$%&\(\)\[\]_0-9а-яА-Яa-zA-Z]{1,40}',
    'message_'=>'[,\.!@$%&\(\)\[\]_0-9а-яА-Яa-zA-Z]{1,512}',
    'messageLeft'=>'[,\.!@$%&\(\)\[\]_0-9а-яА-Яa-zA-Z]{1,512}',
    'messageRight'=>'[,\.!@$%&\(\)\[\]_0-9а-яА-Яa-zA-Z]{1,512}',

    'mess'=>'[,\.!@$%&\(\)\[\]_0-9а-яА-Яa-zA-Z\/\>\<]{1,512}',

    'inp'=>'[a-zA-Z0-9_]{1,15}',
    'loginOld'=>'[0-9а-яА-Яa-zA-Z_ ]{3,40}',
    'login'=>'[0-9a-zA-Z_]{3,40}',
    'loginSpon'=>'[0-9a-zA-Z_]{3,40}',
    'ref'=>'[0-9a-zA-Z_]{3,40}',
    'n'=>'[0-9a-zA-Z]{3,50}',
    //	'email'=>'[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+',
    'email'=>'\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+',
    'email_'=>'\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+',
    'phone'=>'\+?[0-9\-\—\– \)\(]{6,15}',
    'pass'=>'[!@#$%^&*()\[\]_0-9а-яА-Яa-zA-Z]{6,40}',
    'pass2'=>'[!@#$%^&*()\[\]_0-9а-яА-Яa-zA-Z]{6,40}',
    'password'=>'[!@#$%^&*()\[\]_0-9а-яА-Яa-zA-Z]{6,40}',
    'password2'=>'[!@#$%^&*()\[\]_0-9а-яА-Яa-zA-Z]{6,40}',

    'skype'=>'[a-zA-Z][-_a-zA-Z0-9]{5,31}',
    'ok'=>'(http:\/\/|)(www\.|)(ok\.ru|odnoklassniki\.ru)\/profile\/[a-zA-Z0-9\.\-\_]{1,30}',
    'fb'=>'(http[s]?:\/\/|)(ru-ru\.|)(www\.|)facebook.com\/[a-zA-Z0-9\.\-\_]{1,50}',
    'vk'=>'(http[s]?:\/\/|)(www\.|)(vk\.com|vkontakte\.ru)\/[a-zA-Z0-9\.\-\_]{1,50}',



    'tw'=>'(http[s]?:\/\/|)(www\.|)twitter\.com\/[a-zA-Z0-9\.\-\_]{1,50}',
    'goo'=>'(http[s]?:\/\/|)(www\.|)plus\.google\.com\/[a-zA-Z0-9\.\-\_\/]{1,200}',

    'aboutMe'=>'[!@#$%^&*\?\.\(\)\[\]_0-9а-яА-Яa-z\/A-Z]{1,512}',

    //'ref'=>'[a-zA-Z0-9_]{10,25}',


    'pmWallet'=>'U[0-9]{7,8}',
    'step'=>'[0-9a-zA-Z]{1,10}',

    'type'=>'[0-9a-zA-Z]{1,10}',
    'cost'=>'[0-9\.]{1,10}',
    'purpose'=>'[0-9a-zA-Z_]{1,15}',

    'PAYEE_ACCOUNT'=>'U[0-9]{7,8}',
    'PAYMENT_ID'=>'[0-9]{1,12}',
    'PAYMENT_AMOUNT'=>'[0-9\.]{1,10}',
    'PAYMENT_UNITS'=>'[0-9a-zA-Z_]{1,4}',
    'PAYMENT_BATCH_NUM'=>'[0-9]{1,12}',
    'PAYER_ACCOUNT'=>'U[0-9]{7,8}',
    'TIMESTAMPGMT'=>'[0-9]{9,12}',
    'V2_HASH'=>'[0-9a-zA-Z_]{1,50}',


    'pm'=>'[0-9]{1,10}',

    'userId2'=>'[0-9]{1,11}',

    'contact-name'=>'[!@#$%^&*\(\)\[\]_0-9а-яА-Яa-zA-Z]{1,40}',
    'contact-email'=>'\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+',
    'contact-skype'=>'[a-zA-Z][-_a-zA-Z0-9]{5,31}',
    'contact-phone'=>'\+?[0-9\-\—\– \)\(]{6,15}',
    'domen'=>'[a-zA-Z0-9\-\.:]{1,50}',

    'lang'=>'[a-zA-Z0-9]{1,4}',

    'phraseIdent'=>'[a-zA-Z0-9_ :\(\)]{1,256}',
    'firstLetter'=>'[a-zA-Z0-9_]{1,3}',

    'code'=>'[a-zA-Z0-9]{1,6}',
    'type'=>'[a-zA-Z0-9_]{1,32}',

    'smsNotice'=>'[0-9]{0,1}',
    'smsNoticeNew'=>'#3',
    'autoReinv7'=>'[0-9]{0,1}',

    'menu'=>'#1',
    'id'=>'#2',

    'mode'=>'#1',
    'des'=>'old|new',

    'noreadId'=>'#2',

    'npName'=>'#0',
    'excName'=>'#0',

    'remember'=>'#4',

    '#1'=>'[^\'\"\=\,]{1,40}',//почти все
    '#2'=>'[0-9]{1,20}',//число, Id
    '#3'=>'[0-9\,\.]{1,20}',//число с плавающей точкой
    '#4'=>'[a-zA-Z0-9_]{1,20}',//переменные
    '#5'=>'[0-9a-zA-Z]{1,6}',//чекбокс


    'type1'=>'#5',
    'type2'=>'#5',
    'type3'=>'#5',
    'district'=>'#1',
    'village'=>'#1',
    'street'=>'#1',
    'login'=>'#1',
    //'password'=>'#0',
    'priceFrom'=>'#3',
    'priceTo'=>'#3',
    'priceSotkaFrom'=>'#3',
    'priceSotkaTo'=>'#3',
    'squareFrom'=>'#3',
    'squareTo'=>'#3',
    'squareParcelFrom'=>'#3',
    'squareParcelTo'=>'#3',
    'distanceSeaFrom'=>'#3',
    'distanceSeaTo'=>'#3',


    );

    return $filters;

;}

function formatt($name, $var)
{
    switch ($name) {
        case 'aboutMe':
        $var=str_replace(array('"','\'','\\','\/'), '', $var);
    break;
}

    return $var;

;}


function getVar($name,$var=false){

    $filters=filters();

    if ($_POST[$name]) {
        $var=$_POST[$name];
    } elseif($_GET[$name]) {
        $var=$_GET[$name];
    } elseif($var) {

    }else{
        $var=false;
    }

    if ($var) {

        $var= formatt($name, $var);

        $shablMid=$filters[$name];
        if ($shablMid) {

        if (checkVar($shablMid, '\#[0-9]{1,2}')) {
            $shablMid = $filters[$shablMid];
        }

        if (checkVar($var, $shablMid)) {
            $var_=$var;
        }else{
            $var_=false
        ;}

        } else {
            
            $var_=false;
            
        }
    } else {
        $var_=false;
    }


    return $var_;

;}


function checkVar($var, $shablMid){

    $shabl="/^".$shablMid."$/u";
    preg_match($shabl, $var, $matches);
    if ($matches[0]) {
        return true;
    }else{
        return false;
    }

;}





