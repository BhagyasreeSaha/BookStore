<?php
function loginAdmin($data)
{
    $email=$data['email'];
    $password=$data['password'];

    $conn=mysqli_connect("localhost", "root" , "" ,"bookdb");
    $sql="SELECT * FROM admin WHERE a_email='$email' and a_password='$password'";
    $res=mysqli_query($conn, $sql);
    return $res;
}
function loginUser($data)
{
    $email=$data['email'];
    $password=$data['password'];

    // $email='bs@gmail.com';
    // $password='8520';

    $conn=mysqli_connect("localhost", "root" , "" ,"bookdb");
    $sql="SELECT * FROM register WHERE r_email='$email' and r_password='$password'";
    $res=mysqli_query($conn, $sql);
    return $res;
}


function registerUser($data)
{
    $name=$data['rname'];
    $username=$data['r_uname'];
    $email=$data['r_email'];
    $phno=$data['r_phno'];
    $password=$data['r_password'];
    $gender=$data['gender'];

    $conn=mysqli_connect("localhost", "root" , "" ,"bookdb");
    $sql="INSERT INTO register (rname,r_uname,r_email,r_phno,r_password,r_gender) 
    values ('$name','$username','$email','$phno',' $password','$gender')" ;
    $res= mysqli_query($conn,$sql);
    return $res;
}

function addBook($data)
    {
        $name=$_POST['bname'];
        $price=$_POST['bprice'];
        $description=$_POST['bd'];
        $booktype=$_POST['btype'];
        $target_dir= "images/";
        $target_file = $target_dir . basename($_FILES["bimg"]["name"]);

        if(move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_file))
        {
            $conn = mysqli_connect('localhost', 'root', '', 'bookdb');
            $sql= "insert into addBook (bname, bprice, bimage, bd, btype) values ('$name', '$price', '$target_file','$description', '$booktype' )" ;
            $res= mysqli_query($conn,$sql);
            return $res;
        }
        else{
            return 0;
        }
    }

    function manageBook()
    {
        $conn=mysqli_connect("localhost", "root", "", "bookdb");
        $sql="SELECT * FROM addbook";
        $res=mysqli_query($conn,$sql);
        return $res;
    }

    function manageBookByName($name)
    {
        $name = '%'.$name.'%';
        $conn=mysqli_connect("localhost", "root", "", "bookdb");
        $sql="SELECT * FROM addbook where bname like '$name'";
        $res=mysqli_query($conn,$sql);
        return $res;
    }

    function getBookData($id)
    {
            $conn=mysqli_connect("localhost","root","","bookdb");
            $sql="SELECT * FROM  addbook where bid = '$id'";
            $res=mysqli_query($conn ,$sql);
            return $res;
    }   
    
    function updateQuantity($cartid, $op)
    {
        $conn=mysqli_connect("localhost", "root", "", "bookdb");

        $res1 = getCartDataById($cartid);
        $cart_details = mysqli_fetch_assoc($res1);

        if($op == 1)
            $qty = $cart_details["quantity"] + 1;
        else
            $qty = $cart_details["quantity"] - 1;

        $sql= "UPDATE cart  set  quantity='$qty' where cartid='$cartid'";
        $res=mysqli_query($conn,$sql);
        return $res;
    }

    function updateBook($data)
    {
        $id=$data['bid'];
        $name=$data['bname'];
        $price=$data['bprice'];
        $description=$data['bd'];
        $booktype=$data['btype'];
        $target_dir= "images/";
        $target_file = $target_dir . basename($_FILES["bimg"]["name"]);

        if(isset($_FILES['bimg']) && $_FILES['bimg']['error'] == 0 )
        {
            //echo "File is selected and uploaded successfully.";

            if(move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_file))
            {
                $conn=mysqli_connect("localhost", "root", "", "bookdb");
                $sql="UPDATE addBook  set  bname='$name', bprice='$price', bd='$description', btype='$booktype', bimage='$target_file' where bid='$id'";
                $res=mysqli_query($conn,$sql);
            
            return  $res;
            }
            else{
                    return 0;
                }
        }
        else{
                $conn=mysqli_connect("localhost", "root", "", "bookdb");
                $sql= "UPDATE addBook  set  bname='$name', bprice='$price', bd='$description', btype='$booktype', bimg='$target_file' where bid='$id'";
                $res=mysqli_query($conn,$sql);
                return $res;
            }
    }

    function deleteBook($id)
    {
        $conn=mysqli_connect("localhost","root","","bookdb");
        $sql="DELETE FROM addBook where bid = '$id'";
        $res=mysqli_query($conn ,$sql);
        return $res;

    }

    function addToCart($bid, $email)
    {
       
        $conn = mysqli_connect('localhost', 'root', '', 'bookdb');
        $sql= "insert into cart (email,bid,quantity) values ('$email', '$bid', '1')" ;
        $res= mysqli_query($conn,$sql);
        return $res;
     
    }

    function getAllCart($email)
    {
        $conn=mysqli_connect("localhost","root","","bookdb");
        $sql="SELECT *FROM cart where email = '$email'";
        $res=mysqli_query($conn ,$sql);
        return $res;

    }

    function getCartDataById($cartid)
    {
        $conn=mysqli_connect("localhost","root","","bookdb");
        $sql="SELECT *FROM cart where cartid = '$cartid'";
        $res=mysqli_query($conn ,$sql);
        return $res;
    }
    function payNow()
    {
        alert("hii");
    }

?>