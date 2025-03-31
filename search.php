<?php
    include('method.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH BOOKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

</head>
<body>
<div class="container bg-white">
    <?php
        include('header.php');
    ?> <br>
    <h1><u><b><center>SEARCH BOOKS</center></b></u></h1><br><br>
    <form action="" class="form-wrapper" method="post">
       <center><input type="text" id="search" name="search" placeholder="Search for..." required>
        <input type="submit" name="submit" value="search" id="submit"></center>
    </form>
<br><br>
    <table border="5" width="100%">
        <tbody>
            <?php
                if(isset($_POST['submit']))
                {
                        $name = $_POST['search'];
                        $res=manageBookByName($name);
                        $records=mysqli_num_rows($res);
                        if($records > 0)
                            {
                                    echo '
                                         <thead>
                                            <tr>
                                                <th>Book Name</th>
                                                <th>Book Price</th>
                                                <th>Book Type</th>
                                                <th>Book Image</th>
                                                <th>Book Description</th>
                                            </tr>
                                            </thead>
                                    ';
                                    while($row= mysqli_fetch_assoc($res))
                                    {
                                        echo '
                                        <tr align="center">
                                        <td>'.$row["bname"].'</td>
                                        <td>'.$row["bprice"].'</td>
                                        <td>'.$row["bd"].'</td>
                                        <td>'.$row["btype"].'</td>
                                        <td><img src =" '.$row["bimage"].' " style="width: 100px;"/></td>
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

</body>
</html>