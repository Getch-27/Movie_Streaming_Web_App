 <?php include_once("../../components/adminAside2.php")  ?>


 <!-- Dashboard -->
 <div class="grid grid-cols-3 col-span-5 bg-gray-700 gap-4 align-middle px-32">
     <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
         <img src="../../public/images/multiple-users-silhouette.png" class=" w-16" alt="">
         <h1 class=" text-3xl font-medium"><?php echo $totalUsers ?></h1>
         <h6>Total Users</h6>
     </div>
     <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
         <img src="../../public/images/content-creator.png" class=" w-16" alt="">
         <h1 class=" text-3xl font-medium"><?php echo $totalCreators ?></h1>
         <h6>Total content Creators</h6>
     </div>
     <div class=" w-64 h-40 bg-gray-200 rounded-md shadow-sm p-4">
         <img src="../../public/images/film-slate.png" class=" w-16" alt="">
         <h1 class=" text-3xl font-medium"><?php echo $allMovies ?></h1>
         <h6>Total uploaded movies</h6>
     </div>
 </div>
 </div>

 </body>

 </html>