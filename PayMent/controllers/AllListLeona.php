<?php
    class AllListLeona extends Controller
    {
        public function allListView()
        {
            
             $this->view("alllist",Array($_GET['ID']));
        }
        public function allList ()
        {
            $user = $this->model("User");
            $total = $user->selectTotal($_POST['ID']);
            $list = $this->model("Listall");
            $row = $list->selectList($_POST['ID']);
            $this->view("alllist_ajax",Array($_POST['ID'], $row, $total));
        }
    }