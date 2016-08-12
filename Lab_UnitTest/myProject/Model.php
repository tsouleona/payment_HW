<?php
namespace myProject;
use myProject\Connect;

    class Model extends Connect
    {
        public function findExpenseconflict ($userId, $amount, $memo)
        {

            $this->pdo_connect->beginTransaction();

            $sql = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
            $params = [$userId];
            $row = $this->fetchData($sql, $params);
            $balance = $row[0]['balance'];

            if ($amount > $balance) {
                return "您的出款金額大於餘額";
            }

            if ($amount < 0) {
                return "您的出款金額不能小於0";
            }

            $amount = -$amount;
            $balance = $balance + $amount;
            $sql = "UPDATE `user` SET `balance` = `balance` + ? WHERE `id` = ?";
            $params = [$amount, $userId];
            $this->executeSql($sql, $params);
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)VALUES(?, ?, ?, ?, ?)";
            $params = [$userId, $memo, $amount, $balance, $date];
            $this->executeSql($sql, $params);

            $this->pdo_connect->commit();
            $this->pdo_connect = null;

            return true;
        }

        public function findDepositconflict ($userId, $amount, $memo)
        {
            $this->pdo_connect->beginTransaction();

            $sql = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
            $params = [$userId];
            $row = $this->fetchData($sql, $params);
            $balance = $row[0]['balance'];

            if ($amount < 0) {
                return "您的出款金額不能小於0";
            }

            $balance = $balance + $amount;
            $sql = "UPDATE `user` SET `balance` = `balance` + ? WHERE `id` = ?";
            $params = [$amount, $userId];
            $this->executeSql($sql, $params);
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)VALUES(?, ?, ?, ?, ?)";
            $params = [$userId, $memo, $amount, $balance, $date];
            $this->executeSql($sql, $params);

            $this->pdo_connect->commit();
            $this->pdo_connect = null;

            return true;
        }

        public function checkId ($id)
        {
            $params = [$id];
            $sql = "SELECT * FROM `user` WHERE `id` = ?";
            $row = $this->fetchData($sql, $params);
            $this->pdo_connect = null;
            if ($row) {

                return true;
            }

            return false;
        }

        public function selectEntry ($userId)
        {
            $params = [$userId];
            $sql = "SELECT * FROM `entry` WHERE `user_id` = ?";
            $row = $this->fetchData($sql, $params);
            $this->pdo_connect = null;
            if ($row) {

                return true;
            }

            return false;
        }
    }