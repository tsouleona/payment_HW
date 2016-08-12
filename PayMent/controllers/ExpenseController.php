<?php
    class ExpenseController extends Controller
    {
        public function expenseView ()
        {
            $this->view("Expense", [$_GET['userId']]);
        }

        public function expenseMoney ()
        {
            $amount = $_POST['amount'];
            $userId = $_POST['userId'];
            $memo = $_POST['memo'];
            $findConflict = $this->model("ConflictProcess");
            $result = $findConflict->findExpenseconflict($userId, $amount, $memo);

            if ($result[0]) {
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