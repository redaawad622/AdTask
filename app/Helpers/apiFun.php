<?php


function apiRet($data , $success = '' , $error = ''){
    $s = $success == ''  ? true : false;
    return json_encode(['success' => $s ,'data' => $data , 'error' => $error] , JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
}