<?php
// Before loading files and putting stress on the server we look for the parameter 'ip' in the URL
if (isset($_GET['id'])) {
    // Retrieve the value of the 'ip' parameter
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
} else {
    // Redirect to a different page if 'ip' parameter does not exist
    header("Location: index.php");
    exit(); // Ensure no further script execution after redirection
}

// Load the events from the JSON file
$events_json = json_decode(file_get_contents("tickets.json"), true);

// Find the event entry
$event_entry = null;
// Loop through the events to find the event with the matching ID
foreach ($events_json as $entry) {
    if ($entry['id'] === $id) {
        $event_entry = $entry;
        break;
    }
}

if ($event_entry === null) {
    // Redirect to a different page if the event ID does not exist
    header("Location: index.php");
    exit(); // Ensure no further script execution after redirection
}

// Load the prices from the JSON file
$prices_json = file_get_contents(".prices.json");
$prices = json_decode($prices_json, true); // Decode the JSON into an PHP array

// Set price variables from JSON data
$frontSeatPrice = $prices['frontSeatPrice'];
$middleSeatPrice = $prices['middleSeatPrice'];
$backSeatPrice = $prices['backSeatPrice'];

// Total price calculation (but not used because it only calculates the total price after form submission which is followed by a redirect)
/*
$totalPrice = 0;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected seats and quantities
    // $seats = $_POST['seats'] ?? []; // Is the same as: isset($_POST['seats']) ? $_POST['seats'] : []
    // $quantities = $_POST['quantities'] ?? []; // ? is an if else statement
    $frontQuantity = !empty($_POST['frontQuantity']) ? $_POST['frontQuantity'] : 0;
    $middleQuantity = !empty($_POST['middleQuantity']) ? $_POST['middleQuantity'] : 0;
    $backQuantity = !empty($_POST['backQuantity']) ? $_POST['backQuantity'] : 0;


    echo "Front Quantity: " . $frontQuantity . "<br>";
    echo "Front Price: " . $frontSeatPrice . '$' . "<br>";
    echo "Middle Quantity: " . $middleQuantity . "<br>";
    echo "Middle Price: " . $middleSeatPrice . '$' . "<br>";
    echo "Back Quantity: " . $backQuantity . "<br>";
    echo "Back Price: " . $backSeatPrice . '$' . "<br>";

    // Calculate total price based on the selected seats and quantities
    $totalPrice = ($frontQuantity * $frontSeatPrice) + ($middleQuantity * $middleSeatPrice) + ($backQuantity * $backSeatPrice);

    echo "Total Price: " . $totalPrice . '$' . "<br><br>";
    echo var_dump($_POST);
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buy Tickets</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Linus Hoffmann, Paul Ebel, Suraj Meshiya and Akshaykumar Pambhar">
    <meta name="title" content="Linkin Park">
    <meta name="description" content="Projekt der Hochschule Trier von Linus Hoffmann, Paul Ebel, Suraj Meshiya und Akshaykumar Pambhar">
    <!-- Redirect if JS is not loaded -->
    <noscript>
        <meta http-equiv="refresh" content="0; url=index.php">
    </noscript>

    <link rel="canonical" href="https://hochschule.ender.ovh/content/tickets/buy_tickets.php">
    <link href="buy_tickets.css" type="text/css" rel="stylesheet"/>
    <link href="../../components/css/header.css" type="text/css" rel="stylesheet"/>
    <link href="../../components/css/footer.css" type="text/css" rel="stylesheet"/>
    <link href="../../components/css/noscript.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="../../assets/images/logo/favicon.ico">

    <!--<meta name="keywords" content=""> <- This is commented out because the website shouldn't be found on Google for copyright issues -->
    <meta name="robots" content="noindex, nofollow, noimageindex">
    <!-- Tells google to not index and not index images -->
    <!-- JavaScript for PHP values -->
    <script>
        const eventID = "<?php echo $id ?>";
        const eventLocation = "<?php echo $event_entry['location'] ?>";
        const eventDate = "<?php echo $event_entry['date'] ?>";
    </script>
    <!-- JavaScript for sidebar -->
    <script src="../../components/js/drawer_menu.js" defer></script>
    <!-- JavaScript for cookies -->
    <script src="../../components/js/cookies.js" defer></script>
    <script src="buy_tickets.js" defer></script>
    <script src="../../components/js/to_top_button.js" defer></script>
</head>
<body>
<header class="brand">
    <picture>
        <source type="image/webp" srcset="../../assets/images/logo/favicon.ico">
        <source type="image/png" srcset="../../assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg">
        <img src="../../assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg" alt="Linkin Park Logo">
    </picture>
    <nav>
        <ul>
            <li><a href="../../index.php" title="Home Page">Home</a></li>
            <li><a href="../../content/music/index.html">Music</a></li>
        </ul>
        <button aria-label="Drawer Menu" id="menu-button"><i class="fa fa-bars"></i></button>
    </nav>
</header>
<!-- This part of the form will be visible before submission -->
<form name="ticketForm" id="ticketForm" method="post" action="checkout/index.php">
    <h1>Buy Tickets for <?php echo $event_entry['location'] ?></h1>
    <p>Event Date: <?php echo $event_entry['date'] ?></p>
    <label>
        <input type="checkbox" id="frontSection"> Front Section - $<?php echo $frontSeatPrice ?>
    </label>
    <div id="frontTicketOptions" style="display:none;">
        <label for="frontTicketQuantity">Number of Tickets:</label>
        <input type="number" id="frontTicketQuantity" name="frontQuantity" min="1" max="100">
    </div>

    <label>
        <input type="checkbox" id="middleSection"> Middle Section - $<?php echo $middleSeatPrice ?>
    </label>
    <div id="middleTicketOptions" style="display:none;">
        <label for="middleTicketQuantity">Number of Tickets:</label>
        <input type="number" id="middleTicketQuantity" name="middleQuantity" min="1" max="100">
    </div>

    <label>
        <input type="checkbox" id="backSection"> Back Section - $<?php echo $backSeatPrice ?>
    </label>
    <div id="backTicketOptions" style="display:none;">
        <label for="backTicketQuantity">Number of Tickets:</label>
        <input type="number" id="backTicketQuantity" name="backQuantity" min="1" max="100">
    </div>
    <input type="hidden" name="location">
    <input type="hidden" name="date">
    <input type="hidden" name="eventID">

    <button type="submit" id="submit">Continue</button>
    <button type="button" onclick="window.location.href='index.php';">Cancel</button>
</form>
<footer class="footer-container">
    <div class="footer-content">
        <!-- Back To Top Button Section -->
        <div class="footer-section">
            <h3>Back To Top</h3>
            <ul>
                <li>
                    <button id="back-to-top" title="Back to Top">
                        <i class="fas fa-arrow-circle-up"></i>
                    </button>
                </li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>FAQs</h3>
            <ul>
                <li><a href="../about.html">About us</a></li>
                <li><a href="../contact.html">Contact us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Legal</h3>
            <ul>
                <li><a href="../privacy.html">Privacy Policy</a></li>
                <li><a href="../privacy.html">Cookies Policy</a></li>
            </ul>
        </div>
        <!-- Social Media Links -->
        <div class="footer-section social-media">
            <h3>Follow Us</h3>
            <ul>
                <li>
                    <a href="https://open.spotify.com/artist/6XyY86QOPPrYVGvF9ch6wz" target="_blank"><i
                                class="fa-brands fa-spotify"></i></a>
                </li>
                <li>
                    <a href="https://music.apple.com/us/artist/linkin-park/1483371626" target="_blank"><i
                                class="fa-solid fa-music"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/user/linkinpark" target="_blank"><i
                                class="fa-brands fa-youtube"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/linkinpark/" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://x.com/linkinpark" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                </li>
            </ul>
        </div>
        <!-- -->
        <div class="footer-section">
            <h3>Accessibility</h3>
            <ul>
                <li><a href="../../sitemap.php">Sitemap</a></li>
            </ul>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-bottom">
        <p>&copy; 2025 Linkin Park. All rights reserved.</p>
    </div>
    <div id="css-validation">
        <a href="https://jigsaw.w3.org/css-validator/check/referer">
            <img src="https://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/check/referer">
            <img src="https://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!">
        </a>
    </div>
</footer>
</body>
</html>