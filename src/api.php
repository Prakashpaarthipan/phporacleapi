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
        // var_dump($this->db);
    }
}

$a = new Api();
