<?php
    class Controller{
        protected $result;

        public function __construct(){
            $connect = new Config();
            $this->result = $connect->root();
        }
        public function model($model) {
            require_once "../PayMent/models/mysql_connect.inc.php";
            require_once "../PayMent/models/$model.php";

            return new $model ();
        }

        public function view($view, $data = Array()) {
            require_once "views/$view.php";
        }
    }
