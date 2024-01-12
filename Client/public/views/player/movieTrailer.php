<?php
$triler_link =  urldecode($_GET['trailer']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>triler</title>
</head>

<body>
    <?php include_once("../../components/header.php"); ?>
    <!-- Your PHP code or HTML content here -->
    <div class=" flex items-center justify-center py-32">
        <div style="max-width: 560px;" class=" mx-auto  bg-black rounded-md shadow-md overflow-hidden">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $triler_link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>

    <?php include_once("../../components/footer.php"); ?>
</body>

</html>