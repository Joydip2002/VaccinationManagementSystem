<?php
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Superadmin Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/Signup.css" rel="stylesheet">
    </head>
    <body>
         <div id="p">
            <div id="c">
                <form action="" method="post">
                    <h1>Superadmin Registration Form</h1>
                    <?php
                    $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
                    if($conn){
                        echo "Connection Successful";
                    }
                    else{
                        echo "Connection Un-sucessful";
                    }

                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $adminemail = $_POST['email'];
                        $mobile = $_POST['number'];
                        $address = $_POST['address'];
                        $password = $_POST['password'];
                        $repassword = $_POST['repassword'];
                        
                        $encryptpassword = password_hash($password,PASSWORD_BCRYPT);
                        $query = "SELECT * FROM superadmin WHERE email = '$adminemail' ";

                        $res = mysqli_query($conn,$query);

                        $emailCount = mysqli_num_rows($res);

                        if($emailCount > 0){
                            ?>
                            <script>
                                alert("Email Already Exists");
                            </script>
                            <?php
                        }
                        else{
                             if($password === $repassword){
                                $insertQuery = "INSERT INTO superadmin(Name, email, mobile, address, password) VALUES ('$name','$adminemail','$mobile','$address','$encryptpassword')";

                                $res2 = mysqli_query($conn,$insertQuery);

                                if($res2){
                                 ?>
                                 <script>
                                    alert("Registration Successful");
                                    location.replace('SuperadminLogin.php');
                                 </script>
                                 <?php
                                }
                                else{
                                    ?>
                                    <script>
                                       alert("Registration Unsuccessful");
                                      
                                    </script>
                                    <?php
                                }
                             }
                             else{
                                ?>
                                <script>
                                   alert("Password Mismatch");
                                </script>
                                <?php
                             }
                        }

                    }


                    ?>
                    <label for="">Name</label>
                    <input type="text" name="name" id="" required >
                  
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required >
                    <label for="">Mobile No</label>
                    <input type="number" name="number" id="" required >
                    <label for="">Address</label>
                    <input type="text" name="address" id="" required >
                    <label for="">Password</label>
                    <input type="password" name="password" id="" required >
                    <label for="">Re-Enter Password</label>
                    <input type="Password" name="repassword" id="" required >
                    <input type="submit" name="submit" id="btn">
                </form>
            </div>
         </div>
    </body>
</html>