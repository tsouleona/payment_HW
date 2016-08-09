<?php
    class Entry extends Connect
    {
        public function insertEntry ($list, $date, $action, $balance)
        {
            $items = [$list['user_id'], $action, $list['memo'], $list['amount'], $balance, $date];
            $order = "INSERT INTO `entry`(`user_id`, `action`, `memo`, `amount`, `balance`, `date`)
            VALUES(?, ?, ?, ?, ?, ?)";
            $this->connectMysql($order,$items);
        }

        public function selectEntry($user_id)
        {
            $items = [$user_id];
            $order = "SELECT * FROM `entry` WHERE `user_id`=?";
            $row = $this->connectGetdata($order, $items);
            $this->pdo_connect = null;

            return $row;
        }
    }