<footer class=" bg-gray-900 grid grid-cols-2 items-center md:grid-cols-3 lg:grid-cols-5 text-gray-500 py-8 px-4">
    <div class="bg-transparent p-4">
        <ul>
            <li> <a href="http://">Horror</a></li>
            <li> <a href="http://">Animation</a></li>
            <li> <a href="http://">Action</a></li>
            <li> <a href="http://">thriller</a></li>
            <li> <a href="http://">Sci-fi</a></li>
        </ul>
    </div>
    <div class="bg-transparent p-4">
        <h1>Links</h1>
        <ul>
            <li> <a href="http://">Contact</a></li>
            <li> <a href="http://">Terms Of service</a></li>
            <li> <a href="http://">FAQ</a></li>
            <li> <a href="http://"></a></li>
            <li> <a href="http://"></a></li>
        </ul>
    </div>

    <div class="bg-transparent p-4">
        <ul>
            <li><a href="http://">Watchlist</a></li>
            <li><a href="">New Movies</a></li>
            <li></li>
        </ul>
    </div>
    <div class="bg-transparent p-4 sm:col-span-4 lg:col-span-2">
        <h1>About Us</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid, aperiam distinctio repellendus, soluta iure nam autem numquam ab fuga velit ipsa harum illo atque, voluptatum ipsam delectus reprehenderit temporibus commodi.</p>
    </div>
</footer>
<script>
    //menu toggle button
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-sidebar').classList.add('open');
    });

    document.getElementById('mobile-menu-close').addEventListener('click', function() {
        document.getElementById('mobile-sidebar').classList.remove('open');
    });

    //play button
    $(document).ready(function() {
        // Attach hover event to all div elements with class 'group'
        $('.group').hover(
            function() {
                // Mouse over
                $(this).find('a').show();
            },
            function() {
                // Mouse out
                $(this).find('a').hide();
            }
        );
    });
    // window.addEventListener('scroll', function() {
    //         let scrollPosition = window.scrollY;

    //         // Map slowScroll to the interval [1, 2]
    //         console.log(scrollPosition);
    //         if(scrollPosition >= 78){
    //             document.getElementById('navigation').classList.remove('absolute');
    //             document.getElementById('navigation').classList.add('sticky');
            
    //         }else if(scrollPosition <78){
    //             document.getElementById('navigation').classList.remove('sticky');
    //             document.getElementById('navigation').classList.add('absolute');
    //         }
    //         // Apply the slow scroll to the specific section
            
    //     });
</script>

</body>