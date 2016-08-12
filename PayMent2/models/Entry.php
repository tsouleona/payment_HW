<?php
date_default_timezone_set("Asia/Taipei");

    class Entry extends Connect
    {
        public function selectEntry ($userId)
        {
            $params = [$userId];
            $sql = "SELECT * FROM `entry` WHERE `user_id` = ?";
            $row = $this->fetchData($sql, $params);
            $this->pdo_connect = null;

            return $row;
        }
    }