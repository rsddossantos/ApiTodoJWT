<?php
require 'environment.php';

global $config;
$config= array();
if (ENVIRONMENT=="development"){
    $config['dbname']='devstagram';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
    $config['jwt_secret_key'] = 'abC123!';
} else{
    //entrar com os dados de um outro ambiente, como o de produção, por exemplo.
}

global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}