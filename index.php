<?php
function getEventDates(): array
{
    // Load a JSON file
    $jsonData = file_get_contents('content/tickets/tickets.json');

    // Check if the file was read successfully
    if ($jsonData === false) {
        echo 'Unable to read JSON file';
    }

    // Decode the JSON data
    $events = json_decode($jsonData, true);

    // Filter events to include only future dates
    $currentDate = date('Y-m-d');
    $futureEvents = array_filter($events, function ($event) use ($currentDate) {
        return strtotime($event['date']) >= strtotime($currentDate);
    });

    // Sort the future events by date in ascending order
    usort($futureEvents, function ($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });

    // Get the next three events (date and id)
    return array_slice($futureEvents, 0, 3); // Return an array with the next three events (length <= 3)
}

?>
<!DOCTYPE html>
<html lang="en"> <!-- dark or light can be added behind html (if css counterpart is uncommented) -->
<head>
    <title>Linkin Park</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Linus Hoffmann, Paul Ebel, Suraj Meshiya and Akshaykumar Pambhar">
    <meta name="title" content="Linkin Park">
    <meta name="description" content="Projekt der Hochschule Trier von Linus Hoffmann, Paul Ebel, Suraj Meshiya und Akshaykumar Pambhar">

    <link rel="canonical" href="https://hochschule.ender.ovh/index.php">
    <link href="style.css" type="text/css" rel="stylesheet"/>
    <link href="components/css/header.css" type="text/css" rel="stylesheet"/>
    <!-- The drawer menu gets injected by JavaScript -->
    <!-- <link href="components/css/drawer_menu.css" type="text/css" rel="stylesheet"/> -->
    <link href="components/css/footer.css" type="text/css" rel="stylesheet"/>
    <link href="components/css/noscript.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.ico">

    <!-- Open Graph / For hosting the website on my server -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://hochschule.ender.ovh/index.php">
    <meta property="og:site_name" content="hochschule.ender.ovh">
    <meta property="og:title" content="Linkin Park">
    <meta property="og:description" content="Buy tickets for the world tourne and get to know more about Linkin Park">
    <meta property="og:image" content="https://hochschule.ender.ovh/assets/images/logo/LinkinPark_x_Hochschule_Logo_Small.webp">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">

    <!--<meta name="keywords" content=""> <- This is commented out because the website shouldn't be found on Google for copyright issues -->
    <meta name="robots" content="noindex, nofollow, noimageindex">
    <!-- Tells google to not index and not index images -->

    <!-- JavaScript for sidebar -->
    <script src="components/js/drawer_menu.js" defer></script>
    <script src="components/js/to_top_button.js" defer></script>
    <!-- Defer is to load the script after the page is loaded -->
</head>
<body>
<!-- Header Menu -->
<header class="brand">
    <!--<h1><a href="index.php">Linkin Park</a></h1> OLD Text for Header Which is Replaced by the Logo-->
    <a href="index.php">
        <picture>
            <source type="image/webp" srcset="assets/images/logo/favicon.ico">
            <source type="image/png" srcset="assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg">
            <img src="assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg" alt="Linkin Park Logo">
        </picture>
    </a>
    <nav>
        <ul>
            <li><a href="index.php" title="Home Page">Home</a></li>
            <li><a href="content/music/index.html">Music</a></li>
        </ul>
        <button aria-label="Drawer Menu" id="menu-button"><i class="fa fa-bars"></i></button>
    </nav>
</header>
<!-- Drawer Menu (Just for display purposes drawer_menu.js injects it) -->
<!--
<aside id="drawer_menu">
    <ul>
        <li>
            <picture>
                <source type="image/webp" srcset="assets/images/logo/favicon.ico">
                <source type="image/png" srcset="assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg">
                <img src="assets/images/logo/HS_Trier_x_Linkin_Park_2024_Webtech.jpeg" alt="Linkin Park Logo">
            </picture>
        </li>
        <li class="active">
            <a href="index.php" title="Home Page">
                <span class="material-symbols-outlined">Home</span>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="content/music/index.html">
                <span class="material-symbols-outlined">music_note</span>
                <span>Music</span>
            </a>
        </li>
        <li>
            <button class="dropdown-btn">
                <span class="material-symbols-outlined">groups</span>
                <span>Members</span>
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </button>
            <ul id="member-submenu">
                <li><a href="content/members/brad_delson.html">Brad Delson</a></li>
                <li><a href="content/members/colin_brittain.html">Colin Brittain</a></li>
                <li><a href="content/members/dave_farrell.html">Dave Farrell</a></li>
                <li><a href="content/members/emily_armstrong.html">Emily Armstrong</a></li>
                <li><a href="content/members/joe_hahn.html">Joe Hahn</a></li>
                <li><a href="content/members/mike_shinoda.html">Mike Shinoda</a></li>
            </ul>
        </li>
        <li>
            <a href="content/tickets/index.php">
                <span class="material-symbols-outlined">local_activity</span>
                <span>Tickets</span>
            </a>
        </li>
    </ul>
</aside>
-->
<!-- Branding (Image with ticket buttons) -->
<div class="branding">
    <picture>
        <source class="branding" type="image/webp" srcset="assets/images/Linkin_Park_TestImage.webp">
        <source class="branding" type="image/jpeg" srcset="assets/images/Linkin_Park_TestImage.jpg">
        <img class="branding" src="assets/images/Linkin_Park_TestImage.jpg" alt="Linkin Park Background Image">
    </picture>
    <h2>World Tournee Tickets</h2>
    <ul>
        <?php
        // Fetch the next three event dates with their IDs
        $nextThreeEvents = getEventDates();

        // Create list items for the next three events
        foreach ($nextThreeEvents as $index => $event) {
            // Extract the date and event ID
            $date = $event['date'];
            $eventId = $event['id'];

            if ($date && $eventId) { // Check if the date is not null
                echo '<li><a href="content/tickets/buy_tickets.php?id=' . $eventId . '">' . htmlspecialchars($date) . '</a></li>';
                // htmlspecialchars() ensures that any special characters in the date (e.g., <, >, &) are safely displayed in the browser
            }
        }
        ?>
        <li><a href="content/tickets/index.php"> More Tickets </a></li>
    </ul>
</div>
<!-- Noscript Warning -->
<noscript>
    <div class="noscript-warning">
        <p>This website requires JavaScript to function properly. Please enable JavaScript in your browser settings.</p>
        <a href="https://www.enable-javascript.com/" target="_blank">How to enable JavaScript</a>
    </div>
</noscript>
<!-- Member List (Images with the members -->
<div class="members" id="members">
    <h2 class="section-branding">Members</h2>
    <ul class="member-list">
        <li>
            <img src="assets/images/members/Mike_Shinoda.jpg" alt="Mike Shinoda">
            <a tabindex="0" href="content/members/mike_shinoda.html">
                <div class="info">
                    <h2>Mike Shinoda</h2>
                    <p>Vocalist, Rapper, Keyboardist</p>
                </div>
            </a>
        </li>
        <li>
            <img src="assets/images/members/Emily_Armstrong.jpg" alt="Emily Armstrong">
            <a tabindex="0" href="content/members/emily_armstrong.html">
                <div class="info">
                    <h2>Emily Armstrong</h2>
                    <p>Lead Vocalist</p>
                </div>
            </a>
        </li>
        <li>
            <img src="assets/images/members/Brad_Delson.jpg" alt="Brad Delson">
            <a tabindex="0" href="content/members/brad_delson.html">
                <div class="info">
                    <h2>Brad Delson</h2>
                    <p>Guitarist</p>
                </div>
            </a>
        </li>
        <li>
            <img src="assets/images/members/Colin_Brittain.jpg" alt="Colin Brittain">
            <a tabindex="0" href="content/members/colin_brittain.html">
                <div class="info">
                    <h2>Colin Brittain</h2>
                    <p>Drummer</p>
                </div>
            </a>
        </li>
        <li>
            <img src="assets/images/members/Dave_Farrell.jpg" alt="Dave Farrell">
            <a tabindex="0" href="content/members/dave_farrell.html">
                <div class="info">
                    <h2>Dave Farrell</h2>
                    <p>Bassist</p>
                </div>
            </a>
        </li>
        <li>
            <img src="assets/images/members/Joe_Hahn.jpg" alt="Joe Hahn">
            <a tabindex="0" href="content/members/joe_hahn.html">
                <div class="info">
                    <h2>Joe Hahn</h2>
                    <p>DJ, Programmer</p>
                </div>
            </a>
        </li>
    </ul>
</div>
<!-- Newest Songs (Displays current trending songs) -->
<div class="music">
    <h2 class="section-branding">Music</h2>
    <ul>
        <li>
            <div class="music-container">
                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/SRXH9AbT280?si=RZHBBozkqfo5ZJjv" title="YouTube: The Emptiness Machine" allow="accelerometer; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <a href="content/music/index.html">
                    <div class="text-content">
                        <h3>The Emptiness Machine</h3>
                        <p>
                            This track reflects on the struggles of emptiness and perseverance in a mechanical,
                            ever-demanding world. <br>
                            With haunting tones and dynamic shifts, it captures the tension between routine and purpose.
                        </p>
                    </div>
                </a>
            </div>
        </li>
        <li>
            <div class="music-container">
                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/ZAt8oxY0GQo?si=iUboK39_3ZEkYZ3g" title="YouTube: Heavy Is the Crown" allow="accelerometer; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <a href="content/music/index.html">
                    <div class="text-content">
                        <h3>Heavy Is the Crown</h3>
                        <p>
                            A powerful anthem of responsibility and sacrifice, this song addresses the weight of
                            leadership and the burdens that come with it. <br>
                            Its soaring chorus and rich instrumentation make it a standout piece.
                        </p>
                    </div>
                </a>
            </div>
        </li>
    </ul>
</div>
<!-- Footer -->
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
                <li><a href="content/about.html">About us</a></li>
                <li><a href="content/contact.html">Contact us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Legal</h3>
            <ul>
                <li><a href="content/privacy.html">Privacy Policy</a></li>
                <li><a href="content/privacy.html">Cookies Policy</a></li>
            </ul>
        </div>
        <!-- Social Media Links -->
        <div class="footer-section social-media">
            <h3>Follow Us</h3>
            <ul>
                <li>
                    <a href="https://open.spotify.com/artist/6XyY86QOPPrYVGvF9ch6wz" target="_blank"><i class="fa-brands fa-spotify"></i></a>
                </li>
                <li>
                    <a href="https://music.apple.com/us/artist/linkin-park/1483371626" target="_blank"><i class="fa-solid fa-music"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/user/linkinpark" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/linkinpark/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://x.com/linkinpark" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                </li>
            </ul>
        </div>
        <!-- sitemap -->
        <div class="footer-section">
            <h3>Accessibility</h3>
            <ul>
                <li><a href="sitemap.php">Sitemap</a></li>
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



