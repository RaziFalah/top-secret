<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("location: ../login.php");
        } else {
            echo '<!DOCTYPE html>
            <html>
            
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Untitled</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                <link rel="stylesheet" href="assets/css/style.css">
            </head>
            
            <body>
                <div class="login-dark">
                    <form class="form" action="apis/signup_api.php" method="post">
                        <h2 class="sr-only">Signup Form</h2>
                        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                        <div class="form-group"><input class="form-control" type="name" name="username" placeholder="username"></div>
                        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email Address"></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                        <p style="color:red">Something went wrong! That is all we know</p>
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Signup</button></div><a href="login.php" class="forgot">Member? login now</a></form>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
            </body>
            
            </html>
            <style>
                .login-dark {
              height:1000px;
              background:#475d62 url(images/1.png);
              background-size:cover;
              position:relative;
            }
            
            .login-dark form {
              max-width:320px;
              width:90%;
              background-color:black;
              padding:40px;
              border-radius:4px;
              transform:translate(-50%, -50%);
              position:absolute;
              top:50%;
              left:50%;
              color:#fff;
              box-shadow:3px 3px 4px rgba(0,0,0,0.2);
            }
            
            .login-dark .illustration {
              text-align:center;
              padding:15px 0 20px;
              font-size:100px;
              color:#2980ef;
            }
            
            .login-dark form .form-control {
              background:none;
              border:none;
              border-bottom:1px solid #434a52;
              border-radius:0;
              box-shadow:none;
              outline:none;
              color:inherit;
            }
            
            .login-dark form .btn-primary {
              background:#214a80;
              border:none;
              border-radius:4px;
              padding:11px;
              box-shadow:none;
              margin-top:26px;
              text-shadow:none;
              outline:none;
            }
            
            .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
              background:#214a80;
              outline:none;
            }
            body {
              overflow: hidden; /* Hide scrollbars */
            }
            
            .login-dark form .forgot {
              display:block;
              text-align:center;
              font-size:12px;
              color:#6f7a85;
              opacity:0.9;
              text-decoration:none;
            }
            
            .login-dark form .forgot:hover, .login-dark form .forgot:active {
              opacity:1;
              text-decoration:none;
            }
            
            .login-dark form .btn-primary:active {
              transform:translateY(1px);
            }
            
            
            </style>';
        }
    } else {
        echo '<h1>Connection has been blocked!</h1>';
    }