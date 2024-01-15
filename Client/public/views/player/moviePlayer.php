<?php
$movie = urldecode($_GET["video_link"]);
?>



<?php include_once("../../components/header.php") ?>
<div class=" flex items-center justify-center py-32">
    <div style="max-width: 560px;" class=" mx-auto  bg-black rounded-md shadow-md overflow-hidden">
        <video id="myVideo" class="w-full" controls>
            <source src="http://localhost/Movie_Streaming_Web_App/Server/api/movie/<?php echo $movie ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>



<script>
    // JavaScript to handle play/pause functionality
    const video = document.getElementById('myVideo');
    const playButton = document.getElementById('playButton');
    $.event.special.touchstart = {
        setup: function(_, ns, handle) {
            this.addEventListener("touchstart", handle, {
                passive: false
            });
        },
    };

    $.event.special.touchmove = {
        setup: function(_, ns, handle) {
            this.addEventListener("touchmove", handle, {
                passive: false
            });
        },
    };
    video.addEventListener('mouseenter', () => {
        playButton.classList.remove('hidden');
    });

    video.addEventListener('mouseleave', () => {
        playButton.classList.add('hidden');
    });


    playButton.addEventListener('click', () => {
        if (video.paused) {
            video.play();
            playButton.innerHTML = '<img src="../../images/pause.svg" alt="" srcset="" class =" w-16 h-16"> ';
        } else {
            video.pause();
            playButton.innerHTML = '<img src="../../images/play.svg" alt="" srcset="" class =" w-16 h-16">';
        }
    });
</script>

<?php include_once("../../components/footer.php") ?>