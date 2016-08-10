<?php

    class App {

        public function __construct() {
            $url = $this->parseUrl();

            $controllerName = "{$url[0]}Controller";
            if (!file_exists("controllers/$controllerName.php"))
                $controllerName="IndexLeona";
            require_once "controllers/$controllerName.php";

            $controller = new $controllerName;
            $methodName = isset($url[1]) ? $url[1] : "indexView";

            if (!method_exists($controller, $methodName))
                $methodName= "indexView";

            unset($url[0]); unset($url[1]);
            $params = $url ? array_values($url) : Array();
            call_user_func_array(Array($controller, $methodName), $params);
        }

        public function parseUrl() {
            if (isset($_GET["url"])) {
                $url = rtrim($_GET["url"], "/"); //移除字串右側的空白字符或其他預定義字符。
                $url = explode("/", $url);
                return $url;
            }
        }
    }

?>