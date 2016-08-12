<?php
    class DepositController extends Controller
    {
        public function depositView ()
        {
            $this->view("Deposit", [$_GET['userId']]);
        }

        public function depositMoney ()
        {
            $userId = $_POST['userId'];
            $amount = $_POST['amount'];
            $memo = $_POST['memo'];
            $user = $this->model("User");
            $verTime = $user->getVerTime($_POST['userId']);
            $userGetTime = $verTime;
            $conflict = $this->model("ConflictProcess");
            $result = $conflict->findDepositConflict($userId, $amount, $memo, $verTime, $userGetTime);
            if($result[0]) {
                $this->view("DepositChose", [$result[1], $result[2]]);
                exit;
            }
            $this->error($result[1]);
        }

        public function error ($error) {
            $message = '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4><strong>'.$error.'</strong></h4></div>';
            $this->view("Point", [$message]);
        }
    }