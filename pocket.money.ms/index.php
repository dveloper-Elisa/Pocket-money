<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\style.css">
</head>
<body class="bg-dark">
    <h1 class="text-center text-light py-3">POCKET MONEY MANAGEMENT SYSTEM</h1>
    <div class="container m-6" style="margin-top: 5rem; width:500px;;">
<div class="container card login" style="box-shadow: 3px 3px green;height:400px; padding:3rem;">

<div class="text-center user-login">
<h3 class="py-4"> USER LOGIN FORM</h3>
    </div>
<?php if(isset($_GET['msg']))
echo "<script> alert('$_GET[msg]')</script>";
?>
<form method="post" class="user-login" action="app.php">

    <p class="row">
<label for="username" class="col"> USERNAME</label>
<div class="col">
<input type="text" name="usn" id="username" class="form-control">
</div>
</p>

<p class="row">
<label for="password" class="col"> Password</label>
<div class="col">
<input type="password" name="psw" id="password" class="form-control">
</div>
</p>
<p class="col">
<input type="submit" name="login" value="LOGIN" class="btn-success btn-large py-2 px-4">
</p>
</p>
</form>
</div>
</div>
 
    
</body>
</html>