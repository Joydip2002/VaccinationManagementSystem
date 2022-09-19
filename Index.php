<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:AllLoginPage.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        :root{
            --navColor:black;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-image:linear-gradient(90deg,red,green,yellow);
        }
        html{
            font-size: 62.5%;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 5rem;
            background: var(--navColor);
            position: sticky;
            top: 0;
            z-index: 1;

        }

        #cnav {
            width: 70rem;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: space-evenly;
            /* background-color: white; */
        }
        a{
            text-decoration: none;
            color: white;
        }
        /* a:hover{
            color: red;
        } */
        #container{
             
            /* height: 30rem;
            width: 50rem; */
            /* background-color:aqua; */
            /* margin: 2rem auto; */
            display: grid;
            grid-template-columns: repeat(4,1fr);
            grid-template-rows: 30rem 20rem 20rem;
            gap: 1rem;
            margin: 1rem;
        }
        .item{
            
            background-color: rgb(14, 255, 151);
             
        }
        .t1{
            grid-column:1/ span 3;
            background-image: url(./Assets/vaccination-banner-large.png);
            background-size: 100rem;

        }
        .t1{
           display: flex;
           justify-content: center;
           align-items: center;
            text-align: center;
          
        }
        .t1 a {
            opacity:0;
            padding:0.5rem 2rem;
            font-size:2rem;
            color:black;
            font-weight: 800;
        }
        .t1:hover a{
            
            opacity:5;
            cursor: pointer;
        }
        .t4{
            grid-row: 2/4;
            grid-column: 2/3;
        }
   
        .t2,.t3,.t4,.t5,.t6,.t7,.t8,.t9{
            font-size: 1.5rem;
            font-weight: 700;
            font-family: sans-serif;
            opacity: .8;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            justify-content: space-evenly;
            background:linear-gradient(45deg,#036eb7,#64eaff);
            border-radius: 2rem;
            box-shadow:  0 0 1.1rem rgba(33, 33, 33, 2);
        }
        .t3{
            background: linear-gradient(45deg,#E91E63,#ed55ff);
        }
        
        /* .t4{
            background: linear-gradient(45deg,#E91E63,#ed55ff);
        } */
        .t5{
            background: linear-gradient(45deg,#086d35,#00ff72);
        }
        .t6{
            background: linear-gradient(45deg,#f05a4f,#f4c030);
        }
        label{
            font-size: 2rem;
            /* animation: animate 2s linear infinite; */
            animation-direction:alternate-reverse;
            background-color: azure;
            padding: 0 2rem;
            border-radius:.5rem;
        }
        @keyframes animate {
            0%{
               
                transform: translateX(2rem);
                
            }
            100%{
                transform: translateX(-2rem);
            }
           
        }
        p{
            margin: 3rem;
        }
        a{
            border:.1rem solid black;
            padding: 1rem;
            border-radius: 2rem;
            transition: 1.5s;
        }
        a:hover{
            background-image: conic-gradient(from 90deg,red,orange);
            box-shadow: 0 0 0 rgba(145, 145, 145, 0.2);
            transform: translateY(-1rem);
        }
        ion-icon{
            /* font-size: 1.5rem; */
            color: rgb(53, 0, 214);
            animation: animate .5s linear infinite  alternate;
        }
        @keyframes animate {
            0%{
                
                transform: translateX(.5rem);
            }
            100%{
               
                transform: translateX(-1rem);
            }
        }
        .t4{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .t4 p{
            font-size: 2rem;
            font-weight: 800;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input,textarea{
            margin: .7rem;
            padding: .7rem;
            border-radius: 2rem;
        }
        #btn:hover{
            cursor: pointer;
            background-color: #00ff72;
        }
      
        @media (max-width:1025px) {
            #container{
                display: flex;
                flex-direction: column;
                margin:1rem;
                
            }
        

        }
        @media (max-width:300px) {
            #container{
                margin: 2rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div id="cnav">
            <h2><a href="Index.php">Home</a></h2>
         
            <h2><a href="#">About</a></h2>
            
            <h2><a href="#">Contact</a></h2>
            <h2><a href="Logout.php">Logout</a></h2>
            <!-- <h2><a href="#"></a></h2> -->
        </div>
     </nav>

     <main>
        <div id="container">
            <div class="item t1">
                <a href="https://www.who.int" id="KM">Know More</a> 
            </div>
            <div class="item t2">
                <label>Details Of Patient</label>
                <p>You Can Check Patient Details here. Please click the Button given Below. If you not find the details, then your registration not successfully submitted.</p>
                <a href="CheckDetails.php"> <ion-icon name="caret-forward-outline"></ion-icon>Check Details</a>
            </div>
            <div class="item t3">
                <label>Vaccination Dates</label>
                <p>You Can Check Vaccination Date here. Please click the Button given Below. If you find Vaccination Date.</p>
                <a href="CheckDates.php"> <ion-icon name="caret-forward-outline"></ion-icon> Check Dates</a>
            </div>
            <div class="item t4">
                <p>Request For Hospital</p>
                <?php
                  $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
                //   if($conn){
                //     echo "Connection Successful";
                //   }
                //   else{
                //     echo "Connection Unsuccessful";
                //   }

                  if(isset($_POST['submit'])){
                   $Hospitalname = $_POST['hospitalname'];
                   $hospitalemail = $_POST['hospitalemail'];
                   $location = $_POST['location'];
                   $reason = $_POST['reason'];
               

                   $query = "SELECT * FROM requesthospital WHERE hospitalemail = '$hospitalemail'";
                   $res = mysqli_query($conn,$query);
                   
                   $emailcount = mysqli_num_rows($res);

                   $query1 = "SELECT * FROM requesthospital WHERE HospitalName = '$Hospitalname'";
                   $res1 = mysqli_query($conn,$query1);
                   
                   $hospitalNameCount = mysqli_num_rows($res1);

                   if($emailcount > 0){
                    ?>
                     <script>
                        alert("Email Already Exist");
                     </script>
                    <?php
                   }
                   elseif($hospitalNameCount > 0){
                    ?>
                     <script>
                        alert("This Hospital Name is Already Exist");
                     </script>
                    <?php
                   }
                   else{
                         $insertQuery = "INSERT INTO requesthospital (HospitalName,hospitalemail,Location,Reason) VALUES ('$Hospitalname','$hospitalemail','$location','$reason')";

                         $res2 = mysqli_query($conn,$insertQuery);

                         if($res2){
                            ?>
                            <script>
                               alert("Your Request Is Submitted");
                            </script>
                           <?php
                         }
                         else{
                            ?>
                            <script>
                               alert("Request Is Failed");
                            </script>
                           <?php
                         }
                   }
                  }
                ?>
                <form action="" method="post">
                    
                    <input type="text" name="hospitalname" id="" placeholder="Enter Hospital Name" required>
                     <input type="email" name="hospitalemail" id="" placeholder="Enter Hospital Email" required>
                    <input type="text" name="location" id="" placeholder="Enter Location" required>
                 
                     <textarea rows="5" cols="20" placeholder="Request Reason" name="reason" required></textarea>
                     
                   

                    <input type="submit" name="submit" id="btn">
                </form>
            </div>
            <div class="item t5">
                <label>Book Schedule</label>
                <p>You Can Check Book Schedule Vaccination Date here. Please click the Button given Below. If you Book Schedule.</p>
                <a href="BookShedule.php"> <ion-icon name="caret-forward-outline"></ion-icon>Book Schedule</a>
            </div>
            <div class="item t6">
                <label>Report</label>
                <p>You Can Download Report here. Please click the Button given Below. If you Doenload Report.</p>
                <a href="#"> <ion-icon name="caret-forward-outline"></ion-icon>Download Report</a>
            </div>
            <div class="item t7">
                <label>Pharmeacy</label>
                <p>You Can Download Report here. Please click the Button given Below. If you Doenload Report.</p>
                <a href="#"> <ion-icon name="caret-forward-outline"></ion-icon>Download Report</a>
            </div>
            <div class="item t8">     <label>Services</label>
                <p>You Can Download Report here. Please click the Button given Below. If you Doenload Report.</p>
                <a href="#"> <ion-icon name="caret-forward-outline"></ion-icon>Learn More</a></div>
            <div class="item t9">
                <label>About Us</label>
                <p>You Can Download Report here. Please click the Button given Below. If you Doenload Report.</p>
                <a href="#"> <ion-icon name="caret-forward-outline"></ion-icon>Learn More</a>
            </div>
        </div>
     </main>

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>