<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Schedule Page</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html{
            font-size: 62.5%;
        }
        #p{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
           
        }
        #c{
            margin: 0 5rem;
            background-color: aqua;
           
        }
        td{
            padding: 1rem;
            font-size: 2rem;
        }
        a{
            text-decoration: none;
            /* border:.2rem solid blue; */
            background-color: lightblue;
            padding: 1rem;
            border-radius: 1rem;
        }
        a:hover{
            cursor: pointer;
            background:linear-gradient(75deg,orange,yellow);
            box-shadow:0 0 1.1rem rgba(33, 33, 33, 2.2) ;
        }
        tbody{
            margin: 0rem 5rem;
        }
    </style>
</head>
<body>
      <div id="p">
        <div id="c">
               <table border="1rem">
                <thead>
                    <tr>
                    <td>Id</td>
                        <td>Hospital Name</td>
                        <td>Mobile No</td>
                        <td>Location</td>
                        <td>Address</td>
                        <td>Vaccine Date</td>
                        <td>Vaccine Time</td>
                        <td>Vaccine Name</td>
                        <td>Vaccine Status</td>
                        <td colspan="2">Operation</td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

                    // if($conn){
                    //     echo "Connection Successful";
                    // }

                    $query = "SELECT * FROM hospital";
                    $res = mysqli_query($conn,$query);
                    if($res != " "){
                        while($showdata = mysqli_fetch_array($res)){
                            ?>
                        <tr>
                        <td><?php echo $showdata['id'];  ?></td>
                        <td><?php echo $showdata['HospitalName'];  ?></td>
                        <td><?php echo $showdata['mobile'];  ?></td>
                        <td><?php echo $showdata['Location'];  ?></td>
                        <td><?php echo $showdata['address'];  ?></td>
                        <td><?php echo $showdata['vaccinedate'];  ?></td>
                        <td><?php echo $showdata['vaccinetime'];  ?></td>
                        <td><?php echo $showdata['vaccinename'];  ?></td>
                        <td><?php echo $showdata['vaccinestatus'];  ?></td>
                     
                         
                      
                        <td> <a href="BookNow.php?id=<?php  echo $showdata['id']; ?>">BookNow</a></td>

                    </tr>
 
                           <?php
                           $_SESSION['vaccinedate'] = $showdata['vaccinedate'];
                        }
                    }
                       
                   ?>
                </tbody>
               </table>
        </div>
      </div>
</body>
</html>