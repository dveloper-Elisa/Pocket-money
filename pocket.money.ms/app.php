</html>
<?php
require_once("connection.php");
/////////////////////                     login page                        ///////////////////////////////////  
if(isset($_POST['login'])){
$user = $_POST['usn'];
$pass = $_POST['psw'];
$sql = mysqli_query($conn,"SELECT * FROM `users` WHERE username ='$user'") or die;
$row = mysqli_fetch_array($sql);
if(mysqli_num_rows($sql) == 1&&$row['stutus']==0){
    header("location:index.php?msg=your account is temporay locked please contact systeme adiministrator");
    }
if(mysqli_num_rows($sql) == 1){
    if(password_verify($pass, $row['password'])){
    session_start();
    $_SESSION['userId'] = $row['Id'];
    $_SESSION['post'] = $row['post'];
    $_SESSION['names'] = $row['firstName']." ".$row['lastName'];
    $_SESSION['title'] = 'login Successfuly';
if($row['post'] == 1 || $row['post'] == 2 )
header("location:adminhome.php");
else
header("location:studenthome.php");
}
else
header("location:index.php?msg=your may entered wrong user name or password");
}else
header("location:index.php?msg=User not found");

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////  Lock account //////////////////////////////////////////////////////////////

if(isset($_GET['LockId']))
{
    $qr = mysqli_query($conn,"UPDATE `users` SET stutus=0 WHERE Id ='$_GET[LockId]'") or die;
    header("location:account.php");
}
////////////////////////////////  UN Lock account //////////////////////////////////////////////////////////////

if(isset($_GET['unlockId']))
{
    $qr = mysqli_query($conn,"UPDATE `users` SET stutus = '1' WHERE Id ='$_GET[unlockId]'") or die;
    header("location:account.php");
}
////////////////////////////////  Make admin account //////////////////////////////////////////////////////////////

if(isset($_GET['adminId']))
{
    $qr = mysqli_query($conn,"UPDATE `users` SET post = '2' WHERE Id ='$_GET[adminId]'") or die;
    header("location:account.php");
}
////////////////////////////////  Remove admin account //////////////////////////////////////////////////////////////

if(isset($_GET['removeAdminId']))
{
    $qr = mysqli_query($conn,"UPDATE `users` SET post = '0' WHERE Id ='$_GET[removeAdminId]'") or die;
    header("location:account.php");
}

////////////////////////////////  Submit Transerction //////////////////////////////////////////////////////////////
if(isset($_POST['submittransaction']))
{
    $userName = $_POST['names'];
    $bal = $_POST['bal'];
    $user = $_POST['id'];
    $amount = $_POST['amount'];
    $Date = date("d/m/Y");
    $task = $_POST['paticuler'];
    if($bal<$amount && $task == "cr"){
        echo "<script> alert('Youhave requested much money more than balance');
        window.location.href ='http://127.0.0.1/pocket.money.ms/maketransaction.php?accId=$user&&names=$userName&&bal=$bal'
        </script>";
    }else{
        $qr = mysqli_query($conn,"INSERT INTO `transactions` VALUES (NULL,'$user','$Date','$task','$amount','1')") or die;
        if($qr){
            if($task == 'cr')
            mysqli_query($conn,"UPDATE `acount` SET blance= blance-'$amount' WHERE useId ='$user'") or die;
            else
            mysqli_query($conn,"UPDATE `acount` SET blance= blance+'$amount' WHERE useId ='$user'");
            echo "<script> alert('Transaction created success fully');
            window.location.href ='http://127.0.0.1/pocket.money.ms/transactions.php'
            </script>";
        }

    }
}

/////////////////////////////////////  user Account Submiting ///////////////////////////////////

if(isset($_POST['userAccount'])){
    $ffname= $_POST['Fname'];
    $llname= $_POST['Lname'];
    $uname = $_POST['usn'];
    $upasw1= $_POST['psw1'];
    $upasw2= $_POST['psw2'];


    $chek = mysqli_query($conn,"SELECT * FROM users WHERE username = '$uname'");

    if($upasw1 != $upasw2){

        echo "<script> alert('Password didn\'t much');
        window.location.href ='http://127.0.0.1/pocket.money.ms/addaccount.php'
        </script>";
    }

    if(mysqli_num_rows($chek)>0){
        echo "<script> alert('User Name aleady exist!');
        window.location.href ='http://127.0.0.1/pocket.money.ms/addaccount.php'
        </script>";
    }
    
    else{
        $gopassword = password_hash($upasw1,PASSWORD_DEFAULT);
        mysqli_query($conn,"INSERT INTO users values (null,'$uname','$gopassword','$ffname','$llname','0','1')");
        
        $usid = mysqli_query($conn,"SELECT Id from users where username = '$uname'") or die;
        
        $row = mysqli_fetch_array($usid);

        mysqli_query($conn,"INSERT INTO acount values('$row[Id]','null')") or die;
        
        echo "<script> alert('Account created successfull...!');
        window.location.href ='http://127.0.0.1/pocket.money.ms/account.php'
        </script>";
    }


}


//////////////////////////////                 contact                 ////////////////////////////////////////////
if(isset($_POST['Message']))
{
    session_start();
    $Date = date("D-d-M-Y");
    $qr = mysqli_query($conn,"INSERT INTO `mesages` Values('NULL','$_SESSION[userId]','$Date','$_POST[msg]','0')") or die;
    if($qr){
        echo "<script> alert('Message sent successfull...!');
        window.location.href ='http://127.0.0.1/pocket.money.ms/contuct.php'
        </script>";  
    }
}
/////////////////////////////////////  user Account Update ///////////////////////////////////

if(isset($_POST['UpdateAccount'])){
    $ffname= $_POST['Fname'];
    $llname= $_POST['Lname'];
    $uname = $_POST['usn'];
    $qr= mysqli_query($conn,"UPDATE users SET firstName =' $ffname',lastName ='$llname' WHERE username = '$uname'") or die;
    if($qr){
        echo "<script> alert('Account Updated successfull...!');
        window.location.href ='http://127.0.0.1/pocket.money.ms/profile.php'
        </script>";     
    }}
?>