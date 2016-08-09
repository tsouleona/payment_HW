<?php
date_default_timezone_set("Asia/Taipei");

    class OutcomeLeona extends Controller
    {
        public function outcomeView (){
            $id = $_GET['ID'];
            $this->view("outcome", Array($id));
        }
        public function outcomeMoney (){
            $date = date("Y-m-d H:i:s");
            $money = $_POST['outmoney'];
            
            try {
                    require_once "../PayMent/models/mysql_connect.inc.php";
                    $db = new Connect();
                    $db->connectSql();
                    $db->dbgo->beginTransaction();
                    $user = $this->model("User");
                    $list = $this->model("Listall");
                    $total = $user->selectTotal($_POST['ID']);
                    sleep(10);
                    if ($money > $total){
                        throw new Exception("您的出款金額大於餘額");
                        exit;
                    }
                    $item = '出款';
                    $total = $total - $money;
                    $LIST->insertList($_POST, $date, $item);
                    $user->updateUser($_POST['ID'], $total);
                    $db->dbgo->commit();
                    $db->dbgo = null;
                    $this->view("outcome_chose", Array($_POST['ID'], $total));
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