<?php
    class IndexController extends Controller
    {
        public function indexView ()
        {
            $this->view("index");
        }

        public function checkId ()
        {
            $user_id = $_POST["user_id"];

            $user = $this->model("User");
            $row = $user->checkId($user_id);

            if ($row) {
                $this->view("chose", [$row]);
            }
            else {
                $this->error("查無資料");
            }
        }

        public function error ($error) {
            $message = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            $this->view("point", [$message]);
        }
    }