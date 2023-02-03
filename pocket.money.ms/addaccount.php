<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("location:index.php?msg=you must Login first");
}
else if($_SESSION['post'] == 0){
    echo "<script> alert('Access is denied  you have not permission to access this page');
    window.location.href ='http://127.0.0.1/pocket.money.ms/studenthome.php'
    </script>";
    //    header('location: ' . $_SERVER['HTTPS_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($_SESSION['title'])){
        $ms= $_SESSION['title'];
    echo $ms;
    }
    ?>

    <?php
require_once("connection.php");
require_once("not.php");
$sql = mysqli_query($conn,"SELECT * FROM `acount` INNER JOIN users WHERE users.id = acount.useId") or die;
    ?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 class="text-light bg-dark text-center">POCKET MONEY MANAGEMENT SYSTEM ADMIN PANEL</h1>
    <nav class=" bg-dark">
        <ul class="d-flex p-3">
            <a href="adminhome.php"><li >DashBoard</li></a>
            <a href="transactions.php"><li >TRANSACTIONS</li></a>
            <a href="message.php"><li>MESSAGES<span class="text-denger">(<?php echo $msNumber ?>)</span></li></a>
            <a href="account.php"><li class="active">ACCOUNTS</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>
   <div class="container">
<div class="card p-4 col-6 justfy-content-center mx-5">
<h2 class="mx-5 px-5">Add User</h2> 
    <form action="app.php" method="post">
   <p> First Names<input type="text"  class="form-control" name="Fname"></p>
   <p> Last Names<input type="text" class="form-control" name ="Lname"></p>
   <p> Username     <input type="text" class="form-control" name = "usn" placeholder="@example"></p>
   <p> Password    <input type="password" class="form-control" name = "psw1" placeholder="........." required minlength="8"></p>
   <p> Retype Password    <input type="password" class="form-control" name = "psw2" placeholder="........." required></p>
<p><input type="submit" name="userAccount" value="submit" class="text-light btn-dark btn-lg"></p>
    </form>
</div>
   </div>
        <div class="footer bg-dark text-center text-light p-4" > Intare@Tech.com</div>
</body>
</html>
