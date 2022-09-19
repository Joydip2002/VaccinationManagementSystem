<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vaccination Status</title>
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background: rgb(204, 204, 205);
            background: linear-gradient(90deg,orange,white,green);
        }
        #p{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }
        #c {
          
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: blueviolet;
            flex-direction: column;
            border-radius: 2rem;
        }
        form{
            margin: 5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        input{
            margin: 1rem;
            padding: 1rem;
            border-radius: 1rem 0rem 1rem 0rem;
            outline: none;
        }
        p{
            /* margin: 1rem;
            font-size: 5rem;
            font-weight: 900;
            color: aliceblue;
            position: absolute;
            top: 1rem;
            background-image: url(/Assets/wave1.png);
            background-repeat: repeat-x;
            content: '';
            -webkit-background-clip: text;
            animation: wave 1s linear infinite; */
            margin: 0;
            padding: 0;
            text-transform: uppercase;
            font-size: 5rem;
            color: rgb(255,255,255,.1);
            background-image: url(/Assets/wave.png);
            background-repeat: repeat-x;
            -webkit-background-clip: text;
            animation: animate 5s linear infinite;
            animation-direction: alternate;
            font-weight: 900;
        }
        @keyframes animate {
            0%{
                background-position: left 0px bottom 0px;
            }
            40%{
                background-position: left 800px bottom 10px;
            }
            80%{
                background-position: left 1200px bottom 20px;
            }
            100%{
                background-position: left 2400px bottom 30px;
            }
        }
        table{
            margin:0rem 5rem;
           
        }
        table td{
            padding: 1rem;
        }
        th{
            background-color: white;
            color:blue;
        }
        tbody{
            background-color: greenyellow;
        }
        a{
            border:.1rem solid black;
            text-decoration:none;
            border-radius:1rem;
            padding: 1rem;
        }
        a:hover{
            background-color: black;
            color: white;
            box-shadow:0 0 1.1rem rgba(33,33,33,2.2);
        }
    </style>
</head>
<body>
    <div id="p">
        <p>Update Vaccination Status</p>
        <div id="c">
           
           <form action="" method="post">
           <input type="text" name="hospitalname" id="" placeholder="Enter Hospital Name" value="<?php echo $_SESSION['HosUsername'];?>">
            <input type="email" name="email" id="" placeholder="Enter Register Email id">
            <input type="submit" name="submit" id="">
           </form>
        </div>
        <?php
            $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
            
            if(isset($_POST['submit'])){
                $hospitalname = $_POST['hospitalname'];
                $email = $_POST['email'];
                $_SESSION['uEmail'] = $email;
                $query = "SELECT * FROM appoinmentbook WHERE email = '$email' AND HospitalName = '$hospitalname' ";
                $res = mysqli_query($conn,$query);

                if($res){
                    if($row = mysqli_fetch_array($res)){
                        ?>
                         <table border=".3rem">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Vaccine Name</th>
                                  
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['vaccinename']; ?></td>
                                   
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td> <?php echo $row['vaccinationstatus']; ?> </td>
                                    <td><a href="UpdateStatus.php?id=<?php echo $row['id']; ?>">UpdateStatus</a></td>
                                     
                                </tr>
                            </tbody>        
                         </table>

                        <?php
                    }
                    else{
                        ?>
                          <script>
                            alert("Please Provide Correct Infomation");
                          </script>
                        <?php
                    }
                }
            }

            ?>

    </div>


</body>
</html>