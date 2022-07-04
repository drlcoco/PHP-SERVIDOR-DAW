<?php
require_once("Player.php");
    class Center extends Player{
        protected $rebounds;

        public function __construct($number, $name, $height, $rebounds) {
            parent::__construct($number, $name, $height);
            $this->rebounds = $rebounds; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Rebounds":
                    $this->rebounds = $value;
                    break;
                default:
                    parent::__set($nam, $value);
            }
        }
        public function __get($nam){
            switch($nam){
                case "Rebounds":
                    return $this->rebounds;
                default:
                    return parent::__get($nam);
            }
        }
    }
?>