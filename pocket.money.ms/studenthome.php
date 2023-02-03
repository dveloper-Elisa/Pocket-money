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
            <a href="adminhome.php"><li class="active">DashBoard</li></a>
            <a href="Sttransactions.php"><li>TRANSACTIONS</li></a>
            <a href="contuct.php"><li>Contuct US</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>

   <span class="text-center"> 
   <h2>HELLO <?php echo $_SESSION['names'];?></h2> 
   </span>
   <div class="whole">
   <center>
    <div class="d-flex alll">
        <div class=" p-4 cr bg-success tex-center text-light m-1 std">
        <h5 class="text-center">Total debit</h5>
<h5 class="text-center"><?php echo $row["SUM(amount)"]; ?> FRW</h5>
        </div>
        <div class="p-4 cr bg-danger text-center m-1 std">
<h3>Total credited</h3>
<h5 class="text-center"><?php echo $row2["SUM(amount)"]; ?> FRW</h5>
        </div></div>
        <div class=" p-4 Std bg-success tex-center text-light m-1 std col-lg-6">
        <h5 class="text-center">Balance</h5>
<h5 class="text-center"><?php echo ($row["SUM(amount)"] - $row2["SUM(amount)"]); ?> FRW</h5>
        </center>
    </div>
    </div>
        <div class="footer bg-primary text-center text-light p-4" > Intare@Tech.com</div>
</body>
<style>
    .alll{
        justify-content: center;
    }
    .std {
  border: solid black 8px;
  border-radius: 50%;
  justify-content: space-around;
  padding: 20%;
  font-size: medium;
  width: 30%;
  height: 30%;

}
.whole{
    border-radius: 30%;
    border: isolid 3px green;

}
    </style>
</html>