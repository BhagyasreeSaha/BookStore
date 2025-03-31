<?php
    include('method.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGE BOOK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="add.css">
</head>
<body>
<div class="container bg-white">
    <?php
        include('header.php');
    ?>  <br>
    <h1><b><center><u>MANAGE BOOK</u></center></b></h1>

    <table border="5" width="100%">
    
        <thead>
        <tr>
            <th>Book Name</th>
            <th>Book Price</th>
            <th>Book Type</th>
            <th>Book Image</th>
            <th>Book Description</th>
            <th colspan="2">ACTION</th>
        </tr>
        </thead>

        <tbody>
            <?php
                if(isset($_POST['search']))
                {
                        $name = $_POST['search'];
                        $res=manageBookByName($name);
                        $records=mysqli_num_rows($res);
                        if($records > 0)
                            {
                                    while($row= mysqli_fetch_assoc($res))
                                    {
                                        echo '
                                        <tr align="center">
                                        <td>'.$row["bname"].'</td>
                                        <td>'.$row["bprice"].'</td>
                                        <td>'.$row["bd"].'</td>
                                        <td>'.$row["btype"].'</td>
                                        <td><img src =" '.$row["bimage"].' " style="width: 100px;"/></td>
                                        <td><a href="editBook.php?id='.$row["bid"].'">EDIT</a></td>
                                        <td><a onclick="delBook('.$row["bid"].')">DELETE</a></td>
                                        </tr>
                                        ';   
                                    }
                            }
                        else
                            {
                                echo "there is no data";
                            }
                }
                else{
                        $res=manageBook();
                        $records=mysqli_num_rows($res);
                        if($records > 0)
                            {
                                    while($row= mysqli_fetch_assoc($res))
                                    {
                                        echo '
                                        <tr align="center">
                                        <td>'.$row["bname"].'</td>
                                        <td>'.$row["bprice"].'</td>
                                        <td>'.$row["bd"].'</td>
                                        <td>'.$row["btype"].'</td>
                                        <td><img src =" '.$row["bimage"].' " style="width: 100px;"/></td>
                                        <td><a href="editBook.php?id='.$row["bid"].'">EDIT</a></td>
                                        <td><a onclick="deleteBook('.$row["bid"].')">DELETE</a></td>
                                        </tr>
                                        ';    
                                    }
                            }
                        else
                            {
                                echo "there is no data";
                            }
                }
            
            ?>
        </tbody>
            
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
    function deleteBook(id)
    {  
       // alert(id)
        if( confirm("Are you sure to delete this book?"))
        {
            $.ajax({
                        url:"delBook.php",
                        method:"get",
                        data:{"id":id},
                        success: function(response)
                            {
                                alert(response);
                                window.location.href = "";
                            }
                    })
        }
    }
</script>

</body>
</html>