<?php include("dataconnection.php") ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/admin.css" >
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="js/index.js"></script>
    <script type="text/javascript">
        function confirmation(){
            let answer;

            answer = confirm("Do you want to delete the selected room? ");
            return answer;
        }
    </script>
</head>

<body>
    <header>
        <h2>Ohio Hotel</h2>
    </header>

    <div class="sidebar">
        <a href="../admin.html"><i class="fa fa-fw fa-home"></i> Admin</a>
        <a href="#"><i class="fa-solid fa-bed"></i> Services</a>
        <a href="#"><i class="fa fa-fw fa-user"></i> Staffs</a>
        <a href="#"><i class="fa-solid fa-user-tie"></i> Member</a>
        <a href="#"><i class="fa-solid fa-cart-shopping"></i> Order</a>
    </div>

    <div class="main">
        <div id="admindash">
            <h1><i class="fa-solid fa-user"></i>Admin Dashboard</h1>
            <h2>Room Lists</h2>
                <table>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Name</th>
                        <th>Room Price</th>
                    </tr>

                    <?php
                    include("dataconnection.php");

                    $query = "SELECT * FROM room";
                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                    ?>
                    
                    <tr>
                        <td><?php echo $row["room_id"];?></td>
                        <td><?php echo $row["room_name"];?></td>
                        <td><?php echo $row["room_price"];?></td>
                        <td><a href="../php/detail_room.php?view&roomid=<?php echo $row["room_id"]; ?>">More Details</a></td>
                        <td><a href="../php/update_room.php?edit&roomid=<?php echo $row["room_id"]; ?>">Edit</a></td>
                        <td><a href="../php/delete_room.php?del&roomid=<?php echo $row["room_id"]; ?>" onclick="return confirmation();">Delete</a></td>
                    </tr>
                    <?php

                    }
                    
                    ?>

                </table>

                <p>Number of lists : <?php echo $count; ?></p>
        </div>
    </div>
</body>
</html>