<?php
session_start();
require_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Us</title>
    <!-- CSS stylesheets and font links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Tinos&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bookstyle.css">
</head>
<body>
    <!-- Header section starts -->
    <header>
        <a href="" class="logo">Revswings <s>Events</s></a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar"> 
            <a href="homepage.php">Home</a>
            <a href="hireus.php">Hire</a>
            <a href="attendevent.php">Attend</a>
            <a href="">Tenders</a>
            <a href="">Contact Us</a>
        </nav>
    </header>
    <!-- Header section ends here -->

    <!-- Start of form -->
    <div class="formstart">
        <div class="form">
            <div class="form-text">
                <h1>Attend Event</h1>
                <p>"Join Us for an Unforgettable Experience: Be a Part of the Extraordinary."</p>
            </div>
            <div class="main-form">
                <form method="post" name="form">
                    <?php
                    // Retrieve the events from the database
                    $query = "SELECT * FROM events ORDER BY event_date DESC";
                    $result = mysqli_query($connection, $query);

                    // Check if there are any events
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $eventId = $row['event-id'];
                            $eventName = $row['event-name'];
                            $eventDate = $row['event-date'];
                            $venue = $row['venue'];
                            $startTime = $row['start-time'];
                            $amount = $row['amount'];
                            ?>
                            <div class="event">
                                <h3><?php echo $eventName; ?></h3>
                                <p>Date: <?php echo $eventDate; ?></p>
                                <p>Venue: <?php echo $venue; ?></p>
                                <p>Start Time: <?php echo $startTime; ?></p>
                                <p>Amount: <?php echo $amount; ?></p>
                                <form action="event_details.php" method="GET">
                                    <input type="hidden" name="event_id" value="<?php echo $eventId; ?>">
                                    <input type="submit" value="Attend">
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No events available.";
                    }

                    // Close the database connection
                    mysqli_close($connection);
                    ?>

                    <br><br>
                    <center>
                        <div class="textbox">
                            <a href="homepage.php" class="btn">Back To Home</a>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <script>
        let menu = document.querySelector('#menu-bar');
        let navbar = document.querySelector('.navbar');

        menu.addEventListener('click', () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('nav-toggle');
        });

        window.addEventListener('scroll', () => {
            menu.classList.remove('fa-times');
            navbar.classList.remove('nav-toggle');
        });
    </script>
</body>
</html>
