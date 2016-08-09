<?php
    class Listall extends Connect
    {
        public function insertList ($LIST, $DATE, $ITEM)
        {
            $ARRAY = array($LIST['ID'], $ITEM, $LIST['outdata'], $LIST['outmoney'], $DATE);
            $CMD = "INSERT INTO `List`(`User_ID`, `Item`, `data`, `Money`, `date`)
            VALUES(?, ?, ?, ?, ?)";
            $this->connectMysql($CMD,$ARRAY);
        }
        public function selectList($ID)
        {
            $ARRAY = array($ID);
            $CMD = "SELECT * FROM `List` WHERE `User_ID`=?";
            $ROW = $this->connectGetdata($CMD, $ARRAY);
            return $ROW;
        }
        
    }