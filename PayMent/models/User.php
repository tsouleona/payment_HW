<?php
    class User extends Connect
    {
        public function checkId ($id)
        {
            $items = [$id];
            $order = "SELECT * FROM `user` WHERE `id` = ?";
            $row = $this->connectGetdata($order, $items);
            $this->pdo_connect = null;
            if ($row) {
                return $row;
            }
            return false;

        }

        public function selectBalance ($id)
        {
            $items = [$id];
            $order = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
            $row = $this->connectGetdata($order, $items);

            return $row[0]['balance'];
        }

        public function updateUser ($id, $balance)
        {
            $items = [$balance,$id];
            $order ="UPDATE `user` SET `balance`=? WHERE `id` = ?";
            $this->connectMysql($order, $items);
        }

    }