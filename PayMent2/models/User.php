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

        public function getBalance ($id)
        {
            $params = [$id];
            $sql = "SELECT `balance` FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($sql, $params);

            return $row[0]['balance'];
        }

        public function updateUser ($id, $amount, $userGetTime, $verTime)
        {
            $verTime = $verTime + 1;
            $params = [$amount , $verTime, $id, $userGetTime];
            $sql = "UPDATE `user` SET `balance` = `balance` + ? , `verstion` = ? WHERE `id` = ? AND `verstion` = ?";
            $this->executeSql($sql, $params);

            if ($this->result->rowCount() == 0) {
                return true;
            }
        }

    }