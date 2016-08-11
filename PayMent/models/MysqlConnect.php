<?php

    class Connect{
        protected $result;
        public $pdo_connect;

        public function __construct ()
        {
            $db_server = "localhost";
            $db_name = "PayMent";
            $db_user = "tsouleona";
            $db_passwd = "830606";
            $db_connect = "mysql:host=".$db_server.";dbname=".$db_name;
            $this->pdo_connect = new PDO($db_connect, $db_user, $db_passwd);
            $this->pdo_connect->exec("SET NAMES utf8");
        }

        public function executeSql ($order, $items)
        {
            $this->result = $this->pdo_connect->prepare($order);
            $this->result->execute($items);
        }

        public function fetchData ($order, $items)
        {
            $this->executeSql($order, $items);
            $row = $this->result->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
    }