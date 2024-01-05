<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Details Page</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #1f1f1f;
      color: #fff;
    }

    header {
      background-color: #333;
      padding: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav {
      display: flex;
      gap: 20px;
      flex-grow: 1;
      justify-content: center; /* Center the links */
      align-items: center; /* Align items vertically */
    }

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #00a0e4;
    }

    .active {
      color: #00a0e4;
      font-weight: bold;
    }

    .user-links {
      display: flex;
      gap: 10px;
    }

    .login, .signup {
      color: #4caf50;
      text-decoration: none;
      padding: 10px;
      border: 1px solid #4caf50;
      border-radius: 4px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .login:hover, .signup:hover {
      background-color: #4caf50;
      color: #fff;
    }

    /* Movie Details Styles */
    .movie-details {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #333;
      border-radius: 8px;
    }

    .movie-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .genre {
      font-style: italic;
      color: #aaa;
      margin-bottom: 10px;
    }

    .user-ratings {
      margin-bottom: 10px;
    }

    .description {
      line-height: 1.5;
    }
  </style>
</head>
<body>

  <header>
<?php include_once "heading.php" ?>
  </header>

  <div class="movie-details">
    <div class="movie-title">The Movie Title</div>
    <div class="genre">Genre: Action, Adventure</div>
    <div class="user-ratings">User Ratings: 4.5/5</div>
    <div class="description">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
  </div>

  <!-- Your page content goes here -->

</body>
</html>
