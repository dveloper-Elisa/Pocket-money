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
$sql = mysqli_query($conn,"SELECT * FROM `transactions` INNER JOIN users WHERE users.id = transactions.uId And uId = '$_SESSION[userId]'") or die;
    ?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  <nav class=" bg-primary text-light student-nav">
<h1 class="text-light bg-primary text-center">POCKET MONEY MANAGEMENT SYSTEM ADMIN PANEL</h1>
  
        <ul class="d-flex p-3">
            <a href="adminhome.php"><li>DashBoard</li></a>
            <a href="Sttransactions.php"><li class="active">TRANSACTIONS</li></a>
            <a href="contuct.php"><li>Contuct US</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>
    <div class="bodysection">

   <span class="text-center"> 
   <h2>My transactions </h2> 
   </span>
   <div class="container">
<table class="table table-bordered col-lg-12 m-2 p-2">
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
</div>
        <div class="footer bg-dark text-center text-light" > Intare@Tech.com</div>
</body>
</html>