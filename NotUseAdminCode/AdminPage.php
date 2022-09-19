<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/AdminPage.css" rel="stylesheet">
    </head>
<body>
       <div id="p">
        <div id="c">
            <h2>Admin Login</h2>
            <?php
            $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query ="SELECT * FROM admin WHERE email = '$email'";
                $res = mysqli_query($conn,$query);

                $emailrows = mysqli_num_rows($res);
                if($emailrows){
                    $searchpass = mysqli_fetch_array($res);
                    $dbpass = $searchpass['password'];
                    $_SESSION['adminname'] = $searchpass['name'];
                    $_SESSION['adminemail'] = $searchpass['email'];
                    $verifyPass = password_verify($password,$dbpass);
                    if($verifyPass){
                        ?>
                        <script>
                            alert("Login Successful");
                            location.replace('');
                        </script>
                          
                             <?php
                    }
                    else{
                        ?>
                        <script>
                            alert("Password Invalid!");
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

            <form action="" method="post">
                <p><ion-icon name="mail"></ion-icon><input type="email" name="email" id="" placeholder="Enter Register Email" required></p>
                <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="password" id="" placeholder="Enter Password" required></p>
                 <input type="submit" name="submit" id="btn">
            </form>
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