<?php
    class EntryController extends Controller
    {
        public function entryView ()
        {
            $this->view("Entry", [$_GET['userId']]);
        }

        public function entry ()
        {
            $entry = $this->model("Entry");
            $row = $entry->selectEntry($_POST['userId']);
            $this->view("EntryChose", [$_POST['userId'], $row]);
        }
    }