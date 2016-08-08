<?php

class App {
    
    public function __construct() {
        $URL = $this->parseUrl();
        
        $CONTROLLERName = "{$URL[0]}Leona";
        if (!file_exists("controllers/$CONTROLLERName.php"))
            $CONTROLLERName="IndexLeona";
        require_once "controllers/$CONTROLLERName.php";
        
        $CONTROLLER = new $CONTROLLERName;
        $METHODName = isset($URL[1]) ? $URL[1] : "check";
        
        if (!method_exists($CONTROLLER, $METHODName))
            $METHODName= "check";
            
        unset($URL[0]); unset($URL[1]);
        $PARAMS = $URL ? array_values($URL) : Array();
        call_user_func_array(Array($CONTROLLER, $METHODName), $PARAMS);
    }
    
    public function parseUrl() {
        if (isset($_GET["url"])) {
            $URL = rtrim($_GET["url"], "/"); //移除字串右側的空白字符或其他預定義字符。
            $URL = explode("/", $URL);
            return $URL;
        }
    }
    
}

?>