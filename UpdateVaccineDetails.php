<?php
session_start();
if(!(isset($_SESSION['HosUsername']) and isset($_SESSION['hospitalEmail']))){
    header('location:HospitalLogin.php');
}

?>
 <!DOCTYPE html>
 <html lang="en">
     <head>
         <title>Vaccine Update Form</title>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="css/Signup.css" rel="stylesheet">
         <style>
            style{
                border-radius: 5rem;
            }
         </style>
     </head>
     <body>
          <div id="p">
             <div id="c">
                 <form action="" method="post">
                     <h1>Vaccine Update Form</h1>
                      <?php
                         $conn = mysqli_connect('localhost','root','','VaccineManagementSystem');
                         if($conn){
                             echo "Connection Successful";
                         }
                         else{
                             echo "Connection Unsuccessful";
                         }
                         
                         if(isset($_POST['submit'])){
                            $hospitalname = $_POST['HosName'];
                            $hosemail = $_POST['hosemail'];
                            $vaccinedate =  $_POST['date'];
                            $vaccinetime = $_POST['time'];
                             $availability = $_POST['Availability'];
                             $vaccinename = $_POST['vaccinename'];

                             
                             $query = "UPDATE hospital SET vaccinestatus = '$availability',vaccinename = '$vaccinename', vaccinedate = '$vaccinedate', vaccinetime = '$vaccinetime' WHERE HospitalName = '$hospitalname' AND email = '$hosemail'";

                             $res = mysqli_query($conn,$query);

                             if($res){
                                ?>
                                    <script>
                                        alert('Updated Successfully');
                                    </script>
                                <?php
                             }
                             else{
                                ?>
                                <script>
                                    alert('Updated Unsuccessfully');
                                </script>
                            <?php
                             }
                         }
                       mysqli_close($conn);
                      ?>
                        <label for="">Hospital Name</label>
                     <input type="text" name="HosName" value="<?php echo $_SESSION['HosUsername'];?>" id="" required>
                     <label for="">Hospital Email</label>
                     <input type="email" name="hosemail" value="<?php echo $_SESSION['hospitalEmail'];?>" id="" required>
                     <label for="">Vaccinne Date</label>
                     <input type="date" name="date" id="" required>

                     <label for="">Vaccinne Time</label>
                     <input type="time" name="time" id="" required>

                     <label for="">Availability</label>
                     <select name="Availability" required>
                  
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                     </select>
                        
                     <label for="">Vaccine Name</label>
                     <select name="vaccinename">
                     
                        <option value="None">Unavailable</option>
                        <option value="Co-Vaccine">Co-Vaccine</option>
                        <option value="Covishield">Covishield</option>
                        <option value="Super Vaccine">Super_Vaccine</option>

                     </select>

                     <input type="submit" name="submit" id="btn">
                 </form>
             </div>
          </div>
     </body>
 </html>