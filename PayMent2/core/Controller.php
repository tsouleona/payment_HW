<?php
    class Controller
    {
        protected $root;

        public function __construct ()
        {
            $connect = new Config();
            $this->root = $connect->root();
        }

        public function model ($model)
        {
            require_once "../PayMent2/models/MysqlConnect.php";
            require_once "../PayMent2/models/$model.php";

            return new $model ();
        }

        public function view ($view, $data = Array())
        {
            require_once "views/$view.php";
        }
    }
