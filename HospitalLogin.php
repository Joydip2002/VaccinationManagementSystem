<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Management System</title>
    <link rel="stylesheet" href="./CSS/Login.css">
</head>
<body>
     <div id="p">
        <div id="c">
            <h2>LOGIN</h2>
             <?php
                $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
                // if($conn){
                //     echo "connection Successfuyll";
                // }
                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    

                    $query = "SELECT * FROM hospital WHERE email = '$email'";

                    $res = mysqli_query($conn,$query);
                    $emailCount = mysqli_num_rows($res);

                    if($emailCount){
                        $searchPass = mysqli_fetch_array($res);
                        $dbPass = $searchPass['password'];
                        // $_SESSION['hospitalName'] = $searchPass['HospitalName'];
                        $_SESSION['hospitalEmail'] = $searchPass['email'];
                        $_SESSION['HosUsername'] = $searchPass['HospitalName'];

                        $verifyPass = password_verify($password,$dbPass);

                        if($verifyPass){
                            if(isset($_POST['Rememberme'])){
                                setcookie('hospitalusername',$email,time()+300);
                                setcookie('hospitalPassword',$password,time()+300);
                                header('location:HospitalHomePage.php');
                            }
                            else{
                            ?>
                            <script>
                               alert("Login Successful");
                            //    location.replace('HospitalHomePage.php');
                            </script>
                            <?php
                             header('location:HospitalHomePage.php');
                            }
                        }
                        else{
                            ?>
                            <script>
                               alert("Invalid Password");
                            </script>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <script>
                           alert("Invalid Email Id");
                        </script>
                        <?php
                    }
                 }
                 mysqli_close($conn);
                ?>
            <form action="" method="post">
              <p ><label for="" id="un">Username</label></p>
              <p><input type="email" name="email" id="" value="<?php if(isset($_COOKIE['hospitalusername'])){echo $_COOKIE['hospitalusername'];} ?>"  required></p>
              <p><label for="">Password</label></p>
              <p><input type="password" name="password" id="" value="<?php if(isset($_COOKIE['hospitalPassword'])){echo $_COOKIE['hospitalPassword'];} ?>"  required></p>
              <p id="checkbox"><input type="checkbox" name = "Rememberme" >Remember Me</p>

              <p id="btn"><input type="submit" name ="submit" value="Sign In" id="btnsubmit"></p>
            </form>
            <h3>Forget Password? <span><a href="#">Click Here</a></span></h3>

            <div class="social">
                <ion-icon name="logo-facebook"></ion-icon>
                <h3>Signin with Facebook</h3>
            </div>

            <div class="social s1">
                <ion-icon name="logo-twitter"></ion-icon>
                <h3>Signin with Twitter</h3>
            </div>
        </div>
</div>
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>