<?php
    class EntryLeona extends Controller
    {
        public function entryView()
        {
            $this->view("entry",Array($_GET['user_id']));
        }

        public function entry ()
        {
            $user = $this->model("User");
            $list = $this->model("Entry");
            $row = $list->selectList($_POST['user_id']);
            $this->view("entry_ajax",Array($_POST['user_id'], $row));
        }
    }