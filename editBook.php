<?php
    include('method.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT BOOK</title>
</head>
<body>

<?php
    $id = $_GET['id'];

    $res = getBookData($id);

    $row = mysqli_fetch_assoc($res);
?>
    <h1>EDIT BOOK</h1>

    <form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="bid" value="<?php echo $row['bid']?>">

    <p>Book Name</p>
    <p><input type="text" name="bname" value="<?php echo $row['bname']?>"></p>

    <p>Book Price</p>
    <p><input type="number" name="bprice" value="<?php echo $row['bprice']?>"></p>

    <p>Book Type</p>
     <p><input type="radio" name="btype" value="Horror"> HORROR</p>
     <p><input type="radio" name="btype" value="Crime"> CRIME</p>
     <p><input type="radio" name="btype" value="Fantasy">FANTASY</p>
     <p><input type="radio" name="btype" value="Romance"> ROMANCE</p>
     <p><input type="radio" name="btype" value="Science fiction">SCIENCE fiction</p>
     <p><input type="radio" name="btype" value="Autobiography and Biography">AUTOBIOGRAPHY & BIOGRAPHY</p>

                       
     <p>Book Image</p>
     <p><input type="file" name="bimg"></p>
     <img src="<?php echo $row['bimage'] ?>" alt="Not Found" style="width: 100px;" />

    <p>Book Description</p>
    <p><textarea name="bd" value="<?php echo $row['bd']?>"></textarea></p>
    
    <p><input type="submit" name="upload" value="Upload"></p>

</form>
    
<?php
        if(isset($_POST['upload']))
        {
            $res=updateBook($_POST);

            if($res==1)
            {
                echo "Book Updated";
                header("location:manageBook.php");
            }
        }
            else{
                echo "Book Not Updated";
            }    
    ?>
</body>
</html>