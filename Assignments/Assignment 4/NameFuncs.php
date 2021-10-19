<?php
    Class NameFuncs{
        public $Name;
        public function __construct($names) {
            if(!empty($names))
                $this->Name = explode("\n", $names);
            else
                $this->Name = array();
        }
        public function setName($name){
            $FullName = explode(" ",$name);
            if (count($FullName) > 2){
                $lastName = array_pop($FullName);
                array_push($this->Name, $lastName.", ".implode(" ",$FullName));
            } else
                array_push($this->Name, $FullName[1].", ".$FullName[0]);
            sort($this->Name);
            return $this->Name;
        }
    }
?>