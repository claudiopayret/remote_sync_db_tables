<?php
/**
 * Created by PhpStorm.
 * User: cpayret
 * Date: 5/2/2018
 * Time: 3:49 PM
 */
class DB_connect_Local extends mysqli
{
      private $par_con =  array('local_address', 'local__user', 'local__pass', 'local_DB');

    public function __construct()
    {
        parent::__construct($this->par_con[0], $this->par_con[1], $this->par_con[2], $this->par_con[3]);
        if ($this->connect_error) {
            die('Connect Error: ' . $this->connect_error);
        }
    }
    public function select_list_update($act = 1)
    {

        $qry = "SELECT * FROM  stand_alone_update_list a WHERE a.act=$act";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $return_temp;
    }
    public function get_table_squema_info($table_name){

        $qry = "SELECT group_concat(COLUMN_NAME) as COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='$table_name'";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        $rows = $return_temp->fetch_object();
        return $rows->COLUMN_NAME;
    }

    public function select_mailid_to_process($n = 10)
    {
        $qry = "SELECT FROM_UNIXTIME(MAX(a.date)) as max1 , FROM_UNIXTIME(MIN(a.date)) as min1
FROM  fsj_acymailing_urlclick a
ORDER BY a.date DESC
LIMIT 1";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $return_temp;
    }
    public function get_last_position($table_name, $id_name)
    {
        $qry = "SELECT MAX(a.$id_name) as last_position FROM  $table_name a LIMIT 1";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        $rows = $return_temp->fetch_object();
        return $rows->last_position;
    }
    public function insert_local($table_name, $values)
    {
        $qry="REPLACE INTO $table_name   VALUES ('".implode("','",$values)."')";

  if (!$this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $this->affected_rows;
    }
    public function query_havoc($qry)
    {
        if (!$this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $this->affected_rows;

    }
}
