<?php
session_start();
?>
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
                    <td>Hospita lName</td>
                        <td>Patient Name</td>
                        <td>Vaccine Name</td>
                        <td>vaccination Status</td>
                        <td>Email</td>
                        <td>Mobile</td>
                        <td>Address</td>
                        <td>Age</td>
                        <td colspan="2">Operation</td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
                    $HospitalName = $_SESSION['HosUsername'];
                    // if($conn){
                    //     echo "Connection Successful";
                    // }
                     
                    $query = "SELECT * FROM appoinmentbook WHERE HospitalName = '$HospitalName' ";
                    $res = mysqli_query($conn,$query);
                    if($res != " "){
                        while($showdata = mysqli_fetch_array($res)){
                            ?>
                        <tr>
                        <td><?php echo $showdata['id'];  ?></td>
                        <td><?php echo $showdata['HospitalName'];  ?></td>
                        <td><?php echo $showdata['name'];  ?></td>
                        <td><?php echo $showdata['vaccinename'];  ?></td>
                        <td><?php echo $showdata['vaccinationstatus'];  ?></td>
                        <td><?php echo $showdata['email'];  ?></td>
                        <td><?php echo $showdata['mobile'];  ?></td>
                        <td><?php echo $showdata['address'];  ?></td>
                        <td><?php echo $showdata['age'];  ?></td>
                        <td> <a href="UpdatePatient.php?id=<?php echo $showdata['id'];?>">Update</a></td>
                        <td> <a href="DeletePatient.php?id=<?php echo $showdata['id'];?>">Delete</a></td>

                    </tr>
 
                           <?php
                          
                        }
                    }
                       
                   ?>
                </tbody>
               </table>
        </div>
      </div>
</body>
</html>