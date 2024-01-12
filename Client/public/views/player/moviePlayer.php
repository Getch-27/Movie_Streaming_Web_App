<?php
$movie = urldecode($_GET["video_link"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Additional styles can be added here */
    </style>
    <title>Fancy Video Player</title>
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">

    <div class="relative">
        <!-- Video Container -->
        <video id="myVideo" class="w-full" controls>
            <source src="http://localhost/Movie_Streaming_Web_App/Server/api/movie/<?php echo $movie ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Play Button -->
        <button id="playButton" class=" flex justify-center items-center w-20 h-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white  rounded-full text-gray-900 outline-none border-none">
            <img src="../../images/play.svg" alt="" srcset="" class=" w-16 h-16">
        </button>
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

</body>

</html>