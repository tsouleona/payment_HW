<?php
    class EntryController extends Controller
    {
        public function entryView ()
        {
            $this->view("entry", [$_GET['user_id']]);
        }

        public function entry ()
        {
            $entry = $this->model("Entry");
            $row = $entry->selectEntry($_POST['user_id']);
            $this->view("entry_ajax", [$_POST['user_id'], $row]);
        }
    }