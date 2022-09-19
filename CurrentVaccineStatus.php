<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Vaccine Status</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        #p{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        #c{
            height: 15rem;
            width: 20rem;
            border-radius: 3rem;
            background-color: aquamarine;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
            justify-content:space-evenly;
        }
        h4{
            margin:1rem;
        }
    </style>
</head>
<body>
    <div id="p">
        <div id="c">
           <div><h2><?php echo $_SESSION['HosUsername']; ?></h2></div>
           <?php
           $hospitalname = $_SESSION['HosUsername'];
           $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
           $query = "SELECT * FROM hospital WHERE HospitalName = '$hospitalname'";
           $res = mysqli_query($conn,$query);
           $rows = mysqli_fetch_array($res);
           ?>
           <div>
           <h4>Vaccine Name: <?php echo $rows['vaccinename'] ?></h4>
            <h4>Vaccine Status: <?php echo $rows['vaccinestatus'] ?></h4>
           
           </div>
        </div>
    </div>
</body>
</html>