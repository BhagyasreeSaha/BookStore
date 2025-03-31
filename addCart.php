<?php
include('method.php');

    session_start();
    if(isset($_SESSION['email']))
    {
        $bid = $_GET['bid'];
        $email = $_SESSION['email'];
        $res = addToCart($bid, $email);
        if($res==1)
        {
            echo("Book added into cart");
        }
        else{
            echo("Book not added into cart");
        }
    }
    else{
        echo "You Need to Login First";
    }
?>
