<?php
 namespace Devspider\Phporacleapi;

 use Devspider\Phporacleapi\Database\DatabaseCon;
 class Api {

    function __construct() {
        $this->db = new DatabaseCon();
        var_dump($this->db);
    }
 }

 
