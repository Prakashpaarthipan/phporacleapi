<?php

namespace Devspider\Phporacleapi;

require_once('../vendor/autoload.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Devspider\Phporacleapi\Database\DatabaseCon;

class Api
{
    protected $db;
    function __construct()
    {
         $this->db = new DatabaseCon();
    }
    function getServerVer(){

        return $this->db->getOracleServerVer();
    }
    function getClientVer(){

        return $this->db->getOracleClientVer();
    }
    function selectQuery($str){
        return $this->db->select($str);
    }
}

$a = new Api();
echo $a->getClientVer();