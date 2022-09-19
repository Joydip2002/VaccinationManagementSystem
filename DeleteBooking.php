<?php
session_start();

$conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
$idDelete = $_GET['id'];
$query = "DELETE FROM hospital WHERE ID = '$idDelete'";
$resdelete = mysqli_query($conn,$query);
if($resdelete){
    ?>
<script>
    alert("Delete Successful!");
</script>

<?php
}
else{
    ?>

    <script>
    alert("Delete Successful!");
</script>

<?php
}

?>