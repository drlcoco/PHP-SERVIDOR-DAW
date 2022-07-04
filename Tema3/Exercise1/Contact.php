<?php
class Contact{
    private $id;
    private $name;
    private $phone;

    public function __construct($id, $name, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function __toString()
    {
        return $this->id." - ".$this->name." (".$this->phone.")";
    }
}
?>