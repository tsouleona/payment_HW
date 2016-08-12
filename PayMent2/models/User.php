<?php
date_default_timezone_set("Asia/Taipei");

    class User extends Connect
    {
        public function checkId ($id)
        {
            $params = [$id];
            $sql = "SELECT * FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($sql, $params);
            $this->pdo_connect = null;
            if ($row) {
                return $row;
            }
            return false;

        }

        public function getVerTime ($id)
        {
            $params = [$id];
            $sql = "SELECT `verstion` FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($sql, $params);
            return $row[0]['verstion'];
        }
    }