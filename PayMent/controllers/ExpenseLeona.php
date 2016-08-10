<?php
    require_once "../PayMent/models/mysql_connect.inc.php";
    class ExpenseLeona extends Controller
    {
        public function expenseView ()
        {
            $user_id = $_GET['user_id'];
            $this->view("expense", Array($user_id));
        }

        public function expenseMoney ()
        {
            $amount = $_POST['amount'];
            try {
                    $db = new Connect();
                    $db->connectSql();
                    $db->pdo_connect->beginTransaction();

                    $user = $this->model("User");
                    $entry = $this->model("Entry");
                    $balance = $user->selectBalance($_POST['user_id']);

                    if ($amount > $balance) {
                        throw new Exception("您的出款金額大於餘額");
                    }

                    $action = '出款';
                    $balance = $balance - $amount;
                    $user->updateUser($_POST['user_id'], $balance);
                    $entry->insertEntry($_POST, $action, $balance);

                    $db->pdo_connect->commit();
                    $db->pdo_connect = null;
                    $this->view("expense_chose", Array($_POST['user_id'], $balance));
            }
            catch(Exception $err){
                $db->pdo_connect->rollBack();
                $this->error($err->getMessage());
                $db->pdo_connect = null;
            }
        }
//錯誤訊息
        public function error ($error)
        {
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';

            $this->view("point", Array($a));
        }
    }