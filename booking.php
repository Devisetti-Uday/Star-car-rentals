<?php
   $server="localhost";
   $username="root";
   $password="";
   $db="rental";
   $conn=new mysqli($server,$username,$password,$db);
    if($conn->connect_error){
         die("Connection failed: ".$conn->connect_error);
    }
    $carid=isset($_POST['carid']) ? $_POST['carid'] : '';
    $sd=isset($_POST['sd']) ? $_POST['sd'] : '';
    $ed=isset($_POST['ed']) ? $_POST['ed'] : '';
    $q="select * from cars where id='$carid'";
    $res=$conn->query($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⭐</text></svg>">
    <link rel="stylesheet" href="page2.css"></link>
    <title>Star Rentals</title>
</head>
<body>
    <div class="container">
        <div id="left">
            <img src="images/main.jpg" alt="Logo" id="img1">
        </div>
        <div id="right">
            <h2>Booking Details:</h2>
            <?php
                if($res->num_rows>0){
                    $row=$res->fetch_assoc();
                    echo"<h4> ".$row['name']." ".$row['model']."</h4>";
                    echo"From: ".$sd." To: ".$ed."<br>";
                }
                $conn->close();
            ?>
            <h2>Fill to confirm your booking:</h2>
            <form action="final.php" method="post">
                <input type="hidden" name="carid" value="<?php echo $carid; ?>">
                <input type="hidden" name="sd" value="<?php echo $sd; ?>">
                <input type="hidden" name="ed" value="<?php echo $ed; ?>">
                Name:
                <input type="text" name="name" placeholder="Enter your name" required><br>
                Email:
                <input type="email" name="email" placeholder="Enter your Email" required><br>
                Phone:
                <input type="text" name="phone" placeholder="Enter your phonr number" required><br><br>
                <button type="submit">Confirm Booking</button>
            </form>
    </div>
</body>
</html>