<?php
    class PhoneBook{
        private $contacts = array();

        public function __construct($contacts)
        {
            $this->contacts = $contacts;
        }

        public function __set($name, $value)
        {
            switch($name)
            {
                case 'Contacts':
                    $this->contacts = $value;
                    break;
            }
        }

        public function __get($name)
        {
            switch($name)
            {
                case 'Contacts':
                    return $this->contacts;
            }
        }

        public function addContact($contact)
        {
            array_push($this->contacts, $contact);
        }

        public function deleteContact($id)
        {
            for($i=0; $i<count($this->contacts); $i++){
                if($this->contacts[$i]->Id == $id){
                    $delete = array_splice($this->contacts, $i, 1);
                    unset($delete);
                }
            }
        }

        public function showList()
        {   
            echo "<ol>";
            for($i=0; $i<count($this->contacts); $i++){
                echo "<li>".$this->contacts[$i]->Name." <a href='contact_info.php?id=".$this->contacts[$i]->Id."&name=".$this->contacts[$i]->Name."&phone=".$this->contacts[$i]->Phone."'>__View Contact</a></li>";
            } 
            echo "</ol>";
        }
    }
?>