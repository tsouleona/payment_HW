<?php
    date_default_timezone_set("Asia/Taipei");

    class Entry extends Connect
    {
        public function insertEntry ($list, $amount, $action, $balance)
        {
            $date = date("Y-m-d H:i:s");
            $items = [$list['userId'], $list['memo'], $amount, $balance, $date];
            $order = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)
            VALUES(?, ?, ?, ?, ?)";
            $this->connectMysql($order,$items);
        }

        public function selectEntry ($userId)
        {
            $items = [$userId];
            $order = "SELECT * FROM `entry` WHERE `user_id` = ?";
            $row = $this->connectGetdata($order, $items);
            $this->pdo_connect = null;

            return $row;
        }
    }