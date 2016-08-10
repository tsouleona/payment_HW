<?php
    require_once "../PayMent/models/mysql_connect.inc.php";

    class DepositController extends Controller
    {
        public function depositView ()
        {
            $user_id = $_GET['user_id'];
            $this->view("deposit", [$user_id]);
        }

        public function depositMoney ()
        {
            $amount = $_POST['amount'];
            try {
                $db = new Connect();
                $db->connectSql();
                $db->pdo_connect->beginTransaction();

                $user = $this->model("User");
                $entry = $this->model("Entry");
                $balance = $user->selectBalance($_POST['user_id']);

                if ($amount < 0) {
                    throw new Exception("您的入款金額不能小於0");
                }

                $balance = $balance + $amount;
                $user->updateUser($_POST['user_id'], $amount);
                $entry->insertEntry($_POST, $amount, $action, $balance);

                $db->pdo_connect->commit();
                $db->pdo_connect = null;
                $this->view("deposit_chose", [$_POST['user_id'], $balance]);
            }
            catch(Exception $err)
            {
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
            $this->view("point", [$message]);
        }
    }