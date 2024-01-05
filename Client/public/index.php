<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src=""></script>
    <title>Movie Streaming</title>

    <!-- new links -->
    <?php include_once "heading.php" ?>

</head>

<body>

    <header>

    </header>

    <!-- Movie display section starts here-->

    <!-- Main Poster viewer starts here -->
    <section class="content">
        <main class="card">
            <div class="billboard-layer"></div>
            <div class="hero" style="background-image: url('images/lordof.webp');"></div>
            <div class="breaking-bad">
                <h1 class="title">The Lord of the Rings: The Return of the King</h1>
                <ul class="meta">
                    <li class="year">2014</li>
                    <li class="rating">PG-13</li>
                    <li class="duration">129 min</li>
                    <li class="language">English</li>
                </ul>
                <p class="description">Aragorn is revealed as the heir to the ancient kings as he, Gandalf and the other members of the broken fellowship struggle to save Gondor from Sauron's forces. Meanwhile, Frodo and Sam bring the ring closer to the heart of Mordor, the dark lord's
                    realm.
                </p>
                <hr class="break" />
                <div class="bottom-info">
                    <a class="btn btn-min-w btn-web btn-s" href="#" role="button"> Watch now</a>
                    <a class="btn btn-min-w btn-grey" href="" role="button"> Play Trailer</a>

                </div>
            </div>
        </main>
    </section>
    <!-- Main Poster viewer ends here -->

    <!-- details of movies -->

    <?php



    // Add movies using the function
    addMovie('After', 'images/after.jpg', '7.6/10', '2023-09-07', '167 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('After', 'images/after.jpg', '7.6/10', '2023-09-07', '167 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');

    ?>

    <style>
        .icons a:hover {
            color: #4caf50;
            /* Change color on hover */
        }

        /* Share Form Styling */
        .overlay {
            display: none;
            position: fixed;
            top: 1em;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
        }

        .share-form {
            background: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .share-icons {
            margin-top: 20px;
        }

        .share-icons a {
            margin: 0 10px;
            color: #fff;
            text-decoration: none;
            font-size: 24px;
        }

        .share-icons a:hover {
            color: #4caf50;
        }

        .share-form button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #fff;
            color: #333;
            border: none;
            border-radius: 5px;
        }

        .share-form button:hover {
            background-color: #4caf50;
            /* Change color on hover */
        }

        #shareOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        #shareForm {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        #closeShareForm {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <!-- Movie cards -->
        <div class="container movie-cards">
            <?php foreach ($movies as $movie) : ?>
                <div class="card">
                    <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>" />
                    <div class="content">
                        <h1 class="name"><?php echo $movie['title']; ?></h1>
                        <h3 class="infos">
                            <i class="fa-solid fa-star"></i> <?php echo $movie['rating']; ?> | <?php echo $movie['releaseDate']; ?> | <?php echo $movie['duration']; ?>
                        </h3>
                        <p class="short-desc">
                            <?php echo $movie['description']; ?>
                        </p>
                        <div class="icons">
                            <a href="moviePlayer.php?video=<?php echo urlencode($movie['title']); ?>"><i class="fa-solid fa-play"></i></a>
                            <a href="#"><i class="fa-solid fa-bookmark"></i></a>
                            <a href="#" onclick="showShareForm('<?php echo $movie['title']; ?>')"><i class="fa-solid fa-share"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="overlay" id="shareOverlay">
        <div class="share-form">
            <h2 style="color: #4caf50;">Share Movie: <span id="movieTitle"></span></h2>
            <div class="share-icons">
                <a href="#" class="share-icon" onclick="shareOnFacebook()"><i class="fab fa-facebook"></i></a>
                <a href="#" class="share-icon" onclick="shareOnTwitter()"><i class="fab fa-twitter"></i></a>
                <a href="#" class="share-icon" onclick="shareOnInstagram()"><i class="fab fa-instagram"></i></a>
                <a href="#" class="share-icon" onclick="copyLink()"><i class="fas fa-copy"></i></a>
                <a href="mailto:?subject=Check%20out%20this%20movie&amp;body=Hey%20I%20found%20this%20awesome%20movie%20and%20thought%20you%20might%20like%20it:%20[Movie%20Link]"><i class="fas fa-envelope"></i></a>
            </div>
            <button onclick="hideShareForm()">OK</button>
        </div>
    </div>

    <script>
        function showShareForm(title) {
            // Set the movie title
            document.getElementById('movieTitle').innerText = title;

            // Display the overlay
            document.getElementById('shareOverlay').style.display = 'flex';
        }


        function hideShareForm() {
            document.getElementById('shareOverlay').style.display = 'none';
        }

        function shareOnFacebook() {
            // Implement Facebook sharing logic
            alert('Sharing on Facebook');
            hideShareForm();
        }

        function shareOnTwitter() {
            // Implement Twitter sharing logic
            alert('Sharing on Twitter');
            hideShareForm();
        }

        function shareOnInstagram() {
            // Implement Instagram sharing logic
            alert('Sharing on Instagram');
            hideShareForm();
        }

        function copyLink() {
            // Implement link copying logic
            alert('Link copied to clipboard');
            hideShareForm();
        }
    </script>
    <!-- Movie display section ends here -->
    <h2 style="text-align: center; font: 3em sans-serif; ">Coming Soon</h2>
    <?php

    $movies = [];

    function addMovie($title, $image, $rating, $releaseDate, $duration, $description)
    {
        global $movies;

        $movies[] = [
            'title' => $title,
            'image' => $image,
            'rating' => $rating,
            'releaseDate' => $releaseDate,
            'duration' => $duration,
            'description' => $description,
        ];
    }

    // Add movies using the function
    addMovie('After', 'images/after.jpg', '7.6/10', '2023-09-07', '167 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
    addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');

    ?>

    <div class="container">
        <!-- Movie cards -->
        <div class="container movie-cards">
            <?php foreach ($movies as $movie) : ?>
                <div class="card">
                    <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>" />
                    <div class="content">
                        <h1 class="name"><?php echo $movie['title']; ?></h1>
                        <h3 class="infos">
                            <i class="fa-solid fa-star"></i> <?php echo $movie['rating']; ?> | <?php echo $movie['releaseDate']; ?> | <?php echo $movie['duration']; ?>
                        </h3>
                        <p class="short-desc">
                            <?php echo $movie['description']; ?>
                        </p>
                        <div class="icons">
                            <a href="#"><i class="fa-solid fa-play"></i></a>
                            <a href="#"><i class="fa-solid fa-bookmark"></i></a>
                            <a href="#"><i class="fa-solid fa-share"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- Meet our Members
<h2 style="text-align: center; font: 3em sans-serif; ">Meet Our Members</h2>
  <ul class="list-team-members">
    <li>
       <a href="#">
         <img src="images/kebede.jpg" />
         <span class="member-title">Abebe Tessema</span>
         <span class="member-title-hover">C.E.O</span>
      </a>
    </li>
    <li>
       <a href="#">
         <img src="images/women.jpg" />
         <span class="member-title">Kebedech Anteneh</span>
         <span class="member-title-hover">Director Operations</span>
      </a>
    </li>
    
    <li>
       <a href="#">
         <img src="images/bekelech.jpg" />
         <span class="member-title">Elsa Mengesha</span>
         <span class="member-title-hover">Manager Operations</span>
      </a>
    </li>
    
    <li>
       <a href="#">
         <img src="images/hermela.jpg" />
         <span class="member-title">Hermela Tosa</span>
         <span class="member-title-hover">Project Manager</span>
      </a>
    </li>
  </ul> -->


    <!-- Tetstimonial -->

    <div class="happy" style="width: 960px; margin: 0 auto; padding-top: 50px; padding-bottom: 80px;">

        <h2 style="text-align: center; font: 3em sans-serif; ">Customer Tetstimonials</h2>

        <div class="testimonial-quote group">
            <img src="images/hermela.jpg" height="50px" width="70px">
            <div class="quote-container">
                <blockquote>
                    <p>I had a great experience using this website with a new movies being added as soon as they are released.</p>
                </blockquote>
                <cite><span>Kristi Bruno</span><br>
                    Social Media Specialist<br>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </cite>
            </div>
        </div>

        <div class="testimonial-quote group" padding-top: 80px;>
            <img src="images/kebede.jpg" height="50px" width="66px">
            <div class="quote-container">
                <blockquote>
                    <p>Overall, fantastic! I'd recommend them to anyone looking for a fast and interactive web to watch movies.</p>
                </blockquote>
                <cite><span>Bruno Gemechu</span><br>
                    Social Media Specialist<br>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </cite>
            </div>
        </div>

    </div>
    <!-- Tetstimonial ends here-->

    <!-- footer -->

    <?php include_once "footer.php" ?>
</body>

</html>