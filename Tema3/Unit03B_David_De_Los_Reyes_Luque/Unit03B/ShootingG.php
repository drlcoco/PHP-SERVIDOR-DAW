<?php
require_once("Player.php");
    class  ShootingG  extends Player{
        protected $steals;

        public function __construct($number, $name, $height, $steals) {
            parent::__construct($number, $name, $height);
            $this->steals = $steals; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Steals":
                    $this->steals = $value;
                    break;
                default:
                    parent::__set($nam, $value);
            }
        }
        public function __get($nam){
            switch($nam){
                case "Steals":
                    return $this->steals;
                default:
                    return parent::__get($nam);
            }
        }
    }
?>