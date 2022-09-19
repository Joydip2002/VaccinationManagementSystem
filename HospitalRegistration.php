<?php
session_start();  
?>

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
                    $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
                    if($conn){
                        echo "Connection Successful";
                    }
                    else{
                        echo "Connection Un-successful";
                    }

                    if(isset($_POST['submit'])){
                        $hname = $_POST['name'];
                        $location = $_POST['location'];
                        $email = $_POST['email'];
                        $mobile = $_POST['number'];
                        $address = $_POST['address'];
                        $vaccineStatus = $_POST['vaccinestatus'];
                        // $_SESSION['vaccinestatus'] =  $_POST['vaccinestatus'];
                        $vaccinename = $_POST['vaccinename'];
                        $vaccinedate = $_POST['date'];

                        $_SESSION['vaccinedate'] =  $_POST['vaccinesdate'];

                        $vaccinetime = $_POST['time'];
                        $_SESSION['vaccinetime'] =  $_POST['vaccinestime'];

                        $password = $_POST['password'];
                        $repassword = $_POST['repassword'];
                        
                        $encryptpassword = password_hash($password,PASSWORD_BCRYPT);
                        $query = "SELECT * FROM hospital WHERE email = '$email' ";

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
                                $insertQuery = "INSERT INTO hospital (HospitalName, Location, email, mobile, address, vaccinestatus, vaccinename,vaccinedate,vaccinetime, password) VALUES ('$hname','$location','$email','$mobile','$address','$vaccineStatus','$vaccinename', '$vaccinedate','$vaccinetime','$encryptpassword')";

                                $res2 = mysqli_query($conn,$insertQuery);

                                if($res2){
                                 ?>
                                 <script>
                                    alert("Registration Successful");
                                    location.replace('HospitalLogin.php');
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
                    <label for="">Hospital Name</label>
                    <input type="text" name="name" id="" required >
                    <label for="">Hospital Location</label>
                    <input type="text" name="location" id="" required >
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required >
                    <label for="">Mobile No</label>
                    <input type="number" name="number" id="" required >
                    <label for="">Address</label>
                    <input type="text" name="address" id="" required >
                    <label for="">Vaccine Availability</label>
                     <select name="vaccinestatus">
                     <option value="None">--Select--</option>
                        <option value="Available" >Available</option>
                        <option value="Unavailable">Unavailable</option>
                     </select>

                     <label for="">Vaccine Name</label>
                     <select name="vaccinename">
                     <option value="None">--Select--</option>
                        <option value="Co-Vaccine">Co-Vaccine</option>
                        <option value="Covishield">Covishield</option>
                        <option value="Super Vaccine">Super_Vaccine</option>

                     </select>
                    <label for="">Vaccination Date(Optional)</label>
                     <input type="date" name="date" id="">
                     <label for="">Vaccination Time(Optional)</label>
                     <input type="time" name="time" id="">
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