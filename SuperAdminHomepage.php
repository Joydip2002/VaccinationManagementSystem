<?php
session_start();
if(!isset($_SESSION['adminName'])){
    header('location:SuperAdminLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Homepage</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html{
            font-size: 62.5%;
            font-family: sans-serif;
        }
        h3{
            font-size: 2.5rem;
            background-color: aqua;
            text-align: center;
        }
        #container{
            display: grid;
            /* border: .5rem solid black; */ 
            grid-template-columns: repeat(auto-fill,minmax(30rem,1fr));
            grid-template-rows: 20rem 20rem;
            gap: 1rem;
            margin: 5rem 10rem;
        }
        .item{
            background-color: blueviolet;
            border-radius: 5rem;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            justify-content: space-evenly;
            box-shadow: 0 0 1.1rem rgba(33, 33, 33, 2.2);
        }
        a{
            text-decoration: none;
            border: .1rem solid white;
            padding: 1rem;
            font-size: 1.5rem;
            font-weight: 700;
            border-radius: 5rem;
            transition: 1s;
        }
        a:hover{
           padding: 2rem;
           background-image: linear-gradient(60deg,rgb(255, 121, 3),rgb(255, 255, 255),rgb(0, 202, 87));
           border-color: lightskyblue;
           box-shadow: 0 0 1.1rem rgba(33, 33, 33, 2.2);
        }
        .t1{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            justify-content: space-evenly;
            grid-row: 1/3;
            background: linear-gradient(45deg,#efff11,#f4c030);
        }
        #adminimage{
            height: 10rem;
            width: 10rem;
            background-image: url(./Assets/baylor-covid-vaccine.jpg);
            background-size: cover;
            border-radius: 8rem;
        }
        .t2{
            background: linear-gradient(45deg,#086d35,#00ff72);
        }
        .t3{
            background: linear-gradient(45deg,#E91E63,#ed55ff);
        }
        .t5{
            background: linear-gradient(45deg,#f05a4f,#f4c030);
        }
        .opimage{
            height: 10rem;
            width: 10rem;
            background-image: url(./Assets/vaccine-tracker.png);
            background-size: cover;
        }
        
       @media (max-width:1120px) {
        #container{
            display: grid;
            grid-template-rows: 20rem 20rem 20rem 20rem;
        }
      }
        @media (min-width:240px)and(max-width:815px) {
        #container{
            display: grid; 
            grid-template-rows: 20rem 20rem 40rem 20rem 20rem 20rem;
        }  
       }
       @media (max-width:460px) {
        #container{
           margin: 2rem 5rem;
        }  
       }
       .t1 a{
        border:.2rem solid red;
        padding: .4rem;

       }
    </style>
</head>
<body>
     <h3>Welcome! <?php echo $_SESSION['adminName'];  ?></h3> 

     <div id="container">
          <div class="item t1">
            <div id="adminimage"></div>
            <h1>Super Admin</h1>
            <h2><?php echo $_SESSION['adminName']; ?></h2>
            <h4>Email : <?php echo $_SESSION['adminEmail']; ?></h4>
            <a href="Logout.php">Logout</a>
          </div>
          <div class="item t2">
            <div class="opimage"></div>
            <a href="HospitalRegistration.php">Add Hospital</a>
          </div>
          <div class="item t3">
            <div class="opimage"></div>
            <a href="AddAdminPage.php">Add Admin</a></div>
          <div class="item t4">
            <div class="opimage"></div>
            <a href="RequestHospital.php">Approved Request Hospital</a>
          </div>
          <div class="item t5">
            <div class="opimage"></div>
            <a href="CheckDates.php"> Vaccine Availability</a>
          </div>
     </div>
</body>
</html>