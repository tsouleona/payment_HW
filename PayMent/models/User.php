<?php
    class User extends Connect
    {
        public function checkId($ID){
            $ARRAY = array($ID);
            $CMD = "SELECT * FROM `User` WHERE `User_ID`=?";
            $ROW = $this->connectGetdata($CMD, $ARRAY);
            if ($ROW!= null) {
                return $ROW;
            } else {
                return false;
            }
        }
    }