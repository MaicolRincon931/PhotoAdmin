<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isLogin(): bool{
    session_start();
    
    if(empty($_SESSION)){
       header('Location: /login');
    }else{
        return true;
    }

}
