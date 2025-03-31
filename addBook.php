
<?php
    include('method.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BOOK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="add.css">
</head>
<body>
<div class="container bg-white">
    <?php
        include('header.php');
    ?>  
</div>

<h1><center><b><u>ADD BOOK</u></b></center></h1>
<form action="" method="post" enctype="multipart/form-data" class="add">

    <p>Book Name</p>
    <p><input type="text" name="bname"></p>

    <p>Book Price</p>
    <p><input type="number" name="bprice"></p>

    <p>Book Type</p>
     <p><input type="radio" name="btype" value="Horror"> HORROR</p>
     <p><input type="radio" name="btype" value="Crime"> CRIME</p>
     <p><input type="radio" name="btype" value="Fantasy">FANTASY</p>
     <p><input type="radio" name="btype" value="Romance"> ROMANCE</p>
     <p><input type="radio" name="btype" value="Science fiction">SCIENCE fiction</p>
     <p><input type="radio" name="btype" value="Autobiography and Biography">AUTOBIOGRAPHY & BIOGRAPHY</p>

                       
     <p>Book Image</p>
     <p><input type="file" name="bimg"></p>

    <p>Book Description</p>
    <p><textarea name="bd"></textarea></p>
    
    <p><input type="submit" name="save" value="Submit"></p>

    </form>
   
    <?php
        if(isset($_POST['save']))
        {
            $res=addBook($_POST);

            if($res==1)
            {
                echo "Book Uploaded";
            }
            else{
                echo "Book Not Uploaded";
            }
        }
    ?>
   
</body>
</html>