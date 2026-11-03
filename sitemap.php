<!DOCTYPE html>
<html lang="en"> <!-- dark or light can be added behind html (if css counterpart is uncommented) -->
<head>
    <title>Sitemap - Linkin Park</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Linus Hoffmann, Paul Ebel, Suraj Meshiya and Akshaykumar Pambhar">
    <meta name="title" content="Linkin Park">
    <meta name="description" content="Projekt der Hochschule Trier von Linus Hoffmann, Paul Ebel, Suraj Meshiya und Akshaykumar Pambhar">

    <link rel="canonical" href="https://hochschule.ender.ovh/sitemap.php">
    <link href="sitemap.css" rel="stylesheet" type="text/css" >
    <link href="components/css/header.css" type="text/css" rel="stylesheet"/>
    <link href="components/css/footer.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.ico">

    <!-- Open Graph / For hosting the website on my server -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://hochschule.ender.ovh/sitemap.php">
    <meta property="og:site_name" content="hochschule.ender.ovh">
    <meta property="og:title" content="Sitemap - Linkin Park">
    <meta property="og:description" content="Sitemap for the Linkin Park website">
    <meta property="og:image" content="https://hochschule.ender.ovh/assets/images/logo/LinkinPark_x_Hochschule_Logo_Small.webp">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">

    <!--<meta name="keywords" content=""> <- This is commented out because the website shouldn't be found on Google for copyright issues -->
    <meta name="robots" content="noindex, nofollow, noimageindex">
    <!-- Tells google to not index and not index images -->

    <!-- JavaScript for sidebar -->
    <script src="components/js/drawer_menu.js" defer></script>
    <script src="components/js/to_top_button.js" defer></script>
</head>
<body>
<!-- Header Menu -->
<header class="brand">
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
<!-- sitemap section -->
<section class="sitemap-section">
    <h2>Sitemap</h2>
    <ul class="alphabet-list">
        <li class="alphabet-item">
            <span class="alphabet">A</span>
            <ul class="submenu">
                <li><a href="content/about.html">About us</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">B</span>
            <ul class="submenu">
                <li><a href="content/members/brad_delson.html">Brad Delson</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">C</span>
            <ul class="submenu">
                <li><a href="content/members/colin_brittain.html">Colin Brittain</a></li>
                <li><a href="content/contact.html">Contact us</a></li>
                <li><a href="content/privacy.html">Cookies Policy</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">D</span>
            <ul class="submenu">
                <li><a href="content/members/dave_farrell.html">Dave Farrell</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">E</span>
            <ul class="submenu">
                <li><a href="content/members/emily_armstrong.html">Emily Armstrong</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">H</span>
            <ul class="submenu">
                <li><a href="index.php">Home Page</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">J</span>
            <ul class="submenu">
                <li><a href="content/members/joe_hahn.html">Joe Hahn</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">M</span>
            <ul class="submenu">
                <li><a href="index.php#members">Members</a></li>
                <li><a href="content/members/mike_shinoda.html">Mike Shinoda</a></li>
                <li><a href="content/music/index.html">Music</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">P</span>
            <ul class="submenu">
                <li><a href="content/privacy.html">Privacy policy</a></li>
            </ul>
        </li>
        <li class="alphabet-item">
            <span class="alphabet">T</span>
            <ul class="submenu">
                <li><a href="content/tickets/index.php">Tickets</a></li>
            </ul>
        </li>
    </ul>
</section>
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