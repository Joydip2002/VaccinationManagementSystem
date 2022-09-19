<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Booking Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/Signup.css" rel="stylesheet">
    </head>
    <body>
         <div id="p">
            <div id="c">
                <form action="" method="post">
                    <h1>Booking Form</h1>
                     <?php
                        $conn = mysqli_connect('localhost','root','','VaccineManagementSystem');
                     
                        $getid  = $_GET['id'];
                        $selectQuery = "SELECT * FROM hospital WHERE id = '$getid'";
                        $queryRes = mysqli_query($conn,$selectQuery);
                        
                        $rows = mysqli_fetch_array($queryRes);
                        
                        if(isset($_POST['submit'])){
                            $hospitalname = $_POST['hospitalname'];
                            $vaccinename = $_POST['vaccinename'];
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $address = $_POST['address'];
                            $age = $_POST['age'];

                
                            $query = "SELECT * FROM appoinmentbook WHERE email = '$email'";

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
                                
                                    $insertquery = "INSERT INTO appoinmentbook (hospitalname,name,vaccinename,email,mobile,address,age,vaccinationstatus) VALUES ('$hospitalname','$name','$vaccinename','$email','$number','$address','$age','Not Vaccinated')";

                                    $res2 = mysqli_query($conn,$insertquery);

                                    if( $res2){
                                        ?>
                                        <script>
                                            alert("Booking Successful");
                                            location.replace("BookShedule.php");
                                        </script>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <script>
                                            alert("Booking Failed!");
                                        </script>
                                        <?php
                                    }
                                }
                               
                            }

                     ?>
                    <label for="">Hospital Name</label>
                    <input type="text" name="hospitalname" value="<?php echo $rows['HospitalName']; ?>" id="" required>
                    
                    <label for="">Vaccine Name</label>
                    <input type="text" name="vaccinename" value="<?php echo $rows['vaccinename']; ?>" id="" required>
                   
                    <label for="">Name</label>
                    <input type="text" name="name" id="" required>
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required>
                    <label for="">Mobile No</label>
                    <input type="number" name="number" id="" required>
                    <label for="">Address</label>
                    <input type="text" name="address" id="" required>
                    <label for="">Age</label>
                    <input type="number" name="age" id="" required>
                 
                    <input type="submit" name="submit" value ="Book" id="btn">
                </form>
            </div>
         </div>
    </body>
</html>