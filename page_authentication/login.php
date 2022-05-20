<?php
require_once ('./../dao/dbhelper.php');
require_once ('./../shared/config.php');
session_start();
$s_username = $s_password = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['username'])) {
		$s_username = $_POST['username'];
	}

	if (isset($_POST['password'])) {
		$s_password = $_POST['password'];
	}

    $s_username = str_replace('\'', '\\\'', $s_username);
	$s_password      = str_replace('\'', '\\\'', $s_password);

    $data = login($s_username,$s_password);
    if($data != null ){
        //set session
        $_SESSION[S_ACCOUNT_ID] = $data['accountId'];
        $_SESSION[S_USERNAME] = $s_username;
        
        header('Location: ./../index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Bookbook</title>
</head>
<body>
    <div id="wrapper">
        <form method="post"  id="form-login">
            <h1 class="form-heading">Form đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" id="password" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <a href="home.php"><input type="submit" value="Đăng nhập" class="form-submit"></a>  

        <div class="form-group">
        <a href="register.php"><button class="btn btn-warning" type="button">Đăng ký</button></a>
        </div>

        <div class="form-group">
        <a href="forgotpwd.php"><button class="btn btn-danger" type="button">Quên mật khẩu?</button></a>
        </div>
        </form>
     
    </div>
   
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</html>
