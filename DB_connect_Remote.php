<?php
/**
 * Created by PhpStorm.
 * User: cpayret
 * Date: 5/2/2018
 * Time: 3:26 PM
 */
class DB_connect_Remote extends mysqli
{

    private $par_con =  array('remote address', 'remote_user', 'remote_pass', 'remote_DB');


    public function __construct()
    {
        parent::__construct($this->par_con[0], $this->par_con[1], $this->par_con[2], $this->par_con[3]);
        if ($this->connect_error) {
            die('Connect Error: ' . $this->connect_error);
        }
    }
    public function select_mailid_to_process($n = 10)
    {

        $qry="SELECT FROM_UNIXTIME(MAX(a.date)) as max1 , FROM_UNIXTIME(MIN(a.date))  as min1
FROM  fsj_acymailing_urlclick a
ORDER BY a.date DESC
LIMIT 1";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $return_temp;
    }

    public function select_remote_data($table_name,$id_name,$last_position=0,$limit=18446744073709551615){
        $qry="SELECT a.* FROM  $table_name a WHERE a.$id_name>$last_position LIMIT $limit";


         echo  "<br><br>$qry<br><br<br>";
        if (!$return_temp = $this->query($qry)) {
            die("Error message:" . $this->error);
        }
        return $return_temp;

    }
}