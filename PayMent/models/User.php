<?php
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

        public function getBalance ($id)
        {
            $params = [$id];
            $sql = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
            $row = $this->fetchData($sql, $params);

            return $row[0]['balance'];
        }

        public function updateUser ($id, $balance)
        {
            $params = [$balance, $id];
            $sql = "UPDATE `user` SET `balance` = `balance` + ? WHERE `id` = ?";
            $this->executeSql($sql, $params);
        }

    }