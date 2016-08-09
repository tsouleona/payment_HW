<?php
    date_default_timezone_set("Asia/Taipei");
    require_once "../PayMent/models/mysql_connect.inc.php";
    class DespostLeona extends Controller
    {
        public function despostView (){
            $user_id = $_GET['user_id'];
            $this->view("deposit", Array($id));
        }

        public function despostMoney ()
        {
            $date = date("Y-m-d H:i:s");
            $amount = $_POST['amount'];

            try {
                    $db = new Connect();
                    $db->connectSql();
                    $db->dbgo->beginTransaction();
                    $user = $this->model("User");
                    $list = $this->model("Entry");
                    $balance = $user->selectBalance($_POST['user_id']);
                    sleep(5);
                    if ($MONEY < 0){
                        throw new Exception("您的入款金額不能小於0");
                        exit;
                    }
                    $action = '入款';
                    $balance = $balance + $amount;
                    $list->insertEntry($_POST, $date, $action, $balance);
                    $user->updateUser($_POST['user_id'], $balance);
                    $db->dbgo->commit();
                    $db->dbgo = null;
                    $this->view("deposit_chose", Array($_POST['user_id'], $balance));
            }
            catch(Exception $err){
                $db->dbgo->rollBack();
                $this->error($err->getMessage());
                $db->dbgo = null;
            }
        }
//錯誤訊息
        public function error ($error) {
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';

            $this->view("point", Array($a));
        }
    }