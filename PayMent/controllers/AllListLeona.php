<?php
    class AllListLeona extends Controller
    {
        public function allListView()
        {
            
             $this->view("alllist",Array($_GET['ID']));
        }
        public function allList ()
        {
            $USER = $this->model("User");
            $TOTAL = $USER->selectTotal($_POST['ID']);
            $LIST = $this->model("Listall");
            $ROW = $LIST->selectList($_POST['ID']);
            $this->view("alllist_ajax",Array($_POST['ID'], $ROW, $TOTAL));
        }
    }