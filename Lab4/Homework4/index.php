<?php
    require_once(__DIR__ .'/Method/ABAMethod.php');
    require_once(__DIR__ . '/Method/PiPayMethod.php');
    require_once(__DIR__ . '/Method/WingMethod.php');
    echo '<h1> Payment Method Online</h1>';

    $methods = [
        new ABAMethod(1,5,1),
        new WingMethod(2,3,2),
        new ABAMethod(3,4,1),
        new ABAMethod(4,5,1),
        new PiPayMethod(5,6,1),
        new ABAMethod(6,10,1),
        new WingMethod(7,15,1),
        new WingMethod(8,2,1)
    ];
    
    // Find Total Number of sales by ABA method
    
    $type1 = 'ABA';
    $TotalNumberABA = 0;
    foreach ($methods as $method) {
        if($type1 === $method->getType()){
            $TotalNumberABA += $method->getQty();
        }
    }

    echo '<p>1. Total Number of sales by ABA Method:<b> '. $TotalNumberABA .'</b></p>';

    // Find Total Number of sales by PiPay and Wing method
    
    $type2 = 'PiPay';
    $type3 = 'Wing';
    $TotalNumberPiPayAndWing = 0;
    foreach ($methods as $method) {
        if($type2 === $method->getType() || $type3 === $method->getType()){
            $TotalNumberPiPayAndWing += $method->getQty();
        }
    }

    echo '<p>2. Total Number of sales by PiPay and Wing Method:<b> '. $TotalNumberPiPayAndWing .'</b></p>';
 
    // Display all sales ordering by biggest total amount
     
    echo '<p>3. Display all sales ordering by biggest total amount</p>';

    function renderDisplayPayment($methods)
    {
            $str = '<table border="1"><tr><th>Item</th><th>Price</th><th>Quantity</th><th>Method</th><th>Total</th></tr>';
            foreach ($methods as $method) {
                $str .= '<tr><td>' . $method->getItems() . '</td><td>' . $method->getPrice() . '</td><td>' . $method->getQty()
                . '</td><td>' . $method->getType(). '</td><td>' . $method->getNumTotal() . '</td></tr>';
            }
        $str .= '</table>';
        return $str;
    }

    usort($methods, fn ($s1, $s2) => $s2->getNumTotal() <=> $s1->getNumTotal() );
    echo renderDisplayPayment($methods);

?>