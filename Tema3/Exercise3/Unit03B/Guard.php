<?php
require_once("Player.php");
    class Guard extends Player{
        protected $assists;

        public function __construct($number, $name, $height, $assists) {
            parent::__construct($number, $name, $height);
            $this->assists = $assists; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Assists":
                    $this->assists = $value;
                    break;
                default:
                parent::__set($nam, $value);
            }
        }
        public function __get($nam){
            switch($nam){
                case "Assists":
                    return $this->assists;
                default:
                return parent::__get($nam);
            }
        }
    }
?>