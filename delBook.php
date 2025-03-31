
<?php
    include('method.php');

    $id=$_GET['id'];
    $res= deleteBook($id);
    if($res==1)
    {
        echo"Book deleted";
    }
    else{
        echo" Book not deleted";
    }
?>


