<?php
session_start();
$_SESSION['pages'] = "Notifications";
include("../php/config.php");
$notifications = mysqli_query($conn, "SELECT * FROM notifications WHERE etat = 0 ORDER BY(dateSave)");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../style/immob.css">
    <title>Notification</title>
    <style>
        .container {
            padding: 5px 10px;
        }

        .container h2 {
            text-align: center;
        }

        .notif-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            min-width: 7rem;
            max-width: 15rem;
            padding: 5px 10px 2px 10px;
            background-color: bisque;
            margin: 15px 5px;
            box-shadow: 2px 3px 5px 3px black;
            box-sizing: border-box;
        }

        .date {
            width: 100%;
            text-align: right;
            font-size: 12px;
        }

        .body h3 {
            color: yellowgreen;
            text-align: center;
        }

        .body p {
            text-align: justify;
        }
    </style>
</head>

<body>
    <?php include("../php/headerImmob.php") ?>
    <div class="container">
        <h2>Toute les Notifications</h2>
        <div class="notif-container">
            <?php while ($notification = mysqli_fetch_assoc($notifications)) { ?>
                <div class="card">
                    <div class="body">
                        <?php echo "<h3>" . $notification["title"] . "</h3><p>" . $notification["notif"] . "</p>";
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>