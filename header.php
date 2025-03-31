<?php
    //include('method.php');
    session_start();
    $email = "";
    $count = 0;

    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
        $res = getAllCart($email);
        $count = mysqli_num_rows($res);
    }
?>


<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid p-0"> <a class="navbar-brand text-uppercase fw-800" href="#"><span class="border-red pe-2">New</span>Product</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
        <div class="collapse navbar-collapse" id="myNav">
            <div class="navbar-nav ms-auto"> 
                <a class="nav-link active" aria-current="page" href="dashboard.php">All</a>
                 <a class="nav-link" href="addBook.php">Add</a> 
                 <a class="nav-link" href="manageBook.php">Manage</a>
                  <a class="nav-link" href="search.php">Search</a>
                  <?php
                    if($email == "")
                    {
                        echo '<a class="nav-link" href="login.php">Login</a>';
                    }
                    else{
                  ?>
                   <a class="nav-link" href="cart.php">Cart(<?php echo $count;?>)</a> 
                   <a class="nav-link" href="logout.php">LogOut</a>
                   <?php } ?> 
                </div>
        </div>
    </div>
</nav>