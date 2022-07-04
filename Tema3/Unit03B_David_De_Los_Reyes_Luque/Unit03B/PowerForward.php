<?php
require_once("Player.php");
    class PowerForward extends Player{
        protected $blocks;

        public function __construct($number, $name, $height, $blocks) {
            parent::__construct($number, $name, $height);
            $this->blocks = $blocks; 
        }
        public function __set($nam, $value){
            switch($nam){
                case "Blocks":
                    $this->blocks = $value;
                    break;
                default:
                    parent::__set($nam, $value);
            }
        }
        public function __get($nam){
            switch($nam){
                case "Blocks":
                    return $this->blocks;
                default:
                    return parent::__get($nam);
            }
        }
    }
?>