<?php
require_once ("Unit03B/Center.php");
require_once ("Unit03B/ShootingG.php");
require_once ("Unit03B/PowerForward.php");
require_once ("Unit03B/Forward.php");
require_once ("Unit03B/Guard.php");
    class Team{
        protected $name;
        protected $startingFive = array();

        public function __construct($name, $guard, $shootingG , $forward , $powerForward, $center) 
        {
            $this->name = $name;
            $this->guard = $guard;
            $this->shootingG = $shootingG;
            $this->forward = $forward;
            $this->powerForward = $powerForward;
            $this->center = $center;
            $this->startingFive = [$guard, $shootingG, $forward, $powerForward, $center];
        }

        public function __get($nam)
        {
            switch($nam)
            {
                case "Name":
                    return $this->name;
                case "Guard":
                    return $this->guard;
                case "ShootingG":
                    return $this->shootingG;
                case "Forward":
                    return $this->forward;
                case "PowerForward":
                    return $this->powerForward;
                case "Center":
                    return $this->center;
            }
        }

        public function averageHeight()
        {
            $average = 0;
            foreach($this->startingFive as $element)
            {
                $average += $element->Height;
            }
            $average = $average / count($this->startingFive); 
            return "The average height is ". $average."</br>";
        }
        
        public function maximumHeight()
        {
            $maximum = 10;
            foreach($this->startingFive as $element){
                $maximum < $element->Height ? $maximum = $element->Height : $maximum = $maximum;
            }
            return "The maximum height of the Team is: ".$maximum;
        }

        public function __toString()
        {
            $toString = "<table border='1'><tr><th>NAME PLAYER</th><th>CLASS PLAYER</th></tr>";
            foreach($this->startingFive as $element){
                $toString = $toString."<tr><td>".$element->Name."</td><td>".get_class($element)."</td></tr>";
            }
            $toString = $toString."</table>";
            return $toString; 
        }
    }
?>