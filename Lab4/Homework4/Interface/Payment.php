<?php

    interface Payment{
        public function getItems();
        public function getPrice();
        public function getQty();
        public function getType();
        public function getNumTotal();
    
        
    }

?>