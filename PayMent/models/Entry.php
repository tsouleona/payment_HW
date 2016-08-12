<?php
date_default_timezone_set("Asia/Taipei");

    class Entry extends Connect
    {
        public function insertEntry ($userId, $memo, $amount, $action, $balance)
        {
            $date = date("Y-m-d H:i:s");
            $params = [$userId, $memo, $amount, $balance, $date];
            $sql = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)
            VALUES(?, ?, ?, ?, ?)";
            $this->executeSql($sql,$params);
        }

        public function selectEntry ($userId)
        {
            $params = [$userId];
            $sql = "SELECT * FROM `entry` WHERE `user_id` = ?";
            $row = $this->fetchData($sql, $params);
            $this->pdo_connect = null;

            return $row;
        }
    }