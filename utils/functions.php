<?php

function nav_menu()
{
    $nav_menu = '';
    $nav_items = [
        'home' => 'Home',
        'aboutus' => 'About Us',
        'products' => 'Products',
        'contact' => 'Contact',
    ];
    
    foreach ($nav_items as $path => $page) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $path ? ' active item' : 'item';
        $url =  '/?page=' . $path;
        $nav_menu .= '<li class="item"><a href="' . $url . '" title="' . $page . '" class="item ' . $class . '">' . $page . '</a></li>';
    }

    echo $nav_menu;


}

function content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/pages/' . $page . '.html';

    echo file_get_contents($path);
}

