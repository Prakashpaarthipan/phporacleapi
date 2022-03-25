<?php
class QueryCommands{

    function insert_query($field_values, $tbl_names)
        {
            
            $org_value ='';
            $key_values='';
            $kvl='';
            $kyvl='';
            $kkvl=array();
            try {                
                $org_value = array_values($field_values);
                $key_values = array_keys($field_values);

                for($ii = 0; $ii < count($field_values); $ii++) {
                    $expld = explode("~~",$org_value[$ii]);                   
                    if($expld[1] != '')
                    {
                        $kvl .= $key_values[$ii].", ";
                        $kyvl .= "to_date('".$expld[1]."', '".$expld[0]."'), ";
                        $kkvl[] = "".$key_values[$ii]."";
                    } else {
                        $kvl .= $key_values[$ii].", ";
                        $kyvl .= "'".$org_value[$ii]."', ";
                        $kkvl[] = "".$key_values[$ii]."";
                    }
                }
                $kyvl = rtrim($kyvl, ", ");
                $kvl = rtrim($kvl, ", ");

                $sql_insert ="insert into ".$tbl_names." (".$kvl.") values (".$kyvl.")";
                $save_query = save->db($sql_insert);
                return $save_query;
            }
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }

    function update_query($field_values, $tbl_names, $where_condition)
        {
            $kyvl='';
            try{
                $key_value = array_keys($field_values);
                $org_value = array_values($field_values);
                $key_values = array_keys($field_values);
                $org_values = array_values($field_values);

                for($ii = 0; $ii < count($field_values); $ii++) {
                    $expld = explode("~~",$org_value[$ii]);
                    if($expld[1] != '')
                    {
                        $kyvl .= $key_values[$ii]." = to_date('".$expld[1]."', '".$expld[0]."'), ";
                    } else {
                        $kyvl .= $key_values[$ii]." = '". $org_values[$ii]."', ";
                    }
                }
                $kyvl = rtrim($kyvl, ", ");
                $sql_update = "UPDATE ".$tbl_names." SET ".$kyvl." WHERE ".$where_condition;
                return $sql_update;
            }
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }
}