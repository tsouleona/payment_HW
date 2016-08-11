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
            $sql = "SELECT `ver_time` FROM `user` WHERE `id` = ?";
            $verTime = $this->fetchData($sql, $params);
            return $verTime;
        }

        public function getBalance ($id)
        {
            $params = [$id];
            $sql = "SELECT `balance` FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($sql, $params);

            return $row[0]['balance'];
        }

        public function updateUser ($id, $balance, $userGetTime)
        {
            $verTime = date("Y-m-d H:i:s");
            $params = [$balance , $verTime, $id, $userGetTime];
            $sql = "UPDATE `user` SET `balance` = `balance` + ? , `ver_time` = ? WHERE `id` = ? AND `ver_time` = ?";
            $this->executeSql($sql, $params);
            if ($this->result->rowCount() == 0) {
                return false;
            }
        }

    }