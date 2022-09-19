<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Dates</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        #container{
             
       
            /* display: grid;
            grid-template-columns: repeat(3,1fr);
            grid-template-rows: 10rem;
            gap: 1rem; */
            
            display: grid;
            /* border: .5rem solid black; */ 
            grid-template-columns: repeat(auto-fill,minmax(50rem,1fr));
            grid-template-rows: 10rem 10rem;
            gap: .5rem;
            /* margin: 5rem 5rem; */
            background-color: aqua;
        }
        .items{
            /* height: 5rem; */
            /* width: 5rem; */
            background-color: rgb(52, 211, 229);
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            justify-content: center;
         
            
        }
        .d2{
            height: 5rem;
            width: .5rem;
            background-color: rgb(0, 99, 142);
        }
        .d3{
            padding:0 2rem ;
            margin: 1rem;
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;
            
        }
        h3{
            margin: 1rem;
        }
        h2{
            margin-top:5rem;
            text-align: center;
            background-color: red;
        }
        a{
            text-decoration: none;
            border: .1rem solid black;
            padding: .5rem 1rem;
            border-radius: .5rem;
            text-transform: uppercase;
            transition: 0.5;
        }
        a:hover{
            background-color: violet;
            cursor:pointer;
            
            box-shadow:0 0 1.1rem rgba(33, 33, 33, 2.2);
        }
    </style>
</head>
<body>
<h2>List Of Time And Date</h2>
     <div id="container">
        <?php
            $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');



            $query = "SELECT * FROM hospital";
            $res = mysqli_query($conn,$query);

            if($res != " "){
                while($rows = mysqli_fetch_array($res)){
                    ?>
                      <div class="items">
                        
                      <div class="details">
                      <h3>HospitaName:<?php echo $rows['HospitalName']  ?></h3>
                      </div>

                    <div class="details d2">
                    
            
                    </div>

                    <div class="details d3">
                       <h3>Vaccination Date: <?php echo $rows['vaccinedate']  ?></h3>
                       <h3>Vaccination Time:<?php echo $rows['vaccinetime']  ?></h3>
                       
                     </div>
                     <div id="booknow">
                     <a href="BookShedule.php">ScheduleList</a>
                     </div>
          

                    </div>


                  <?php
                }
            }
        ?>
     </div>
</body>
</html>