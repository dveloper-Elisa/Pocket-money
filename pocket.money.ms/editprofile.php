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
    unset($_SESSION['title']);
    }
    ?>

    <?php
require_once("connection.php");
require_once("not.php");
$sql = mysqli_query($conn,"SELECT * FROM  users WHERE users.id = '$_GET[Id]'") or die;
$res =mysqli_fetch_array($sql);
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
   <p> First Names<input type="text"  class="form-control" name="Fname" value="<?php echo $res['firstName'];?>"></p>
   <p> Last Names<input type="text" class="form-control" name ="Lname" value="<?php echo $res['lastName'];?>"></p>
   <p> Username     <input type="text" class="form-control" value="<?php echo $res['username'];?>" disabled></p>
   <input type="hidden" name="usn" value="<?php echo $res['username'];?>">
<p><input type="submit" name="UpdateAccount" value="submit" class="text-light btn-dark btn-lg"></p>
    </form>
</div>
   </div>
        <div class="footer bg-dark text-center text-light p-4" > Intare@Tech.com</div>
</body>
</html>
