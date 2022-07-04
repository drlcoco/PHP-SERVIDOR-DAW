<?php
require_once "Team.php";
    abstract class Player{
        protected $number;
        protected $name;
        protected $height;

        public function __construct($number, $name, $height) {
            $this->number = $number;
            $this->name = $name;
            $this->height = $height; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Number":
                    $this->number = $value;
                    break;
                case "Name":
                    $this->name = $value;
                    break;
                case "Height":
                    $this->height = $value;
                    break;
            }
        }
        public function __get($nam){
            switch($nam){
                case "Number":
                    return $this->number;
                case "Name":
                    return $this->name;
                case "Height":
                    return $this->height;
            }
        }
    }
?>