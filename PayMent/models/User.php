<?php
    class User extends Connect
    {
        public function checkId ($ID)
        {
            $ARRAY = array($ID);
            $CMD = "SELECT * FROM `User` WHERE `User_ID`=?";
            $ROW = $this->connectGetdata($CMD, $ARRAY);
            $this->DBGO = null;
            if ($ROW!= null) {
                return $ROW;
            } else {
                return false;
            }
        }
        
        public function selectTotal ($ID)
        {
            $ARRAY = array($ID);
            $CMD = "SELECT `User_Total` FROM `User` WHERE `User_ID`=? FOR UPDATE";
            $ROW = $this->connectGetdata($CMD, $ARRAY);
            return $ROW[0]['User_Total'];
        }
        
        public function updateUser ($ID, $TOTAL)
        {
            $ARRAY = array($TOTAL, $ID);
            $CMD ="UPDATE `User` SET `User_Total`=? WHERE `User_ID`=?";
            $this->connectMysql($CMD, $ARRAY);
        }
        
    }