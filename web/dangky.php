<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng kí tài khoản</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/layout.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{background-color:white}
  </style>

  
</head>
<body>
<nav class="navbar navbar-inverse  ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="./image/nhacpro.png" class="img-responsive"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"> Trang chủ</span></a></li>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng kí</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
      </ul>
      </div>
      </div>
      </nav>
<?php
require('connect.php');
?>
<div class="container text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left">
    <?php
              if(isset($_POST['submit'])){
              if(empty($_POST['username']) || empty($_POST['password'])){
                echo '<p style="color:red">Vui lòng không để trống</p>';
              }else{
                 $username=$_POST['username'];
                 $password=$_POST['password'];
                 $password2=$_POST['password2'];
                 if(strlen($username)<6 || strlen($password)<6){
                  echo '<p style="color:red">Vui lòng nhập username và password nhiều hơn 6 kí tự</p>';
                 }else{
                   if($password != $password2){
                    echo '<p style="color:red">Password không trùng nhau</p>';
                   }else{
                     $sql="select * from user where username='$username'";
                     $query= mysqli_query($con,$sql);
                     $num =mysqli_num_rows($query);
                     $password1 = md5($password);
                     if($num==0){
                       $sql2="INSERT INTO user(username,password) VALUES ('$username','$password1')";
                       $them= mysqli_query($con,$sql2);
                       if($them){
                        echo '<p style="color:green">Đăng kí thành công!</p>';
                        
                       }else{
                        echo '<p style="color:red">Đăng kí không thành công!</p>';
                       
                       }
                       
                     }else{
                      echo '<p style="color:red">Username đã tồn tại!</p>';
                    }
                }
            }

        }
    }
?>
</div>
</div>

<form action="" method="POST" role="form">
<div class="form group">
<h2>Đăng ký</h2><br/>
<label for="">Username</label>
<br/>
<input type="text" name="username">
<br/>
<label for="">Password</label>
<br/>
<input type="password" name="password">
<br/>
<label for="">Nhập lại password</label>
<br/>
<input type="password" name="password2">
<br/>
<button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
</form>
</div>
</div>
</div>



</body>
</html>