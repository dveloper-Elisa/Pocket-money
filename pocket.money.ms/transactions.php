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
$sql = mysqli_query($conn,"SELECT * FROM `transactions` INNER JOIN users WHERE users.id = transactions.uId") or die;
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
            <a href="transactions.php"><li class="active">TRANSACTIONS</li></a>
            <a href="message.php"><li>MESSAGES</li></a>
            <a href="account.php"><li>ACCOUNTS</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>
    <div class="bodysection">

   <span class="text-center"> 
   <h2>Choose Students </h2> 
   </span>
   <div class="container">
<table class="table table-striped col-10 m-3">
<tr>
    <th>Id</th><th>Student Names</th><th>Date</th><th>transaction</th><th>Blance</th><th>Status</th>

</tr>

<?php 
while($row = mysqli_fetch_array($sql)){
    if($row['status']==1)
    $s='Approved';
    else
    $s = "<a href='app.php?id=$row[tId]'>Pending</a>";

    echo"<tr>";
    echo"<td>".$row['tId']."</td>";
    echo"<td>".$row['firstName']." ".$row['lastName']."</td>";
    echo"<td>".$row['date']."</td>";
    echo"<td>".$row['task']."</td>";
    echo"<td>".$row['amount']."</td>";
    echo"<td>".$s."</td>";
    echo"</tr>";
    
}
?>
</table>
</div>
   </div>
        <div class="footer bg-dark text-center text-light" > Intare@Tech.com</div>
</body>
</html>