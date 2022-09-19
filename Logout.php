<?php
session_start();

session_destroy();
?>
<script>
    alert('Logout Successfull');
</script>
<?php
header('location:AllLoginPage.php');


?>