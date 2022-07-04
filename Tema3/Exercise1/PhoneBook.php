<?php
    class PhoneBook{
        private $contacts = array();

        public function __construct($contacts)
        {
            $this->contacts = $contacts;
        }

        public function setContacts($contacts)
        {
            $this->contacts = $contacts;
        }

        public function getContacts()
        {
            return $this->contacts;
        }

        public function addContact($contact)
        {
            array_push($this->contacts, $contact);
        }

        public function searchId($id)
        {
            return $this->contacts->getId() != $id;
        }

        public function deleteContact($id)
        {
            for($i=0; $i<count($this->contacts); $i++){
                if($this->contacts[$i]->getId() == $id){
                    $delete = array_splice($this->contacts, $i, 1);
                    unset($delete);
                }
            }
        }

        public function __toString()
        {   
            echo "<table class='table table-striped table-dark'><thead><tr><th>ID</th><th>NAME</th><th>PHONE</th></tr></thead><tbody>";
            for($i=0; $i<count($this->contacts); $i++){
                echo "<tr><th>".$this->contacts[$i]->getId()."</th><td>".$this->contacts[$i]->getName()."</td><td>".$this->contacts[$i]->getPhone()."</td></tr>";
            } 
            echo "</tbody></table>";
        }
    }
?>