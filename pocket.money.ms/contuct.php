<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("location:index.php?msg=you must Login first");
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
$sql = mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE status = 1 AND task = 'dr' AND uId = '$_SESSION[userId]'") or die;
$row = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE status = 1 AND task = 'cr' AND uId = '$_SESSION[userId]'") or die;
$row2 = mysqli_fetch_array($sql2);

    ?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  <nav class=" bg-primary text-light student-nav">
<h1 class="text-light bg-primary text-center">POCKET MONEY MANAGEMENT SYSTEM ADMIN PANEL</h1>
  
        <ul class="d-flex p-3">
            <a href="adminhome.php"><li>DashBoard</li></a>
            <a href="Sttransactions.php"><li>TRANSACTIONS</li></a>
            <a href="contuct.php"><li class="active">Contuct US</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>

<div class="txt-success">Contuct US</div>
<hr>
<div class="container">
    <form action="app.php" method="post" class='m-6 p-6'>
Message:
<input type="text" name="msg" height="300px" required class="form-control p-6 m-4" placeholder="type your message here.........">
<input type="submit"  name="Message" value="send" class="btn mx-6 px-6 my-3 btn-outline-primary btn-lg">
</form>
</div>

        <div class="footer bg-primary text-center text-light p-4" > Intare@Tech.com</div>
</body>
<style>
    </style>
</html>