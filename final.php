<?php
    $server="localhost";
    $username="root";
    $password="";
    $db="rental";
    $conn=new mysqli($server,$username,$password,$db);
    if($conn->connect_error){   
         die("Connection failed: ".$conn->connect_error);
    }
    $id=isset($_POST['carid']) ? $_POST['carid'] : '';
    $sd=isset($_POST['sd']) ? $_POST['sd'] : '';
    $ed=isset($_POST['ed']) ? $_POST['ed'] : '';
    $name=isset($_POST['name']) ? $_POST['name'] : '';
    $email=isset($_POST['email']) ? $_POST['email'] : '';
    $phone=isset($_POST['phone']) ? $_POST['phone'] : '';
    $q="insert into bookings(carid,start_date,end_date,name,email,phone) values('$id','$sd','$ed','$name','$email','$phone')";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⭐</text></svg>">
    <link rel="stylesheet" href="page2.css"></link>
    <title>Star Rentals</title>
    <style>
        body{
            background-color:#ffffff;
        }
        #container{
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
            flex-direction:column;
        }
        img{
            height:30%;
        }
        h2{
            color:red;
        }
        #hs{
            color:green;
        }
    </style>
</head>
<body>
    <div id="container">
        <img src="images/confirm.jpg">
    <?php
    if($conn->query($q)===TRUE){
        echo"<h2 id='hs'>Booking Confirmed!</h2>";
        echo"<h2>Thank you, ".$name." for booking with us.</h2>";
        echo"<h2 style='color:blue'>Check out your mail for the details.</h2>";
        echo"<h2>Have a safe journey!</h2>";
        echo"<p>-Team star Rentals</p>";
        $conn->close();
    } else{
        echo"Error: ".$q."<br>".$conn->error;
    }
    ?>
    </div>
</body>
</html>
<?php
$to = $email;
$subject = "Bokking Confirmation - Star Rentals";
$message = "Hello ".$name."\n Your booking is confirmed from ".$sd." to ".$ed.". \nWe look forward to serving you.\nReach out to our place to pick up your vehicle.\nMail us for any queries\nThank you for Trusting us.\nHave a Safe Journey\n\n- Team Star Rentals";
$headers = "From: StarRentals@gmail.com";
mail($to, $subject, $message, $headers);
?>