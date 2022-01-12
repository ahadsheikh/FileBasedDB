<?php
if(file_exists('.env')){
    $data = file_get_contents('.env');
    $data = explode("\n", $data);
    foreach($data as $line){
        $line = explode('=', $line);
        if(count($line) == 2){
            $key = trim($line[0]);
            $value = trim($line[1]);
            putenv("$key=$value");
        }
    }
}
$PORT = '';
$BASE_URL = getenv('BASE_URL') ? getenv('BASE_URL') : 'http://127.0.0.1:4022';
$DB_TYPE = getenv('DB_TYPE') ? getenv('DB_TYPE') : 'mysql';
$DB_HOST = getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
$DB_NAME = getenv('DB_NAME') ? getenv('DB_NAME') : 'webeng';
$DB_USER = getenv('DB_USER') ? getenv('DB_USER') : 'root';
$DB_PASS = getenv('DB_PASS') ? getenv('DB_PASS') : 'aHad1234';
$BASE_DIR = __DIR__;