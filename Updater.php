<?php

/**
 * Created by PhpStorm.
 * User: cpayret
 * Date: 5/4/2018
 * Time: 11:53 AM
 */
class Updater
{

    private $DB_layer_local;
    private $DB_layer_remote;
    public  $db_table_schema_info;
    private $table_name_temp;
    public function __construct()
    {

        $this->DB_layer_local=new DB_connect_Local();
        $this->DB_layer_remote=new DB_connect_Remote();
    }

    public function update($limit=0){
        $result_local = $this->DB_layer_local->select_list_update();
        if ($result_local) {
            echo "<br>  LOCAL update list parameters \n ";

            while ($rows = $result_local->fetch_object()) {
                $this->table_name_temp=$rows->table_name;   

               $last_position=$this->DB_layer_local->get_last_position($rows->table_name,$rows->field);
                   if (!$last_position){$last_position=0;}

                echo " Last Position : $last_position";
                echo "\n";
                echo "DATA SELECT::";
                $select_remote_data= $this->DB_layer_remote->select_remote_data($rows->table_name,$rows->field,$last_position,10000);

                $counter=0;

                if ($select_remote_data) {

                    unset($values_real_escape_string);
                    while ($rows = $select_remote_data->fetch_object()) {

                        foreach ($rows  as $key => $values) {

                            $values_real_escape_string[$key]= $this->DB_layer_local->real_escape_string($values);

                        }
                      $counter++;
                        echo "$counter   --- ";

                      echo "\n affected : ".$this->DB_layer_local->insert_local($this->table_name_temp,$values_real_escape_string);
                    }
                }

            }
        }

    }
    private function get_lastposition_local(){
    }

  public function testing_local(){
      $result = $this->DB_layer_local->select_mailid_to_process();
      if ($result) {
          while ($rows = $result->fetch_object()) {
              return $rows->min1."     ".$rows->max1;
          }
      }
  }

    public function testing_remote(){
        $result = $this->DB_layer_remote->select_mailid_to_process();
        if ($result) {
            while ($rows = $result->fetch_object()) {
                return $rows->min1."     ".$rows->max1;
            }
        }
    }
    public function __destruct(){

        $this->DB_layer_local->close();
        $this->DB_layer_remote->close();


    }

}