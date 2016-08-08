<?php

class Connect{
        protected $RESULT;
        public $DBGO;
        function connectSql(){
               //資料庫設定
                //資料庫位置
                $DB_SERVER = "localhost";
                //資料庫名稱
                $DB_NAME = "PayMent";
                //資料庫管理者帳號
                $DB_USER = "tsouleona";
                //資料庫管理者密碼
                $DB_PASSWD = "830606";
                //對資料庫連線
                $DB_CONNECT = "mysql:host=".$DB_SERVER.";dbname=".$DB_NAME;
                $this->DBGO = new PDO($DB_CONNECT, $DB_USER, $DB_PASSWD);
                $this->DBGO->exec("SET NAMES utf8");
                
                //法二
                // $this->Link = mysql_connect($db_server, $db_user, $db_passwd) or die("無法對資料庫連線");
                // //資料庫連線採UTF8
                // $this->result = mysql_query("SET NAMES utf8",$this->Link);
                // mysql_selectdb($db_name, $this->Link);
                //$this->result = mysql_query($com);
                
                
        }
        function connectMysql($COM,$ARRAY){
                $this->connectSql();
                $this->RESULT = $this->DBGO->prepare($COM);
                $this->RESULT->execute($ARRAY);
        }
        function connectGetdata($COM,$ARRAY){
                $this->connectSql();
                $this->connectMysql($COM,$ARRAY);
                $ROW = $this->RESULT->fetchAll(PDO::FETCH_ASSOC);
                
                //法二
                //$g = 0 ;
                // while($tmp = mysql_fetch_assoc($this->result))
                // {
                //     $i = $g;
                    
                //     $row[$i] = $tmp;
                    
                //     $g = $g + 1;
                // }
                
                return $ROW;
                
            }
        
}