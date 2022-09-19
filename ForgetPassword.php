<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background:rgba(33, 33, 33, 2);
        }

        #container {

           display: flex;
           justify-content: center;
           align-items: center;
           min-height: 100vh;
           flex-direction: column;
           /* justify-content: space-evenly; */
           gap:1rem;
        }

        .items {
            width: 20rem;
         
            background-color: rgb(52, 211, 229);
            display: flex;
            flex-direction: column;
            /* justify-content: space-evenly; */
            gap:2rem;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;

        }
        .inputbox{
            position:relative;
        }
        input{
            padding: 1rem;
            outline: none;
             
          
        }
        span{
            position:absolute;
            left:0;
            padding: 1rem;
            pointer-events: none;
            transition:0.5s;
        }
        input:valid ~ span,
        input:focus ~ span{
            color:black;
            background:blue;
            padding:0 1rem;
            transform:translateY(-.6rem) translateX(.5rem);
            letter-spacing:.1rem;
        }
        input:valid, 
        input:focus{
            border-color:blue;
        }
        form{
            height:20rem;
            display: flex;
            flex-direction: column;
            /* justify-content: space-evenly; */
            gap:1rem;
            align-items: center;
            justify-content: center;  
        }
        #btn{
            border:none;
            border-radius: 1rem;
        }
        #btn:hover{
            cursor:pointer;
            background:black;
            color:yellow;
        }
       h2{
        text-transform: uppercase;
        color:white;
      
       }
 
    </style>
</head>

<body>
   
    <div id="container">
        <h2>Forget Password Form</h2>
        <?php
           $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
           if(isset($_POST['submit'])){
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $otp = $_SESSION['OTP'];
            echo $otp;
           $encryptpass = password_hash($password,PASSWORD_BCRYPT);
           if($password == $cpassword){
            $query ="UPDATE signup SET password ='$encryptpass' WHERE forgotpasswordotp = '$otp'";
            $res = mysqli_query($conn,$query);
            if($res){
               ?>
               <script>
                alert("Password Succefully Updated");
                location.replace('AllLoginPage.php');
               </script>
               <?php
              }
              else{
                ?>
                <script>
                 alert("Password Uodated Unsuccefully");
                </script>
                <?php
              }
           }
        }
        ?>
        <div class="items">
           <form action="" method="post">
           <div class="inputbox"> 
           <input type="password" name="password" id=""required><span>Enter Password</span>
           </div>
           <div class="inputbox"> 
           <input type="password" name="cpassword" id="" required><span>ReEnter-Password</span>
    </div>
            <input type="submit" name="submit" id="btn">
           </form>
        </div>
</body>

</html>