<?php include_once "./components/header2.php" ?>
<div class="owl-carousel">
  <div> <img src="./images/animation.jpg" alt="" srcset=""> </div>
  <div> <img src="./images/avatar.jpg" alt="" srcset=""> </div>
  <div> <img src="./images/jhon wick.jpg" alt="" srcset=""> </div>
  <div> <img src="./images/black panther.jpg" alt="" srcset=""> </div>
  <div> <img src="./images/mimo.jpg" alt="" srcset=""> </div>
  <div> <img src="./images/venom.jpg" alt="" srcset=""> </div>
</div>
<script>
 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>
</body>

</html>