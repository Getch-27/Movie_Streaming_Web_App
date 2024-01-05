<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Player Page</title>
  <link rel="stylesheet" href="styles.css"> 
  <script src="app.js"></script>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #1f1f1f;
      color: #fff;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px;
    }

    video {
      width: 100%;
      height: 46%;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    video:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .movie-details {
      margin-top: 20px;
    }

    .movie-details h1 {
      font-size: 2em;
    }

    .movie-cards {
      margin-top: 40px;
    }

    .card {
      margin-bottom: 20px;
      background-color: #333;
      border-radius: 10px;
      overflow: hidden;
    }

    .card img {
      width: 100%;
      height: auto;
      border-radius: 10px 10px 0 0;
    }

    .content {
      padding: 20px;
    }

    .name {
      margin: 0;
      font-size: 2em;
    }

    .infos {
      color: #888;
      margin-top: 5px;
      font-size: 0.8em;
    }

    .short-desc {
      margin-top: 10px;
      color: #ddd;
    }

    .icons {
      margin-top: 10px;
    }

    .icons a {
      color: #ddd;
      margin-right: 10px;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .icons a:hover {
      color: #fff;
    }
    .icons a:hover {
            color: #4caf50; /* Change color on hover */
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
            background-color: #4caf50; /* Change color on hover */
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
</head>
<body>
  <?php include_once "heading.php"?>

  <div class="container">
    <!-- Video Player -->
    <?php
      // Example video sources (replace with your actual video sources)
      $videoSources = [
        'After' => 'After',
        'Myfault' => 'Myfault',
        'Titanic' => 'Titanic',
        'Deadpool' => 'Deadpool',
      ];

      // Get the selected video from the query parameter
      $selectedVideo = isset($_GET['video']) ? $_GET['video'] : key($videoSources);
      $videoTitle = isset($videoSources[$selectedVideo]) ? $videoSources[$selectedVideo] : 'Unknown Video';

      $movieDetails = [
        'After' => [
          'release_date' => '2023-09-07',
          'genre' => 'Action',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        ],
        'Myfault' => [
          'release_date' => '2023-07-19',
          'genre' => 'Drama',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        ],
        'Titanic' => [
          'release_date' => '2023-06-29',
          'genre' => 'Romance',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        ],
        'Deadpool' => [
          'release_date' => '2023-06-29',
          'genre' => 'Action',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        ],
      ];

      echo '<h1>' . $videoTitle . '</h1>';
    ?>

    <video controls>
      <source src="<?php echo $selectedVideo; ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <!-- Movie Details -->
    <div class="movie-details">
      <h2><?php echo $videoTitle; ?></h2>
      <p>Release Date: <?php echo $movieDetails[$selectedVideo]['release_date']; ?></p>
      <p>Genre: <?php echo $movieDetails[$selectedVideo]['genre']; ?></p>
      <p>Description: <?php echo $movieDetails[$selectedVideo]['description']; ?></p>
    </div>
  </div>
<?php
    $episodes = [
    [
        'title' => 'Episode 1',
        'image' => 'images/after.jpg',
        'rating' => '7.6/10',
        'releaseDate' => '2023-09-07',
        'duration' => '167 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ],
    [
        'title' => 'Episode 2',
        'image' => 'images/myfault.webp',
        'rating' => '8.1/10',
        'releaseDate' => '2023-07-19',
        'duration' => '181 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ],
    [
        'title' => 'Episode 3',
        'image' => 'images/titanic.jpg',
        'rating' => '7.3/10',
        'releaseDate' => '2023-06-29',
        'duration' => '158 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ]];?>

<!-- Playlist -->
<div class="playlist">
    <h3>Episodes</h3>
    <ul>
        <?php foreach ($episodes as $episode) : ?>
            <li <?php echo ($episode['title'] == $selectedVideo) ? 'class="active"' : ''; ?>>
                <a href="?video=<?php echo urlencode($episode['title']); ?>"><?php echo $episode['title']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<

  <h1 style="font-size: xx-large; text-align: center;">You May Also Like</h1>

  <!-- Movie cards -->
 <div>
 <div class="container">
    <!-- Movie cards -->
   <?php
    $movies = [
    [
        'title' => 'After',
        'image' => 'images/after.jpg',
        'rating' => '7.6/10',
        'releaseDate' => '2023-09-07',
        'duration' => '167 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ],
    [
        'title' => 'Myfault',
        'image' => 'images/myfault.webp',
        'rating' => '8.1/10',
        'releaseDate' => '2023-07-19',
        'duration' => '181 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ],
    [
        'title' => 'Titanic',
        'image' => 'images/titanic.jpg',
        'rating' => '7.3/10',
        'releaseDate' => '2023-06-29',
        'duration' => '158 Min',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.',
    ]];?>
       
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
                        <!-- <a href="#"><i class="fa-solid fa-bookmark"></i></a> -->
                        <a href="#" onclick="showShareForm('<?php echo $movie['title']; ?>')"><i class="fa-solid fa-share"></i></a>
                       </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
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
    document.querySelectorAll('.playlist a').forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('videoPlayer').src = event.target.getAttribute('href');
            document.querySelectorAll('.playlist li').forEach(function (li) {
                li.classList.remove('active');
            });
            event.target.parentNode.classList.add('active');
            document.getElementById('videoPlayer').load();
        });
    });


    function playVideo(video) {
    var videoPlayer = document.getElementById('videoPlayer');
    var videoSource = '<?php echo $videoSources[$selectedVideo]; ?>';
    
    // Update the video source
    videoPlayer.src = videoSource.replace('<?php echo $selectedVideo; ?>', video);

    // Load and play the new video
    videoPlayer.load();
    videoPlayer.play();
}
   </script>   

  <?php include_once "footer.php"?>
</body>
</html>
