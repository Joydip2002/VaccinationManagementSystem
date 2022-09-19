<?php
session_start();
if(!isset( $_SESSION['HosUsername'])){
header('location:HospitalLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Patient Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/Signup.css" rel="stylesheet">
    </head>
    <body>
         <div id="p">
            <div id="c">
                <form action="" method="post">
                    <h1>Update Patient List</h1>
                     <?php
                        $conn = mysqli_connect('localhost','root','','VaccineManagementSystem');
                        $getid = $_GET['id'];
                        $selectquery = "SELECT * FROM appoinmentbook WHERE id = '$getid'";
                        $selectres = mysqli_query($conn,$selectquery);
                        $rows = mysqli_fetch_array($selectres);
                         
                        
                        if(isset($_POST['submit'])){
                            $vaccinename = $_POST['vaccinename'];
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $address = $_POST['address'];
                            $age = $_POST['age'];
                            $updatequery ="UPDATE appoinmentbook SET name = '$name', vaccinename = '$vaccinename', email = '$email', address = '$address', age ='$age' WHERE id = '$getid'";

                            $res = mysqli_query($conn,$updatequery);

                            if($res){
                                ?>
                                <script>
                                   alert("Updated Successfully");
                                   location.replace('PatientList.php');
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                <script>
                                   alert("Updated Unsuccessfully");
                                   location.replace('PatientList.php');
                                </script>
                                <?php
                            }
                               
                            }

                     ?>
                     
                  
                    <label for="">Vaccine Name</label>
                    <input type="text" name="vaccinename" value="<?php echo $rows['vaccinename']; ?>" id="" required>
                   
                    <label for="">Name</label>
                    <input type="text" name="name"   value="<?php echo $rows['name']; ?>"id="" required>
                    <label for="">Email</label>
                    <input type="email" name="email"  value="<?php echo $rows['email']; ?>"id="" required>
                    <label for="">Mobile No</label>
                    <input type="number" name="number"  value="<?php echo $rows['mobile']; ?>" id="" required>
                    <label for="">Address</label>
                    <input type="text" name="address"  value="<?php echo $rows['address']; ?>" id="" required>
                    <label for="">Age</label>
                    <input type="number" name="age"  value="<?php echo $rows['age']; ?>" id="" required>
                 
                    <input type="submit" name="submit" value ="Book" id="btn">
                </form>
            </div>
         </div>
    </body>
</html>