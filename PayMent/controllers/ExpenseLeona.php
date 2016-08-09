<?php
    date_default_timezone_set("Asia/Taipei");
    require_once "../PayMent/models/mysql_connect.inc.php";
    class OutcomeLeona extends Controller
    {
        public function expenseView (){
            $user_id = $_GET['user_id'];
            $this->view("expense", Array($user_id));
        }

        public function expenseMoney (){
            $date = date("Y-m-d H:i:s");
            $amount = $_POST['amount'];

            try {

                    $db = new Connect();
                    $db->connectSql();
                    $db->dbgo->beginTransaction();

                    $user = $this->model("User");
                    $entry = $this->model("Entry");
                    $balance = $user->selectBalance($_POST['$user_id']);

                    if ($amount > $total){
                        throw new Exception("您的出款金額大於餘額");
                        exit;
                    }

                    $action = '出款';
                    $balance = $balance - $amount;
                    $user->updateUser($_POST['$user_id'], $balance);
                    $entry->insertEntry($_POST, $date, $action,$balance);

                    $db->dbgo->commit();
                    $db->dbgo = null;
                    $this->view("expense_chose", Array($_POST['$user_id'], $balance));
            }
            catch(Exception $err){
                $db->dbgo->rollBack();
                $this->error($err->getMessage());
                $db->dbgo = null;
            }

        }
//**錯誤訊息**//
        public function error ($error) {
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';

            $this->point($a);
        }
//**成功訊息**//
        public function success ($success) {
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';

            $this->point($a);
        }
//**顯示訊息**//
        public function point ($a)
        {
            $this->view("point", Array($a));
        }
    }