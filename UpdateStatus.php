<?php
session_start();
if(!isset( $_SESSION['HosUsername'])){
    // header('location:HospitalLogin.php');
}
$conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

$getid = $_GET['id'];

$Updatequery = "UPDATE appoinmentbook SET VACCINATIONSTATUS = 'Vaccinated' WHERE id = '$getid' ";

$res = mysqli_query($conn,$Updatequery);
if($res){
    ?>
    <script>
        alert("Updated Successfully!");
        location.replace('VaccineStatusUpdate.php');
    </script>

    <?php
}
else{
    ?>
    <script>
        alert("Updated Unsuccessfully!")
    </script>

    <?php
}
?>