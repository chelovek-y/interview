<?php

$html="<!DOCTYPE html>
<html>
<head>
    <title>Hello!</title>
</head>

<body>

        <div style='border:1px solid black; font-weight:bold'>
            Этот вид объединений практически ничем не отличается от левостороннего <div>объединения, за тем исключением, что данные берутся из второй таблицы,<br> <div ></div>которая находится справа от констркуции JOIN, и <br>сравниваются с </div> данными, которые находятся в таблице, указанной перед конструкцией.
        </div>
       Поскольку для наименования Табуретка в таблице <font>описаний нет подходящей записи, </font> то в поле description подставился NULL. Это справедливо для всех записей, у которых нет подходящей пары.

Если дополнить предыдущий запрос условием на проверку несуществования описания, то можно получить список записей, которые не имеют пары в таблице описаний:
</body>
</html>
</font>";

function checkHtml($html)
{
    $tags=array(
        'html',
        'head',
        'body',
        'div',
        'title',
        'font',
    );;
    
    $wildcard="/<[ \/]*?(".implode("|", $tags).")[ a-zA-Z0-9:\-;\"'=]*?>/us";

    preg_match_all($wildcard, $html, $matches);
    
    //print_r($matches);
    
    $fullTags=$matches[0];
    $nameTags=$matches[1];
    
    $wildcard2="/^ *<\/{1}.*/u";
    $level=0;
    $errTag = 0;
    foreach($fullTags as $i=>$tag){
        $openTag=1;
        preg_match($wildcard2, $tag, $matches);
        if ($matches) {$openTag=0;} ;
        
        if ($openTag) {
            $level++;
            $levelTag[$level] = $nameTags[$i];
        } else {
            if (isset($levelTag[$level]) AND $levelTag[$level] == $nameTags[$i] ) {
                $level--;
            ;} else {
                $errTag=$tag;
                break;
            ;} ;
        ;} ;
        
    ;}
    
    if ($errTag) {
        echo "Ошибка на теге ".htmlentities($errTag);
    } else {
        echo "Ошибок в верстке не найдено";
    } ;
    
}

checkHtml($html);

