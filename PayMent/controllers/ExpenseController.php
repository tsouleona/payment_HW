<?php
require_once "../PayMent/models/MysqlConnect.php";

    class ExpenseController extends Controller
    {
        public function expenseView ()
        {
            $this->view("Expense", [$_GET['userId']]);
        }

        public function expenseMoney ()
        {
            $amount = $_POST['amount'];

            try {
                $db = new Connect();
                $db->pdo_connect->beginTransaction();

                $user = $this->model("User");
                $entry = $this->model("Entry");
                $balance = $user->getBalance($_POST['userId']);

                if ($amount > $balance) {
                    throw new Exception("您的出款金額大於餘額");
                }

                if ($amount < 0) {
                    throw new Exception("您的出款金額不能小於0");
                }
                $amount = -$amount;
                $balance = $balance + $amount;
                $user->updateUser($_POST['userId'], $amount);
                $entry->insertEntry($_POST, $amount, $action, $balance);

                $db->pdo_connect->commit();
                $db->pdo_connect = null;
                $this->view("ExpenseChose", [$_POST['userId'], $balance]);
            } catch (Exception $err) {
                $db->pdo_connect->rollBack();
                $this->error($err->getMessage());
                $db->pdo_connect = null;
            }
        }

        public function error ($error)
        {
            $message = '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4><strong>'.$error.'</strong></h4></div>';
            $this->view("Point", [$message]);
        }
    }