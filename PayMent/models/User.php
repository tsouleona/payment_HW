<?php
    class User extends Connect
    {
        public function checkId ($id)
        {
            $items = [$id];
            $order = "SELECT * FROM `User` WHERE `id`=?";
            $row = $this->connectGetdata($order, $items);
            $this->pdo_connect = null;
            if ($row) {
                return $row;
            } else {
                return false;
            }
        }

        public function selectBalance ($id)
        {
            $items = [$id];
            $order = "SELECT `User_Total` FROM `User` WHERE `User_ID`=? FOR UPDATE";
            $row = $this->connectGetdata($order, $items);

            return $row[0]['User_Total'];
        }

        public function updateUser ($id, $balance)
        {
            $items = [$balance, $id];
            $order ="UPDATE `User` SET `User_Total`=? WHERE `User_ID`=?";
            $this->connectMysql($order, $items);
        }

    }