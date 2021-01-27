<?php

// System Functions

function dontMatch(array $given, $match){
    $match = [$match];
    $needle = array_diff($given, $match);
    $needle = array_values($needle);
    return $needle;
}

function bytesToHuman($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}


if(!function_exists("file_ext")){
    function file_ext($path = null){
        if(!is_null($path)){
            $infoPath = pathinfo($path);
            $extension = $infoPath['extension'];
            return $extension;
        }
    }
}


if(!function_exists("str_limit"))
{
    function str_limit($str, $limit){
        return \Str::limit($str,$limit);
    }
}

function array_truncate(&$arr)
{
    return array_splice($arr, 0, count($arr));
}


function current_view(){
    $url = url()->current();
    $exploded = explode('/', $url);
    $params = array_keys($exploded);
    $params_count = count($params);
    
    if($params_count > 5){
        if($exploded[5] == 'index'){
            return "dashboard.index";
        }else{
            if($params_count > 6){
                return $exploded[4] . '.' . $exploded[5] . '.' . $exploded[6];
            }else{
                return $exploded[4] . '.' . $exploded[5] . '.' . 'index';
            }
        }
    }elseif($params_count == 5){
        return "dashboard.index";
    }    
}



function pre_r($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}



function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function slug($str, $unique = true){
    if($str){
        $exploded = explode(' ',$str);
        if($unique === true){
            $exploded = array_unique($exploded);
        }
        $slug = implode('-',$exploded);
        $slug = strtolower($slug);
        return $slug;
    }
}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function checkArrayKeys($array,$needle){
   
    $nextToBeSet = $needle;
    $is_exist = false;
    foreach($array as $k => $v)
    {
        if(startsWith($k, $nextToBeSet))
        {
            $is_exist = true;
            break;
        }
    }

    if($is_exist){
        return true; // Exist
    }else{
        return false; // Not Exist
    }

}

function checkSession(){
    $sessions = session()->all();
    if(checkArrayKeys($sessions,'login') === false){
        return true; // Expired
    }
}





















// Html


function br(){
    echo "<br>";
}

function space(){
    echo "&nbsp;";
}

function a($link = "link", $href = "#", $target = "", $class = "", $style = ""){
    echo "<a href='".$href."' class='".$class."' target='".$target."' style='".$style."'>{$link}</a>";
}

function alert($txt = '', $class = 'success'){
    echo "<div class='alert alert-".$class."'>".$txt."</div>";
}

function img($src,$class = '',$style = ''){
    if($src){
        echo "<img src='".$src."' class='".$class."' style='".$style."'>";
    }
}


function imgLink($src,$class = '',$style = '',$link = "#", $target="_blank",$download = ''){
    if($src){
        echo "<a href='".$link."' target='".$target."'><img src='".$src."' class='".$class."' style='".$style."' ".$download."></a>";
    }
}


function danger($txt){
    echo "<b class='text-danger'>".$txt."</b>";
}

function success($txt){
    echo "<b class='text-success'>".$txt."</b>";
}

function b($txt){
    echo "<b class='text-default'>".$txt."</b>";
}


function h1($txt, $class = ''){
    echo "<h1 class='".$class."'>".$txt."</h1>";
}

function h2($txt, $class = ''){
    echo "<h2 class='".$class."'>".$txt."</h2>";
}

function h3($txt, $class = ''){
    echo "<h3 class='".$class."'>".$txt."</h3>";
}

function h4($txt, $class = ''){
    echo "<h4 class='".$class."'>".$txt."</h4>";
}

function h5($txt, $class = ''){
    echo "<h5 class='".$class."'>".$txt."</h5>";
}

function h6($txt, $class = ''){
    echo "<h6 class='".$class."'>".$txt."</h6>";
}

