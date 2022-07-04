<?php
require_once("Player.php");
    class Forward extends Player{
        protected $points;

        public function __construct($number, $name, $height, $points) {
            parent::__construct($number, $name, $height);
            $this->points = $points; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Points":
                    $this->points = $value;
                    break;
                default:
                    parent::__set($nam, $value);
            }
        }
        public function __get($nam){
            switch($nam){
                case "Points":
                    return $this->points;
                default:
                    return parent::__get($nam);
            }
        }
    }
?>