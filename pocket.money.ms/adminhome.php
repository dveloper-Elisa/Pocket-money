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
$sql = mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE status = 1 AND task = 'dr'") or die;
$row = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE status = 1 AND task = 'cr'") or die;
$row2 = mysqli_fetch_array($sql2);

    ?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 class="text-light bg-dark text-center">POCKET MONEY MANAGEMENT SYSTEM ADMIN PANEL</h1>
    <nav class=" bg-dark">
        <ul class="d-flex p-3">
            <a href="adminhome.php"><li class="active">DashBoard</li></a>
            <a href="transactions.php"><li>TRANSACTIONS</li></a>
            <a href="message.php"><li>MESSAGES<span class="text-denger">(<?php echo $msNumber ?>)</span></li></a>
            <a href="account.php"><li>ACCOUNTS</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>

   <span class="text-center"> 
   <h2>HELLO <?php echo $_SESSION['names'];?></h2> 
   </span>
    <div class="row">
        <div class="col p-4 cr bg-success tex-center text-light m-1" style=" border-radius: 10px;">
        <h3>Total debit</h3>
<h1><?php echo $row["SUM(amount)"]; ?> FRW</h1>
        </div>
        <div class="col p-4 cr bg-danger text-center m-1" style="border-radius: 10px;">
<h3>Total credited</h3>
<h1><?php echo $row2["SUM(amount)"]; ?> FRW</h1>
        </div>
        <div class="col px-4 cr bg-success tex-center text-light m-1" style="border-radius: 10px;">
        <h3>Balance</h3>
<h1><?php echo ($row["SUM(amount)"] - $row2["SUM(amount)"]); ?> FRW</h1>
        </div>
    </div>
        <div class="footer bg-dark text-center text-light p-4" style="position:absolute;bottom:0;"> Intare@Tech.com</div>
</body>
</html>