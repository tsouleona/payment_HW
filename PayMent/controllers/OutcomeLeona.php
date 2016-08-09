<?php
date_default_timezone_set("Asia/Taipei");

    class OutcomeLeona extends Controller
    {
        public function outcomeView (){
            $ID = $_GET['ID'];
            $this->view("outcome", Array($ID));
        }
        public function outcomeMoney (){
            $DATE = date("Y-m-d H:i:s");
            $MONEY = $_POST['outmoney'];
            
            try {
                    require_once "../PayMent/models/mysql_connect.inc.php";
                    $DB = new Connect();
                    $DB->connectSql();
                    $DB->DBGO->beginTransaction();
                    $USER = $this->model("User");
                    $LIST = $this->model("Listall");
                    $TOTAL = $USER->selectTotal($_POST['ID']);
                    sleep(10);
                    if ($MONEY > $TOTAL){
                        throw new Exception("您的出款金額大於餘額");
                        exit;
                    }
                    $ITEM = '出款';
                    $TOTAL = $TOTAL - $MONEY;
                    $LIST->insertList($_POST, $DATE, $ITEM);
                    $USER->updateUser($_POST['ID'], $TOTAL);
                    $DB->DBGO->commit();
                    $DB->DBGO = null;
                    $this->view("outcome_chose", Array($_POST['ID'], $TOTAL));
            }
            catch(Exception $err){
                $db->DBGO->rollBack();
                $this->error($err->getMessage());
                $db->DBGO = null;  
            }
            
        }
//**錯誤訊息**//
        public function error ($ERROR) {
            $A = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$ERROR.'</strong></h4></div>';
            
            $this->point($A);
        }
//**成功訊息**//
        public function success ($SUCCESS) {
            $A = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$SUCCESS.'</strong></h4></div>';
            
            $this->point($A);
        }
//**顯示訊息**//
        public function point ($A)
        {
            $this->view("point", Array($A));
        }
    }