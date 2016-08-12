<?php
date_default_timezone_set("Asia/Taipei");
    class ConflictProcess extends Connect
    {
        public function findExpenseconflict ($userId, $amount, $memo, $verTime, $userGetTime)
        {
            try {
                $this->pdo_connect->beginTransaction();
                $sql = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
                $params = [$userId];
                $row = $this->fetchData($sql, $params);
                sleep(5);
                $balance = $row[0]['balance'];

                if ($amount > $balance) {
                    throw new Exception("您的出款金額大於餘額");
                }

                if ($amount < 0) {
                    throw new Exception("您的出款金額不能小於0");
                }
                $amount = -$amount;
                $balance = $balance + $amount;
                $sql = "UPDATE `user` SET `balance` = `balance` + ? , `verstion` = ? WHERE `id` = ? AND `verstion` = ?";
                $params = [$amount , $verTime, $userId, $userGetTime];
                $this->executeSql($sql, $params);

                if ($this->result->rowCount() == 0) {
                    throw new Exception("抱歉，您的交易失敗，請重新執行(按確認鍵)");
                }

                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)VALUES(?, ?, ?, ?, ?)";
                $params = [$userId, $memo, $amount, $balance, $date];
                $this->executeSql($sql, $params);

                $this->pdo_connect->commit();
                $this->pdo_connect = null;

                return [true, $userId, $balance];
            } catch (Exception $err) {
                $this->pdo_connect->rollBack();

                return $err->getMessage();
                $this->pdo_connect = null;
            }
        }

        public function findDepositconflict ($userId, $amount, $memo, $verTime, $userGetTime)
        {
            try {
                $this->pdo_connect->beginTransaction();
                $sql = "SELECT `balance` FROM `user` WHERE `id` = ? FOR UPDATE";
                $params = [$userId];
                $row = $this->fetchData($sql, $params);
                $balance = $row[0]['balance'];

                if ($amount < 0) {
                    throw new Exception("您的入款金額不能小於0");
                }

                $balance = $balance + $amount;
                $sql = "UPDATE `user` SET `balance` = `balance` + ? , `verstion` = ? WHERE `id` = ? AND `verstion` = ?";
                $params = [$amount , $verTime, $userId, $userGetTime];
                $this->executeSql($sql, $params);

                if ($this->result->rowCount() == 0) {
                    throw new Exception("抱歉，您的交易失敗，請重新執行(按確認鍵)");
                }

                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO `entry`(`user_id`, `memo`, `amount`, `balance`, `date`)VALUES(?, ?, ?, ?, ?)";
                $params = [$userId, $memo, $amount, $balance, $date];
                $this->executeSql($sql, $params);

                $this->pdo_connect->commit();
                $this->pdo_connect = null;

                return [true, $userId, $balance];
            } catch (Exception $err) {
                $this->pdo_connect->rollBack();

                return $err->getMessage();
                $this->pdo_connect = null;
            }
        }
    }