<?php

define('BASE_URL','http://localhost/Arian%20Tune/');
define('BASE_IMG','http://localhost/');


function redirect($moz){
    header('Location: '.trim(BASE_URL,'/ ').'/'.trim($moz,'/ '));
    exit;
}

function asset($file){
    return trim(BASE_IMG,'/ ').'/'.trim($file,'/ ');
}


function url($url){
    return trim(BASE_URL,'/ ').'/'.trim($url,'/ ');
}


function dd($var){
    var_dump($var);
    exit;
}









// define('baseURL','http://localhost/shop/Arian%20Car');

// function asset($a){
//     return trim(baseURL,'/ ').'/'.trim($a,'/ ');
// }
// function url($a){
//     return trim(baseURL,'/ ').'/'.trim($a,'/ ');
// }
?>




<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    @font-face {
    font-family: "reza";
    src: url("<?= url('font/Facon Font ( www.rezagraphic.ir )/Facon Font ( www.rezagraphic.ir )/Facon Font ( www.rezagraphic.ir ).ttf')?>");
    }
    @font-face {
    font-family: "digi";
    src: url("<?= url('font/Digi-Gafwww.digifonts.ir_/Digi\ Ghaf\ Bold.otf')?>");
    src: url("<?= url('font/Digi-Gafwww.digifonts.ir_/Digi\ Ghaf\ Bold.ttf')?>");
    }
    ::-webkit-scrollbar{
    width: 13px;
    height: 13px;
    
    }
    ::-webkit-scrollbar-track{
    background-color: black;
    
    }
    ::-webkit-scrollbar-thumb{
    background-color: white;
    border-radius: 7.5px;
    
    }
</style>