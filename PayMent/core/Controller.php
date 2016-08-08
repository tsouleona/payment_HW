<?php
class Controller{
    protected $RESULT;
        
    public function __construct(){
        $CON = new connect_db();
        $this->RESULT = $CON->db();
    }
    public function model($MODEL) {
        require_once "../PayMent/models/mysql_connect.inc.php";
        require_once "../PayMent/models/$MODEL.php";
        
        return new $MODEL ();
    }
    
    public function view($VIEW, $DATA = Array()) {
        require_once "views/$VIEW.php";
        
    }

}
