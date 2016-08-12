<?php
    class ExpenseController extends Controller
    {
        public function expenseView ()
        {
            $this->view("Expense", [$_GET['userId']]);
        }

        public function expenseMoney ()
        {
            $userId = $_POST['userId'];
            $amount = $_POST['amount'];
            $memo = $_POST['memo'];
            $user = $this->model("User");
            $verTime = $user->getVerTime($_POST['userId']);
            $userGetTime = $verTime;
            $conflict = $this->model("ConflictProcess");
            $result = $conflict->findExpenseconflict($userId, $amount, $memo, $verTime, $userGetTime);

            if($result[0]) {
                $this->view("ExpenseChose", [$result[1], $result[2]]);
                exit;
            }

            $this->error($result[1]);
        }

        public function error ($error)
        {
            $message = '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4><strong>'.$error.'</strong></h4></div>';
            $this->view("Point", [$message]);
        }
    }