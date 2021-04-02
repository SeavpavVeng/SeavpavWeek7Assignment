<?php 
    $array =[2, 3, 4, 6, 7, 9, 11, 20];
    function Even($array) 
    {  
        if($array % 2 == 0) 
            return TRUE; 
        else 
            return FALSE;  
    } 
    print_r(array_filter($array, "Even" )); 
    
    
  
?>