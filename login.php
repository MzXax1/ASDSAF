<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bukawarung</title>
    <link href="https://font.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
     
     body#bg-login {
    background-color: #f5f5f5;
    font-family: sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    }

    #box-login {
    width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px #ccc;
    }

    #box-login h2 {
    text-align: center;
    margin-bottom: 20px;
    }

    #box-login img {
    display: block;
    margin: 0 auto;
    }

    #box-login form {
    margin-top: 20px;
    margin: 0 auto;
    }

    #box-login input[type="text"], #box-login input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    }

    #box-login input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    }
    </style>
</head>
<body id="bg-login">
    <div id="box-login">
        <h2>Login Bukawarung.com
        <img src="img/logo.png" alt="Avatar Logo" style="width: 70px; height:50px;" class="rounded-pill"> </h2>
        <form action="" method="post">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <div>
            <input type="submit" name="submit" placeholder="submit" value="login" class="btn">
        </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = mysqli_real_escape_string($con, $_POST['user']);
                $pass = mysqli_real_escape_string($con, $_POST['pass']);

                $cek = mysqli_query($con, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
            if(mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true; 
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
                echo '<script> window.location="dashboard.php"</script>';
            }else{
                echo '<script>alert("username atau password salah")</script>';
            }

            }
        ?>
    </div>
    
</body>
</html>