<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles.css">
    <style>
     main{
        grid-template-areas:
        "head head head" 
        "side content content"
        "foot foot foot";

     }
     header{grid-area: head;}
     article{grid-area: content;}
     aside{grid-area:side;}
     footer{grid-area:foot}
    </style>
</head>
<body>
    <main class=" grid">
        <header class="bg-black h-20">Header</header>
        <article class=" bg-gray-600 h-20">Content</article>
        <aside class="bg-red-900 h-64">Sidebar</aside>
        <footer class=" bg-green-700 h-20">fotter</footer>
    </main>
</body>
</html>