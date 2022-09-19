<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requet Hospital Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: aquamarine;
        }
        #p{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
           
        }
        #c{
            /* height: 10rem;
            width: 40rem; */
            background-color: aqua;
        }
        td{
            text-align: center;
            padding: 0 4rem;
        }
        h3{
            text-align: center;
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
    <div id="p">
        <div id="c">
            <h3>Request Hospital List</h3>
            <table border=".2rem">
                <thead>
                    <tr>
                        <th>Hospital Name</th>
                        <th>Hospital Email</th>
                        <th>Location</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');

                    $query  = "SELECT * FROM requesthospital";
                    $res = mysqli_query($conn,$query);

                    if($res !=""){
                        while($rows = mysqli_fetch_array($res)){
                            ?>
                             <tr>
                                <td><?php echo $rows['HospitalName']; ?></td>
                                <td><?php  echo $rows['hospitalemail'] ?></td>
                                 <td><?php  echo $rows['Location'] ?></td>
                                 <td><?php  echo $rows['Reason'] ?></td>
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