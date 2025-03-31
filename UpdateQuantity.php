<?php
    include('method.php');
    $cartid = $_GET['cartid'];
    $op = $_GET['op'];

    $res = updateQuantity($cartid, $op);

    if($res == 1)
    {
        echo "Produc Updated";
    }
    else{
        echo "Product Not Updated";
    }
?>