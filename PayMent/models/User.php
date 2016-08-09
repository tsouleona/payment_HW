<?php
    class User extends Connect
    {
        public function checkId ($id)
        {
            $array = array($id);
            $cmd = "SELECT * FROM `User` WHERE `User_ID`=?";
            $row = $this->connectGetdata($cmd, $array);
            $this->dbgo = null;
            if ($row!= null) {
                return $row;
            } else {
                return false;
            }
        }
        
        public function selectTotal ($id)
        {
            $array = array($id);
            $cmd = "SELECT `User_Total` FROM `User` WHERE `User_ID`=? FOR UPDATE";
            $row = $this->connectGetdata($cmd, $array);
            return $row[0]['User_Total'];
        }
        
        public function updateUser ($id, $total)
        {
            $array = array($total, $id);
            $cmd ="UPDATE `User` SET `User_Total`=? WHERE `User_ID`=?";
            $this->connectMysql($cmd, $array);
        }
        
    }