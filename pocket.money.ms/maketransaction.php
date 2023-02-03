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

   <span class="text-center"> 
   <h2>Choose Students </h2> 
   </span>
   <div class="container">
<div class="card p-4 col-6">
    <form action="app.php" method="post">
        <input type="hidden" value="<?php echo $_GET['accId'];?>" name="id">
        <input type="hidden" value="<?php echo $_GET['names'];?>" name="names">
        <input type="hidden" value="<?php echo $_GET['bal'];?>" name="bal">
   <p> Student Names<input type="text" value="<?php echo $_GET['names'];?>" disabled class="form-control"></p>
   <p> Balance:     <input type="text"  value="<?php echo $_GET['bal'];?>" disabled class="form-control"></p>
   <p> Paticuler: <select name="paticuler" required class="form-control">
    <option value=""></option>
        <option value="dr" class="form-control">Derbit</option>
        <option value="cr" class="form-control">Credit</option>
    </select></p>
   <p> amount: <input type="number" name="amount" class="form-control" max=""></p>
<p><input type="submit" name="submittransaction" value="submit" class="text-light btn-dark btn-lg"></p>
    </form>
</div>

   </div>
        <div class="footer bg-dark text-center text-light p-4" > Intare@Tech.com</div>
</body>
</html>
