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

    public function __set($name, $value)
    {
        switch($name)
        {
            case 'Id':
                $this->id = $value;
                break;
            case 'Name':
                $this->name = $value;
                break;
            case 'Phone':
                $this->phone = $value;
                break;
        }
    }

    public function __get($name)
    {
        switch($name)
        {
            case 'Id':
                return $this->id;
            case 'Name':
                return $this->name;
            case 'Phone':
                return $this->phone; 
        }
    }

    public function __toString()
    {
        return $this->id." - ".$this->name." (".$this->phone.")";
    }
}
?>