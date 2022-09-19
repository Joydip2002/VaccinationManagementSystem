<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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
           gap:2rem;
        }
          h2{
            text-transform: uppercase;
            color:white;
          }
        .items {
            width: 20rem;
             height: 10rem;
            background-color: rgb(52, 211, 229);
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            justify-content: center;
            border-radius:1rem;
            gap:1rem;

        }
        #inputbox{
            position:relative;
        }
        input{
           
            padding: 1rem;
            outline: none;
             
        }
        span{
            position:absolute;
            padding: 1rem;
            left:0;
            pointer-events:none;
            transition:0.5s;
        }
        input:valid ~ span,
        input:focus ~ span{
            color:yellow;
            background:black;
            padding:0 1rem;
            transform: translateY(-.6rem) translateX(.5rem);
            letter-spacing: .2rem;
        }
        form{
            display: flex;
            flex-direction: column;
            /* justify-content: space-evenly; */
            gap:1rem;
            align-items: center;
            justify-content: center;
        }
      

 
    </style>
</head>

<body>
   
    <div id="container">
        <h2>Verify Otp Form</h2>
        <?php
         $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
         if(isset($_POST['submit'])){
            $otp = $_POST['otp'];
         
             $query = "SELECT * FROM signup;"; 
             $res = mysqli_query($conn,$query);
       
             if($res){
                $rows = mysqli_fetch_array($res);
                $dbotp = $rows['forgotpasswordotp'];

                if($otp == $dbotp){
                   header('location:ForgetPassword.php');
                }
                else{
                    ?>
                    <script>
                        alert("Invalid OTP");
                    </script>
                    <?php
                }
             }

         }
        ?>
        <div class="items">
              <form method="post">
              <div id="inputbox">
              <input type="number" name="otp" id="" required><span>Enter Otp</span>
              </div>
            
            <input type="submit" name="submit" id="">
              </form>
        </div>
</body>

</html>