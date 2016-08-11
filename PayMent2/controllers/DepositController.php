<?php
require_once "../PayMent2/models/MysqlConnect.php";

    class DepositController extends Controller
    {
        public function depositView ()
        {
            $this->view("Deposit", [$_GET['userId']]);
        }

        public function depositMoney ()
        {
            $user = $this->model("User");
            $entry = $this->model("Entry");
            $amount = $_POST['amount'];
            $verTime = $user->getVerTime($_POST['userId']);
            $userGetTime = $verTime;
            try {
                $db = new Connect();
                $db->pdo_connect->beginTransaction();


                $balance = $user->getBalance($_POST['userId']);

                if ($amount < 0) {
                    throw new Exception("您的入款金額不能小於0");
                }

                $balance = $balance + $amount;
                $op = $user->updateUser($_POST['userId'], $amount, $userGetTime, $verTime);

                if ($op) {
                    throw new Exception("抱歉，您的交易失敗，請重新執行(按確認鍵)");
                }

                $entry->insertEntry($_POST, $amount, $action, $balance);

                $db->pdo_connect->commit();
                $db->pdo_connect = null;
                $this->view("DepositChose", [$_POST['userId'], $balance]);
            } catch (Exception $err) {
                $db->pdo_connect->rollBack();
                $this->error($err->getMessage());
                $db->pdo_connect = null;
            }
        }

        public function error ($error) {
            $message = '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4><strong>'.$error.'</strong></h4></div>';
            $this->view("Point", [$message]);
        }
    }