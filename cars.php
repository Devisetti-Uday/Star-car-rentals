<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Rentals</title>
     <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⭐</text></svg>">
    <link rel="stylesheet" href="page1.css"></link>
</head>
<body>
    <div id="frame" style="text-align: center;">
        <img id="zi" src="images/iframe.jpg" alt="group of cars">
    </div>
    <div class="container">
        <nav class="navbar">
            <h2>Hey! The Star Rentals Welcomes you.</h2>
        </nav>
        <div id="d">
            <h3>Booking a car from
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "rental";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sd = isset($_POST['sd']) ? $_POST['sd'] : '';
                    $ed = isset($_POST['ed']) ? $_POST['ed'] : '';
                    echo " ".$sd." to ".$ed;
                ?>
            </h3>
            <h3><a href="index.html">GoBack</a></h3>
        </div>
    </div>
    <div class="cars">
        <?php
        $count=0;
        $lis=($conn->query("select * from cars where id not in(select carid from bookings where (start_date between '$sd' and '$ed') or (end_date between '$sd' and '$ed'))"));
        while($l=$lis->fetch_assoc()){
            if($count==0) echo "<div class='row'>";
            echo "<div class='card'>
                    <img src='".$l['pic']."' alt='Car Image' class='zap'>
                    <h3>".$l['name']."</h3>
                    <p><b>Model:</b> ".$l['model']."</p>
                    <p><b>Seats: </b>".$l['seater']."</p>
                    <p><b>Price per day: </b>".$l['price']."</p>
                    <form action='booking.php' method='POST'>
                        <input type='hidden' name='carid' value='".$l['id']."'>
                        <input type='hidden' name='sd' value='".$sd."'>
                        <input type='hidden' name='ed' value='".$ed."'>
                        <button type='submit'>Book Now</button>
                    </form>
                </div>";
                $count++;
            if($count==3){ echo "</div><br>";
                $count=0;
            }
        }
        ?>
    </div>
</body>
</html>