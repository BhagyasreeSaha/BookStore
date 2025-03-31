<?php
    include('method.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>

<div class="container bg-white">
<?php
        include('header.php');
    ?>
    
    <div class="row">
    <?php
 $res=manageBook();
 $records=mysqli_num_rows($res);
 if($records > 0)
 {
    while($row= mysqli_fetch_assoc($res))
    {
        $bid = $row["bid"];
        echo '
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
        <div class="product"> <img src="'.$row["bimage"].'" alt="">
            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                <li class="icon mx-3"><span class="far fa-heart"></span></li>
                <li class="icon"><span class="fas fa-shopping-bag" onclick="addtocart('.$row["bid"].')"></span></li>
            </ul>
        </div>
        <div class="tag bg-red">'.$row["btype"].'</div>
        <div class="title pt-4 pb-1">'.$row["bname"].'</div>
        <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
        <div class="price">'.$row["bprice"].'</div>
    </div> 
    ';
    }
}
else
{
    echo "there is no data";
}
?>
    </div>
   
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    function addtocart(bid)
    {
        $.ajax({
            url:"addCart.php",
            method:"get",
            data:{"bid":bid},
            success: function(response)
                {
                   if(response == "You Need to Login First")
                   {
                        window.location.href = "login.php";
                   }
                   else{
                        alert(response);
                        window.location.href = "";
                   }
                    
                }
        })

    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>