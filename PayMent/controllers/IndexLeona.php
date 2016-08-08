<?php
    class IndexLeona extends Controller
    {
        public function check () 
        {
            $this->view("index");
        }
        
        public function options ()
        {
            $ID = $_POST["ID"];
            
            $USER = $this->model("User");
            $ROW = $USER->checkId($ID);
            
            if ($ROW != null) {
                
                $this->view("chose",Array($ROW));
            }
            else {
                $this->error("查無資料");
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