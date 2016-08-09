<?php
    class Listall extends Connect
    {
        public function insertList ($list, $date, $item)
        {
            $array = array($list['ID'], $item, $list['outdata'], $list['outmoney'], $date);
            $cmd = "INSERT INTO `List`(`User_ID`, `Item`, `data`, `Money`, `date`)
            VALUES(?, ?, ?, ?, ?)";
            $this->connectMysql($cmd,$array);
        }
        public function selectList($id)
        {
            $array = array($id);
            $cmd = "SELECT * FROM `List` WHERE `User_ID`=?";
            $row = $this->connectGetdata($cmd, $array);
            $this->dbgo = null;
            return $row;
        }
        
    }