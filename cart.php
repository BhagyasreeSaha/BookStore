<?php
    include('method.php');
    $email="";
    if(isset($_SESSION['email']))
    {
        $email=$_SESSION['email'];
    }
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
</div>
<center><table border="3" width="80%" align="center">
<thead>
        <tr align="center">
            <th>Book Name</th>
            <th>Book Price</th>
            <th>Book Image</th>
            <th>Total</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <?php
                
                        $res=getAllCart($email);
                        $records=mysqli_num_rows($res);
                        $total_amount = 0;
                        if($records > 0)
                            {
                                    
                                    while($row= mysqli_fetch_assoc($res))
                                    {
                                        $bid = $row["bid"];
                                        $cartid = $row["cartid"];
                                        $res1 = getBookData($bid);
                                        $bdetails = mysqli_fetch_assoc($res1);
                                        $total = $bdetails["bprice"] * $row['quantity'];
                                        $total_amount = $total_amount + $total;
                                        echo '
                                        <tr align="center">
                                        <td>'.$bdetails["bname"].'</td>
                                        <td>'.$bdetails["bprice"].'</td>
                                        <td><img src =" '.$bdetails["bimage"].' " style="width: 100px;"/></td>
                                        <td><button onclick="addQuantity('.$cartid.', 1)">+</button> <span>'. $row['quantity'].'</span>  <button onclick="addQuantity('.$cartid.', 2)">-</button></td>
                                        <td>'.$total.'</td>
                                        </tr>
                                         
                                        ';  
                                        
                                    }
                                    echo '<tr><td><hr></td></tr>';
                                    echo '<tr><td colspan="4">total payble Amount</td><td>'.$total_amount.'</td></tr>';
                                   echo '<tr>
                                            <td><button onclick="payNow('.$total_amount.')">paynow</button></td>
                                            
                                        </tr>';
                            }
                            
                        else
                            {
                                echo "there is no data";
                            }
                            
            ?>
        </tbody>
</table></center>



<?php
if(isset($_POST['search']))
{
        $name = $_POST['search'];
        $res=displayCartByEmail($email);
        $records=mysqli_num_rows($res);
}
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function addCart(bid)
    {  
       // alert(id)
        if( confirm("Are you sure to add this book in the cart?"))
        {
            $.ajax({
                    url:"cart.php",
                    method:"get",
                    data:{"id":bid},
                    success: function(response)
                        {
                            alert(response);
                            window.location.href = "";
                        }
                })
        }
    }

    function payNow(amount)
    {
        //alert("Total Amount: "+amount);
        var options = {
            "key": "rzp_test_ND81BEh4gRO77Q", // Enter the Key ID generated from the Dashboard
            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "INK & PAPER", //your business name
            "description": "An online bookstore is a digital platform that offers a curated selection of books for purchase, catering to niche markets and providing a unique shopping experience based on selectivity and customer reviews.",
            "image": "images\logo.jpeg",
            "handler": function (response){
                alert("Thank you for payment, your transaction id: "+response.razorpay_payment_id);
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    }

    function addQuantity(cartid, op)
    {
        $.ajax({
                url:"UpdateQuantity.php",
                method:"get",
                data:{"cartid":cartid, "op": op},
                success: function(response)
                    {
                        alert(response);
                        window.location.href = "";
                    }
            })
    }
</script>
</body>
</html>