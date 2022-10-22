<?php
include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="asset/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;900&display=swap" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="asset/main.js"></script>
     <!-- bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <!-- login -->
<div class="countainer-login" id="countainer-login">
    <label class="title" style=" font-weight: bold;">FROG ADVENTURE</label>

    <div class="zan-login">
        <div class="isi-left">
            <img src="asset/img/Frog Games.png" alt="">
        </div>
        <div class="isi-right">
            <h2 class="judul-login">Login</h2>
            <form autocomplete="off" action="" method="post" onsubmit="return false">
                <input type="hidden" id="action" value="login">
                <label for="">Username</label>
                <input type="text" id="username-login" value="" placeholder="username.."> <br>
                <br>
                <label for="">Password</label>
                <input type="password" id="password-login" value="" placeholder="password.."> <br>
                <button class="btn-login" style=" margin-top: 5%;  margin-left: 20%; background: linear-gradient(to right, #11998e, #38ef7d); border: none; border-radius: 10px; color: white; width: 150px; height: 35px; font-weight: bold;">Login</button>
            </form>
            <div class="dont-login">
            <br >
            <label for="" >Don’t have an account?</label>
            <a style="color: blue;" onclick="goregist()">Go To Register</a>
            </div>
        </div>
    </div>

    <div class="footer">
    <p>© 2022 PIXEL GAMES. CREATED BY ZANCO.</p>
    </div>
</div>  



<!-- register -->
<div class="countainer-regist" id="countainer-regist">
        <label class="title" style=" font-weight: bold;">FROG ADVENTURE</label>
  <div class="zan-regist">
    <h2>Register</h2>
    <form onsubmit="return false">
      <div class="mb-3">
        <input type="hidden" id="action" value="register">
        <label for="exampleInputEmail1" class="form-label">FullName</label>
        <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="mb-3">
        <label for="axel" class="form-label">Username</label>
        <input type="text" id="username" value="" class="form-control" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Used for sign in to all our games.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" >
        <input type="date" class="form-control" id="created_at" hidden>
      </div>
      <button  class="btn-primary rounded-3" style="background: linear-gradient(to right, #11998e, #38ef7d); border: none;">Submit</button>
    </form>

    <br>
    <div class="dont-login">
      <label for="">ALREADY HAVE AN ACCOUNT?</label>
    <a onclick="gologin()" style="color: blue;">Go To Login</a>
    </div>
  </div>

  <div class="sub">
    <h2>CREATE AN <br>ACCOUNT</h2>
  </div>
  
  <div class="desc">
    <a href="" style="width: fit-content;"><label for="">SUPPORT</label> </a>
    <a href="" style=" margin-left: 25px; margin-right: 25px;"><label for="">PRIVACY NOTICE</label> </a>
    <a href="" style= "margin-right: 25px;"><label for="">TERMS OF SERVICE</label> </a>
    <a href="" style="width: fit-content;"><label for="">COOKIE PREFERENCES</label> </a> 
 
  </div>

  <div class="foot">
    <p>© 2020 RIOT GAMES. ALL RIGHTS RESERVED. <br> THIS SITE IS PROTECTED BY HCAPTCHA AND ITS <a href="">PRIVACY POLICY</a>  AND TERMS OF <a href="">SERVICE</a>  APPLY.</p>
  </div>
</div>
</body>
</html>