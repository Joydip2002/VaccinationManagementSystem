<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/Signup.css" rel="stylesheet">
    </head>
    <body>
         <div id="p">
            <div id="c">
                <form action="" method="post">
                    <h1>SignUp Form</h1>
                     <?php
                        $conn = mysqli_connect('localhost','root','','VaccineManagementSystem');
                        if($conn){
                            echo "Connection Successful";
                        }
                        else{
                            echo "Connection Unsuccessful";
                        }
                        
                        if(isset($_POST['submit'])){
                           
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $address = $_POST['address'];
                            $password = $_POST['password'];
                            $repassword = $_POST['repassword'];

                            $encryptpass = password_hash($password,PASSWORD_BCRYPT);

                            $query = "SELECT * FROM signup WHERE email = '$email'";

                            $res = mysqli_query($conn,$query);

                            $emailcount = mysqli_num_rows($res);

                            if($emailcount > 0){
                                ?>
                                        <script>
                                            alert("Email Already Exists");
                                        </script>
                                        <?php
                            }
                            else{
                                if($password == $repassword){
                                    $insertquery = "INSERT INTO signup (name,email,mobile,address,password) VALUES ('$name','$email','$number','$address','$encryptpass')";

                                    $res2 = mysqli_query($conn,$insertquery);

                                    if( $res2){
                                        ?>
                                        <script>
                                            alert("Registration Successful");
                                            location.replace("AllLoginPage.php");
                                        </script>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <script>
                                            alert("Registration Unsuccessful!");
                                        </script>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <script>
                                        alert("Password Don't Match");
                                    </script>
                                    <?php
                                }
                            }
                        }

                     ?>
                    <label for="">Name</label>
                    <input type="text" name="name" id="" required>
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required>
                    <label for="">Mobile No</label>
                    <input type="number" name="number" id="" required>
                    <label for="">Address</label>
                    <input type="text" name="address" id="" required>
                    <label for="">Password</label>
                    <input type="password" name="password" id="" required>
                    <label for="">Re-Enter Password</label>
                    <input type="Password" name="repassword" id="" required>
                    <input type="submit" name="submit" id="btn">
                </form>
            </div>
         </div>
    </body>
</html>