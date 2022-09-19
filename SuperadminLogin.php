<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Super Admin Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            html{
                font-size: 62.5%;
                background-image: url(/Assets/baylor-covid-vaccine.jpg);
                background-size: cover;
            }
            #p{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            #c{
                position: absolute;
                z-index: 100;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                justify-content: space-evenly;
                padding: 5rem;
                overflow:hidden ;
                /* width: 30rem; */
                background-color: rgb(20, 198, 198);
            }
            #c::before{
                position: absolute;
                z-index: -1;
                content: '';
                height: 65rem;
                width: 55rem;
                /* background-image: conic-gradient(from 90deg, violet 10%,rgba(229, 235, 51, 0.09) 80%,rgb(136, 255, 0) 100%); */

                background-image: conic-gradient(from 90deg,rgb(245, 0, 0),rgb(26, 255, 5),rgb(13, 0, 255));
                animation: rotate 5s linear infinite;
            }
            #c:after{
                position: absolute;
                z-index: -1;
                height: 41rem;
                width: 34rem;
                background-color: rgb(255, 235, 235);
                content: '';
            }

            @keyframes rotate{
                0%{
                    transform: rotate(360deg);
                }
                100%{
                    transform: rotate(-360deg);
                }
            }
            form{
                display: flex;
                padding: 2rem;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                
            }
            input{
                padding: .5rem;
                margin: 1rem;
                border-top: 0;
                border-left: 0;
                border-right: 0;
                outline: none;
                border-radius: 3rem;
            }
            input:is([type="email"],[type="password"]){
                text-align: center;
            }
            #btn{
                margin-top: 3rem;
                padding: .5rem 3rem;
                border: none;
            }
           #btn:hover{
              
                cursor: pointer;
            }
            .social{
                display: flex;
                justify-content:center;
                align-items: center;
                border: .1rem solid black;
                border-radius: 2rem;
                padding: .5rem;
                margin: 1rem;
            }
            .social:hover{
                background-color: blueviolet;
                color: white;
                cursor: pointer;
            }
            #btn:hover{
                background-color: rgb(12, 220, 74);
            }
            ion-icon{
                font-size: 2rem;
            }
            h3{
                margin: .2rem;
            }
            p ion-icon,ion-icon{
                font-size: 1.5rem;
                transition: 1s;
            
            }
            ion-icon:hover{
                font-size: 5rem;
                transform:rotate(360deg);
            }
            h2{
                font-size: 2rem;
            }
        </style>
    </head>
<body>
       <div id="p">
        <div id="c">
            <h2>Superadmin Login</h2>
            <?php
            $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

            // if($conn){
            //     echo "Connection Successful";
            // }

            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "SELECT * FROM superadmin WHERE email = '$email'";
                $res = mysqli_query($conn,$query);

                $emailCount = mysqli_num_rows($res);


                if($emailCount){
                    $search = mysqli_fetch_array($res);
                    $dbPass = $search['password'];
                    $_SESSION['adminName'] = $search['name'];
                    $_SESSION['adminEmail'] = $search['email'];
                    $verifyPass = password_verify($password,$dbPass);

                    if($verifyPass){
                        if(isset($_POST['Rememberme'])){
                            setcookie('Superusername',$email,time()+300);
                            setcookie('SuperPassword',$password,time()+300);
                            header('location:SuperAdminHomePage.php');
                        }
                        else{
                        ?>
                            <script>
                                alert("Login Successful");
                                // location.replace('SuperAdminHomepage.php');
                            </script>

                        <?php
                         header('location:SuperAdminHomePage.php');
                        }
                    }
                    else{
                        ?>
                        <script>
                            alert("Invalid Password !");
                            
                        </script>

                    <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert("Invalid Email!");
                      
                    </script>

                <?php
                }
            }

            ?>
            <form action="" method="post">
                <p><ion-icon name="mail"></ion-icon><input type="email" name="email" id="" placeholder="Enter Register Email"  value="<?php if(isset($_COOKIE['Superusername'])){echo $_COOKIE['Superusername'];} ?>"required></p>
                <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="password" id="" placeholder="Enter Password" value="<?php if(isset($_COOKIE['SuperPassword'])){echo $_COOKIE['SuperPassword'];} ?>" required></p>
                <p id="checkbox"><input type="checkbox" name = "Rememberme" >Remember Me</p>

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