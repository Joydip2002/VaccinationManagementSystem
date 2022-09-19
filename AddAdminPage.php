<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #p{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        #c{
            /* height: 30rem; */
            /* width:20rem; */
            background-color: aqua;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 1rem;
           
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 5rem;
        }
        input{
            border-radius: .5rem;
            padding: 0.5rem 1rem;
            margin: .4rem;
            outline: none;

        }
        h2{
            margin-top: 1rem;
        }
        #btn{
            color: rgb(0, 0, 0);
            font-weight: 700;
            font-size:1rem;
            transition: 1;
        }
        #btn:hover{
            background-color: blueviolet;
            letter-spacing: .2rem;
        }

    </style>
</head>
<body>
    <div id="p">
        <div id="c">
            <h2>Add Admin Form</h2>
            <?php
            $conn = mysqli_connect('localhost','root','','vaccinemanagementsystem');
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                $encryptpass = password_hash($password,PASSWORD_BCRYPT);
                $query ="SELECT * FROM admin WHERE email = '$email'";
                $res = mysqli_query($conn,$query);
                $emailcount = mysqli_num_rows($res);

                if($emailcount > 0){
                  ?>
                    <script>
                        alert("Email Is Already Exist");
                    </script>
                  <?php
                }
                else{
                    if($password == $cpassword){
                        $query1 = "INSERT INTO admin (name,mobile,email,address,password) values ('$name','$mobile','$email','$address','$encryptpass')";
                        $res1 = mysqli_query($conn,$query1);
                        if($res1){
                            ?>
                    <script>
                        alert("Admin Added");
                    </script>
                      
                         <?php
                         $subject="Admin Approval";
                         $body = "Hi $name now you are admin Your Pasword is $password";
                         $headers="From: Joydip Manna";
                         if(mail($email,$subject,$body,$headers)){
                            echo "Mail Send";
                            header('location:AdminPage.php');
                         }
                         else{
                            echo "Mail Send Failed";
                         }
                        }
                        else{
                            ?>
                            <script>
                                alert("Admin Added Unsuccessful");
                            </script>
                              
                                 <?php
                        }

                    }
                    else{
                        ?>
                        <script>
                            alert("Password Mismatch");
                        </script>
                          
                             <?php
                    }
                }

                

            }
            ?>
            <form method="post">
                 <input type="text" name = "name" placeholder="Enter Admin Name">
                 <input type="number" name="mobile" id="" placeholder="Enter Mobile Number">
                 <input type="email" name="email" id="" placeholder="Enter Admin Email">
                 <input type="Address" name="address" id="" placeholder="Enter Address">
                 <input type="password" name="password" id="" placeholder="Enter Password">
                 <input type="password" name="cpassword" id="" placeholder="Re-Enter Password">
                 <input type="submit" name="submit" id="btn">
            </form> 
        </div>
    </div>
</body>
</html>