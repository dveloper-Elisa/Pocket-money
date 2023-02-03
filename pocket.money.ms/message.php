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
mysqli_query($conn,"UPDATE `mesages` SET status='1' WHERE status='0'") or die;
$sql = mysqli_query($conn,"SELECT * FROM `mesages` INNER JOIN users WHERE users.id = mesages.uId order by `mId` DESC") or die;
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
            <a href="message.php"><li class="active">MESSAGES <span class="text-denger">(<?php echo $msNumber ?>)</span></li></a>
            <a href="account.php"><li>ACCOUNTS</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="logout.php"> SIGN OUT</a>
        </ul>

    </nav>
<div class="bodysection">
   <span class="text-center row"> 
   <h2 class="col" class='text-sucess'>MY mesages</h2>> 
   <hr>
   </span>
   <div class="container">

   <div class="card" style="max-height:400px; overflow:scroll;">

<?php 
while($row = mysqli_fetch_array($sql)){
   
    echo"<div class='container'><div class='card px-5 py-3 m-2'>";
    echo"<h4>".$row["firstName"] ."".$row["lastName"]."</h4>";
    echo"<b>".$row['content']."</b>";
    echo"<br><i>".$row['date']."<i>";
    echo"</div></div>";
    
}
?>
</div>
   </div>
   </div>
        <div class="footer bg-dark text-center text-light" > Intare@Tech.com</div>
</body>
</html>