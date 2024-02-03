<?php include_once("../../components/adminAside2.php")  ?>


<!-- Delete Creator-->
<div class=" bg-gray-700 gap-4 col-span-5 align-middle px-8">
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Creator ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCreators as $creator) : ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $creator['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $creator['username']; ?></td>
                    <td class="border px-4 py-2"><?php echo $creator['email']; ?></td>
                    <td class="border px-4 py-2">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>

</body>

</html>