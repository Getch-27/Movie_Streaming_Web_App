<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #333;
            padding: 1em;
        }

        h1 {
            margin: 0;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            padding: 1em;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        .footer-links,
        .contact-info {
            margin-top: 20px;
        }

        .footer-links {
            display: block;
        }

        .footer-links a {
            color: #4caf50;
            display: block;
            line-height: 3em;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .contact-info {
            line-height: 2em;
            text-align: center;
            padding-left: 20em;
        }

        .contact-info h3 {
            margin-bottom: 10px;
            color: #fff;
        }

        .contact-info ul {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 10px;
        }

        .contact-info a {
            color: #4caf50;
            text-decoration: none;
            padding: .5em;
            transition: color 0.3s ease;
        }

        .contact-info a:hover {
            color: #fff;
        }

        .social-icons a {
            color: #4caf50;
            font-size: 1.5em;
            text-decoration: none;
            transition: color 0.3s ease;
            padding: .5em;
        }
        .social-icons{
          padding-left: 18em;
        }

        .social-icons a:hover {
            color: #fff;
        }

        p a {
            color: #4caf50;
        }

        p a:hover {
            color: #4caf50;
        }

        li a {
            color: #fff;
        }

        li a:hover {
            color: #4caf50;
        }

        .cp {
            text-align: center;
            margin: 20px 0;
            padding-right: 28em;
        }

    </style>
</head>

<body>
    <div class="main-content">
    </div>

    <?php
    $footerContent = [
        'links' => [
            'Home' => 'index.php',
            'Movies' => 'discover.php',
            'Recently Added' => 'recently.php',
            'About Us' => 'aboutUs.php',
            'Login' => 'signin.php',
        ],
        // 'aboutUs' => 'About Us: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'contactInfo' => [
            'Email' => 'info@streamly.com',
            'Phone' => '+251 456 789',
            'Address' => 'Adiss Abeba, Mexico',
        ],
        'socialMedia' => [
            'Facebook' => '#',
            'Twitter' => '#',
            'Instagram' => '#',
        ],
        'copyright' => '&copy; ' . date('Y') . ' Streamly ',
    ];
    ?>

    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-links">
                <?php
                foreach ($footerContent['links'] as $label => $url) {
                    echo "<a href=\"$url\">$label</a>";
                }
                ?>
            </div>
        </div>

        <div class="footer-content">
            <div class="contact-info">
                <h3>Contact Us</h3>
                <ul>
                    <?php
                    foreach ($footerContent['contactInfo'] as $label => $value) {
                        if ($label === 'Email') {
                            echo "<li>$label: <a href=\"mailto:$value\">$value</a></li>";
                        } elseif ($label === 'Phone') {
                            // Remove non-numeric characters from phone number
                            $cleanedPhoneNumber = preg_replace('/[^0-9]/', '', $value);
                            echo "<li>$label: <a href=\"tel:$cleanedPhoneNumber\">$value</a></li>";
                        } else {
                            echo "<li>$label: $value</li>";
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="social-icons">
                <a href="<?php echo $footerContent['socialMedia']['Facebook']; ?>" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="<?php echo $footerContent['socialMedia']['Twitter']; ?>" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="<?php echo $footerContent['socialMedia']['Instagram']; ?>" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
            </div>

            <p class="cp"><?php echo $footerContent['copyright']; ?></p>
        </div>
    </div>

</body>

</html>
