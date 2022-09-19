<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Generate</title>
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
            background:rgba(33, 33, 33, 2.2);
        }

        #container {

           display: flex;
           justify-content: center;
           align-items: center;
           min-height: 100vh;
           flex-direction: column;
           gap:1rem;
        }

        .items {
            width: 20rem;
             height: 10rem;
            background-color: rgba(255,255,255,0.7);
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            justify-content: center;
            border-radius:1rem;

        }
        #inputbox{
            position: relative;
        }
        input{
            padding: 1rem;
            outline: none;
            
           
        }
        span{
            padding: 1rem;
            position: absolute;
            left:0;
            pointer-events: none;
            transition:0.5s;
        }
        #inputbox input:valid ~ span,
        #inputbox input:focus ~ span{
            color:red;
            transform: translateY(-.7rem)translateX(.5rem);
            background: black;
            padding:0 .5rem;
            letter-spacing: .2rem;
        }
        #inputbox input:valid,
        #inputbox input:focus{
            border-color: aqua;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            justify-content: center;
            gap:2rem;
        }
       h2{
        text-transform:uppercase;
         color:white;
       }

 
    </style>
</head>

<body>
   
    <div id="container">
        <h2>Otp Form</h2>
        <?php
         $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
         if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $randotp = rand(1000,9999);
            $_SESSION['OTP'] = $randotp;
             $query = "UPDATE signup SET forgotpasswordotp = '$randotp' WHERE email = '$email' "; 
             $res = mysqli_query($conn,$query);
        //     $rows = mysqli_fetch_array($res);
        //    $name = $rows['name'];
             if($res){
                $subject ="OTP VERIFICATION";
                $body="HI ,Your Verification OTP is $randotp";
                $headers="FORM: Joydip Manna";
                if(mail($email,$subject,$body,$headers)){
                  echo "Mail Send";
                  header('location:Verifyotp.php');
                }
                else{
                    echo "Mail Not Send";
                }
             }

         }
        ?>
        <div class="items">
              <form method="post">
              <div id=inputbox><input type="email" name="email" id="" required><span>Enter Email</span></div>
            
            <input type="submit" name="submit" id="">
              </form>
        </div>
</body>

</html>