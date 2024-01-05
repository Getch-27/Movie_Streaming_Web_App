<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>About Us</title>
</head>
<body>
<?php include_once "heading.php" ?> 

<style>
      body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        #company-overview {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        h2, h3 {
            color: #45a049;
        }

        p {
            line-height: 1.6;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }
    
        /* members */

.list-team-members {
  width: 66em;
  padding-left: 19em;
  padding-bottom: 9em;

  height: 6em;
  /* margin: 0px auto; */
}
.list-team-members li {
  padding: 0px;
  margin: 10px;
  text-align: center;
  list-style-type: none;
  display: inline-block;
  transition-duration: .3s;
}
.list-team-members li a {
  position: relative;
  text-decoration: none;
  display: inline-block;
  color: #ffffff;
  transition-duration: .3s;
}
.list-team-members li a:hover {
  transform: scale(1.1, 1.1);
}
.list-team-members li a:after {
  content: "";
  position: absolute;
  top: 0px;
  left: 0px;
  height: 130px;
  width: 130px;
  /* background-color: rgba(122, 170, 189, 0.2); */
  border-radius: 50%;
  opacity: 0;
  transition-duration: .3s;
}
.list-team-members li a:hover:after {
  opacity: 1;
}
.list-team-members li img {
  object-fit: cover;
  object-position: center center;
  height: 100px;
  width: 100px;
  border-radius: 50%;
  transition-duration: .3s;
}
.list-team-members li .member-title {
  display: block;
  margin-bottom: 10px;
  color:#fff;
}
.list-team-members li .member-title-hover {
  text-align: center;
  transition-duration: .3s;
  padding: 5px 10px;
  background: #36454d;
  color: #4caf50;
  z-index: 2;
}
.list-team-members li a:hover .member-title-hover {
  opacity: 1;
  top: 90px;
}

.detail-button {
  color: #4caf50;
  text-decoration: none;
  padding: 5px 10px;
  border: 1px solid #4caf50;
  border-radius: 4px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.detail-button:hover {
  background-color: #4caf50;
  color: #fff;
}
    </style>

<section id="company-overview">
        <h2>Welcome to Streamly</h2>

        <p>
            Discover a world of entertainment at Streamly.com. We are your go-to destination for a diverse collection of movies, TV shows, and exclusive content, all accessible at your fingertips.
        </p>

        <p>
            Launched in 2019 , Streamly has redefined the way audiences experience cinematic content. With a passion for storytelling and a commitment to delivering top-notch streaming services, we have become a leading name in the digital entertainment industry.
        </p>

        <h3>Our Mission</h3>

        <p>
            At Streamly, our mission is to provide an unparalleled streaming experience that caters to the varied tastes of our global audience. We aim to connect viewers with captivating stories, from classic films to the latest releases, creating a virtual cinema right in the comfort of your home.
        </p>

        <h3>Key Features</h3>

        <ul>
            <li><strong>Extensive Library:</strong> Dive into a vast library of movies and TV shows spanning genres, languages, and cultures.</li>
            <li><strong>High-Quality Streaming:</strong> Enjoy high-definition streaming with our cutting-edge technology, ensuring a seamless and immersive viewing experience.</li>
            <li><strong>Exclusive Content:</strong> Access exclusive content available only on [Your Movie Streaming Platform], including original productions and collaborations with renowned filmmakers.</li>
        </ul>

        <h3>Our Community</h3>

        <p>
            Streamly is not just a streaming service; it's a community of movie enthusiasts. Join us in celebrating the art of cinema, engaging in discussions, and connecting with fellow movie lovers from around the world.
        </p>

        <h3>Embark on a Cinematic Journey</h3>

        <p>
            Whether you're a fan of timeless classics, blockbuster hits, or hidden gems, [Your Movie Streaming Platform] has something for everyone. Start exploring our platform today and embark on a cinematic journey like never before.
        </p>

        <p>
            Lights, camera, action – Welcome to Streamly.
        </p>
    </section>
  <!-- Meet our Members -->
<h2 style="text-align: center; font: 3em sans-serif; color:#fff">Meet Our Members</h2>
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
  </ul>
  <?php include_once "footer.php" ?>
</body>
</html>