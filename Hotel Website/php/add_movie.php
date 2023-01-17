<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>
    <header>
        <h2>Ohio Hotel</h2>
    </header>

    <div class="sidebar">
        <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa-solid fa-bed"></i> Services</a>
        <a href="#"><i class="fa fa-fw fa-user"></i> Staffs</a>
        <a href="#"><i class="fa-solid fa-user-tie"></i> Member</a>
        <a href="#"><i class="fa-solid fa-cart-shopping"></i> Order</a>
    </div>

    <div class="main">
        <div id="admindash">
            <h1><i class="fa-solid fa-user"></i>Admin Dashboard</h1>
            <h2>Services</h2>
            <div class="service">
                <h2>Insert New Service</h2>

                <form class="addroom" name="addfrm" method="post" action="php/add_movie.php">
                    <p><label>Service: </label><input type="text" name="room_name" size="80">
                    <p><label>Room Price:</label><input type="text" name="room_price" size="10">
                    <p><input type="submit" name="savebtn" value="Save Room">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    $roomName = $_POST["room_name"];
    $roomPrice = $_POST["room_price"];

    $connection = new mysqli("localhost", "root", "", "hotel");
    echo "Connection successul";

    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql = $connection->prepare("INSERT INTO room(room_name, room_price)
                VALUES(?, ?)");
        $sql->bind_param("si", $roomName, $roomPrice);
        $sql->execute();
        echo "Registration successul";
        $sql->close();
        $connection->close();
    }

    

    
?>
