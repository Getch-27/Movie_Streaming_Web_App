<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="app.js"></script>
  <title>Header</title>
</head>
<style>
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
    justify-content: center;
    /* Center the links */
    align-items: center;
    /* Align items vertically */
  }

  nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    transition: color 0.3s ease;
  }

  nav a:hover {
    color: #4caf50;
    background-color: #e2e2e2;
  }

  .active {
    color: #4caf50;


    /* font-weight: bold; */
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    line-height: 2em;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .user-links {
    display: flex;
    gap: 10px;
  }

  .login,
  .signup {
    color: #4caf50;
    text-decoration: none;
    padding: 10px;
    border: 1px solid #4caf50;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .login:hover,
  .signup:hover {
    background-color: #4caf50;
    color: #fff;
  }

  .search-button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .search-button:hover {
    background-color: #45a049;
  }

  .search-box {
    position: relative;
    align-items: center;
    gap: 10px;
    padding-right: 2em;
    padding-top: 1em;
  }

  input[type="text"] {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #555;
    border-radius: 4px;
    background-color: #2c2c2c;
    color: #fff;
    width: 10em;
    transition: width 0.3s ease;
  }

  input[type="text"]:focus {
    width: 150px;
  }

  .logo {
    padding-left: 2em;
  }

  .logo img {
    border-radius: "50%";
  }

  .streamly {
    text-decoration: none;
    color: #fff;
    font-size: 2.4em;
    /* font-variant:small-caps; */
  }
</style>

<body>

  <header>
    <div class="logo">
      <a class="streamly" href="index.php" title="Your Logo">
        Streamly
        <!-- <img height="55em" src="images\Screenshot (281).png" alt="Logo"> -->
      </a>
    </div>

    <nav>
      <!--  class="active" -->
      <?php
      // Determine the current page
      $currentPage = basename($_SERVER['PHP_SELF']);
      ?>

      <nav>
        <a href="index.php" <?php echo ($currentPage == 'index.php') ? 'class="active"' : ''; ?>>Home</a>
        <a href="discover.php" <?php echo ($currentPage == 'discover.php') ? 'class="active"' : ''; ?>>Movies</a>
        <a href="recently.php" <?php echo ($currentPage == 'recently.php') ? 'class="active"' : ''; ?>>Recently Added</a>
        <div class="dropdown">
          <a href="#" class="dropbtn <?php echo ($currentPage == 'genre.php') ? 'active' : ''; ?>">Genre <i class="fa-solid fa-caret-down"></i></a>
          <div class="dropdown-content">
            <a href="#" <?php echo ($currentPage == 'action.php') ? 'class="active"' : ''; ?>>Action</a>
            <a href="#" <?php echo ($currentPage == 'comedy.php') ? 'class="active"' : ''; ?>>Comedy</a>
            <a href="#" <?php echo ($currentPage == 'drama.php') ? 'class="active"' : ''; ?>>Drama</a>

          </div>
        </div>
        <a href="aboutUs.php" <?php echo ($currentPage == 'aboutUs.php') ? 'class="active"' : ''; ?>>About Us</a>
        <div class="search-box">
          <input type="text" placeholder="Search movies...">
          <button class="search-button" onclick="toggleSearchOptions()">Search</button>
        </div>

        <div class="user-links">
          <a href="signin.php" class="login">Login</a>
          <a href="signin.php" class="signup">Signup</a>
        </div>
      </nav>

  </header>
  <!-- Navbar ends here -->
</body>

</html>


<?php if (isset($item['submenu'])) : ?>
  <div class="submenu dropdown-content">
    <?php foreach ($item['submenu'] as $subItem) : ?>
      <a href="<?php echo $subItem['url']; ?>" <?php echo ($currentPage == $subItem['url']) ? 'class="active"' : ''; ?>>
        <?php echo $subItem['text']; ?>
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>