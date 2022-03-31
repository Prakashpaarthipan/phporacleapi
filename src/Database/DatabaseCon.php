<?php
namespace Devspider\Phporacleapi\Database;

class DatabaseCon
{
    private $HOST = '';
    private $USER = '';
    private $PASSWORD = '';
    private $conn='' ;
    function __construct()
    {
        $this->HOST = $_ENV['TESTHOST'];
        $this->USER = $_ENV['TESTUSERNAME'];
        $this->PASSWORD = $_ENV['TESTPASSWORD'];
        
        $connection = @oci_connect($this->USER, $this->PASSWORD, $this->HOST);
                
        if (!$connection) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        $this->conn = $connection;
        
    }
    function select($strSQL)
    {
        $result = array();
        $objParse = oci_parse($this->conn, $strSQL);
        $objExecute = oci_execute($objParse, OCI_ASSOC+OCI_RETURN_NULLS);
        while (($row1 = oci_fetch_assoc($objParse)) != false) {
            $result[] = $row1;
        }
        return $result;
    }
    function execute($strSQL)
    {
        $objParse = oci_parse($this->conn, $strSQL);
        $objExecute = oci_execute($objParse, OCI_ASSOC+OCI_RETURN_NULLS);
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
    public  function getOracleServerVer()
    {
        return oci_server_version($this->conn);
    }
    public  function getOracleClientVer()
    {
        return oci_client_version();
    }
    
    
}
