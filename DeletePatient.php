<?php
$conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
$id = $_GET['id'];
$Deletequery = "DELETE FROM  appoinmentbook WHERE id = '$id'";

$res = mysqli_query($conn,$Deletequery);
if($res){
     ?>
     <script>
        alert("Deleted Successfully");
        location.replace('PatientList.php');
     </script>
     <?php
}
else{
    ?>
    <script>
       alert("Deleted Unsuccessfully");
    //    location.replace('PatientList.php');
    </script>
    <?php
}
?>