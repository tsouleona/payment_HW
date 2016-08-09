<?php
    class IndexLeona extends Controller
    {
        public function check () 
        {
            $this->view("index");
        }
        
        public function options ()
        {
            $id = $_POST["ID"];
            
            $user = $this->model("User");
            $row = $user->checkId($id);
            
            if ($ROW != null) {
                
                $this->view("chose",Array($row));
            }
            else {
                $this->error("查無資料");
            }
        }
//**錯誤訊息**//
        public function error ($error) {
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            
            $this->point($a);
        }
//**成功訊息**//
        public function success ($success) {
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            
            $this->point($a);
        }
//**顯示訊息**//
        public function point ($a)
        {
            $this->view("point", Array($a));
        }
    }