<?php
    class EntryLeona extends Controller
    {
        public function entryView()
        {
            $this->view("entry",Array($_GET['user_id']));
        }

        public function entry ()
        {
            $entry = $this->model("Entry");
            $row = $entry->selectEntry($_POST['user_id']);
            $this->view("entry_ajax",Array($_POST['user_id'], $row));
        }
    }