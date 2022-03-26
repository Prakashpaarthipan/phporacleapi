<?php
namespace Devspider\Phporacleapi\Database;


class DatabaseCon
{
    private $HOST = '';
    private $USER = '';
    private $PASSWORD = '';
    function __construct()
    {
        $this->HOST = $_ENV['TESTHOST'];
        $this->USER = $_ENV['TESTUSERNAME'];
        $this->PASSWORD = $_ENV['TESTPASSWORD'];
      
        $conn = oci_connect($this->USER, $this->PASSWORD, $this->HOST);
        if (!$conn) {
            die("Database Connection Failed....");
        }
        $this->conn = $conn;
        var_dump($this->conn);
    }
    /*function select($strSQL)
    {
        $result = array();
        $objParse = oci_parse($this->conn, $strSQL);
        $objExecute = oci_execute($objParse, OCI_DEFAULT);
        while (($row1 = oci_fetch_assoc($objParse)) != false) {
            $result[] = $row1;
        }
        return $result;
    }
    function execute($strSQL)
    {
        $objParse = oci_parse($this->conn, $strSQL);
        $objExecute = oci_execute($objParse, OCI_DEFAULT);
        if ($objExecute) {
            return true;
        } else {
            $e = oci_error($objParse);
            return $e['message'];
        }
    }
    function commit()
    {
        $res = oci_commit($this->conn);
        if ($res) {
            return true;
        }
        return false;
    }
    function rollback()
    {
        oci_rollback($this->conn);
    }
    public function __destruct()
    {
        oci_close($this->conn);
    }
    public static function getOracleVer()
    {
        return 'Oracle 11g';
    }*/
}