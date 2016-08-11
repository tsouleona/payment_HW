<?php
    class User extends Connect
    {
        public function checkId ($id)
        {
            $items = [$id];
            $order = "SELECT * FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($order, $items);
            $this->pdo_connect = null;
            if ($row) {
                return $row;
            }
            return false;

        }

        public function getBalance ($id)
        {
            $items = [$id];
            $order = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
            $row = $this->fetchData($order, $items);

            return $row[0]['balance'];
        }

        public function updateUser ($id, $balance)
        {
            $items = [$balance,$id];
            $order ="UPDATE `user` SET `balance` = `balance` + ? WHERE `id` = ?";
            $this->executeSql($order, $items);
        }

    }