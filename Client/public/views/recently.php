<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="styles.css">
  <title>Recently Added</title>
  <style>

.card {
  position: relative;
  width: 300px; /* Adjust the width as needed */
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: scale(1.1); /* Adjust the scale factor for the hover effect */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card img {
  width: 100%;
  height: auto;
  border-radius: 10px 10px 0 0;
}

.card:hover .content {
  transform: translateY(-150px); 
}


.card .content {
width: 100%;
height: 100%;
position: absolute;
top:9em;
bottom: 50em;
background: linear-gradient(rgba(0, 0, 0, 0.2), #9dc4ffd7);
/* padding: 2px; */
opacity: 0;
transition: all 0.5s;
}

.content .name {
font-size: 28px;
font-weight: 700;
/* position: relative;*/
top: 17em; 
}

.content .infos {
font-size: 12px;
font-weight: 600;
position: relative;
top: -19em;
}

.content .short-desc {
font-size: 14px;
line-height: 1.1;
padding: 6px 0;
position: relative;
top: 10em;
}

.content .icons a {
font-size: 18px;
color: #fff;
margin-right: 6px;
}

.content .icons a i {
transition: all 0.5s;
}
.content .icons a:hover{
    color: #4caf50;
}
 .discover{
    padding-top: .2em;
    width: 10em;
    padding-left: 17em;
    padding-bottom: .2em;
    align-content: center;
    font: 5em 'Arial', sans-serif ;
    font-size: xx-large;
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

<?php include_once "heading.php" ?>
  <!-- search -->
  <div class="header1">
  <h2 class="discover" >Recently Added</h2>
</div> 
<?php

$movies = [];

function addMovie($title, $image, $rating, $releaseDate, $duration, $description) {
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
addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('After', 'images/after.jpg', '7.6/10', '2023-09-07', '167 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('After', 'images/after.jpg', '7.6/10', '2023-09-07', '167 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Myfault', 'images/myfault.webp', '8.1/10', '2023-07-19', '181 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Deadpool', 'images/deadpool.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');
addMovie('Titanic', 'images/titanic.jpg', '7.3/10', '2023-06-29', '158 Min', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod delectus doloribus.');

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
                        <a href="mvplayerTvShows.php?video=<?php echo urlencode($movie['title']); ?>"><i class="fa-solid fa-play"></i></a>
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

    //movie card

   

   </script>   
  <?php include_once "footer.php" ?>
 
</body>
</html>
