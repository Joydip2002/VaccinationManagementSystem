<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Login Page</title>
    <link rel ="stylesheet" href="./CSS/AllLoginPage.css">
   
</head>
<body>
   <!-- <nav>
      <div id="cnav">
          <h2><a href="#">Home</a></h2>
       
          <h2><a href="#">About</a></h2>
          
          <h2><a href="#">Contact</a></h2>
          <h2><a href="#">Login</a></h2>
          <h2><a href="#">Signup</a></h2>
      </div>
   </nav>  -->
   <header>
    <p>Welcome! <span></span> to Vaccination Management System</p>
   </header>

   <main>
    <div id="container">
    <div class="item t1">
            <div id="card">
                <div id="image"></div>
                <div id="details">
                    <p>Hospital login Here</p>
                    <p id="lnkBtn"> <a href="HospitalLogin.php">Hospital Login </a></p>
                </div>
            </div>
        </div>
        <div class="item t2">
            <form action="" method="post">
                <div id="fromName">Login Form</div>
                <?php
                
                $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM signup WHERE email = '$email'";

                    $res = mysqli_query($conn,$query);
                    
                    $emailcount = mysqli_num_rows($res);

                    if($emailcount){
                        $searchpass = mysqli_fetch_array($res);
                        $dbpass = $searchpass['password'];
                        $_SESSION['username'] = $searchpass['name'];
                        $verifypass = password_verify($password,$dbpass);

                        if($verifypass){
                            if(isset($_POST['Rememberme'])){
                                setcookie('useremail',$email,time()+300);
                                setcookie('userpassword',$password,time()+300);
                                header('location:Index.php');
                            }
                            else{
                            ?>
                             <script>alert("Login Successful");
                               
                            </script>
                          
                            <?php
                            header('location:Index.php');
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
                            alert("Invalid Email");
                        </script>
                        
                        <?php
                    }
                }


                ?>

                <div id="fromdetails">
                   <div class="inputbox">
                   <p><ion-icon name="mail"></ion-icon><input type="email" name="email" id="" placeholder="Enter Your Email" value="<?php if(isset($_COOKIE['useremail'])){echo $_COOKIE['useremail'];} ?>" required></p>
                   </div>
                     
                   <div class="inputbox">
                   <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="password" id="" placeholder="Enter Password" value="<?php if(isset($_COOKIE['userpassword'])){echo $_COOKIE['userpassword'];}?>" required></p>
                   </div>
                    <p><input type="checkbox" name="Rememberme" >Remember Me</p>
                   <p> <input type="submit" name="submit" value="Login" id="btn"></p>
                </div>
                
                <p>Are You Already Signin? <a href="Signup.php"><span id="signin">Signin</span></a></p>
                <p>Forgot Password? <a href="otp.php"><span id="fp">Click Here</span></a></p>
                <div id="social">
                    <ion-icon name="logo-google" id="google-icon"></ion-icon>
                    <ion-icon name="logo-facebook" id="facebook-icon"></ion-icon>
                    
                </div>
            </form>
        </div>
        <div class="item">
            <div id="card">
                <div id="image">
                </div>
                <div id="details">
                    <p>If You Super Admin then login Here</p>
                    <p id="lnkBtn"> <a href="SuperadminLogin.php">SuperAdmin Login </a></p>
                </div>
            </div>
        </div>
      
        <!-- <div class="item">
            <div id="card">
                <div id="image"></div>
                <div id="details">
                    <p>Hospital Register Here</p>
                    <p id="lnkBtn"> <a href="HospitalRegistration.php">Hospital Registration </a></p>
                </div>
            </div>
        </div> -->
    </div>
   </main>
    
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>