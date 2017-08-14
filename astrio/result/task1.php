<?php

$categories = array(
    array(
        "id" => 1,
        "title" =>  "Обувь",
        'children' => array(
            array(
                'id' => 2,
                'title' => 'Ботинки',
                'children' => array(
                    array(
                        'id' => 3, 
                        'title' => 'Кожа'
                    ),
                    array(
                        'id' => 4, 
                        'title' => 'Текстиль'
                    ),
                ),
            ),
            array(
                'id' => 5, 
                'title' => 'Кроссовки',
            ),
        )
    ),
    array(
        "id" => 6,
        "title" =>  "Спорт",
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
);

function searchCategory($categories, $id)
{

    foreach($categories as $category){
        
        if ($category['id']==$id) {
            if ($category['title']) {echo $category['title'];} ;
            break;
        } ;
        if (isset($category['children'])) {
            searchCategory($category['children'], $id);
        ;}
        
    ;}
;}

searchCategory($categories, 4);
