<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 w-full">
    <header>
        
        <nav class="flex flex-row justify-end items-center p-4 w-full gap-8">

            <div class="flex justify-end">
                <a href="http://projets.test/Full-Stack-Project-hackers-poulette/php/index.php" class="font-bold text-xl">Accueil</a>
            </div>

            <form action="index.php" method="post">
                <button type="submit" name="déconnexion" class="font-bold text-xl bg-orange-200 px-4 py-2 rounded-md hover:bg-orange-400 transition duration-300">déconnexion</button>
            </form>


        </nav>
    </header>
    

    <table class="w-4/5 mx-auto mt-8 bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-orange-200 ">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Firstname</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Image</th>
                <th class="py-2 px-4">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';

            $sql = "SELECT * FROM users_coordonate";
            $req = $bdd->query($sql);

            while ($rep = $req->fetch()) { ?>
                <tr class="hover:bg-orange-100">
                    <td class="py-2 px-4 text-center"><?php echo $rep['name']; ?></td>
                    <td class="py-2 px-4 text-center"><?php echo $rep['firstname']; ?></td>
                    <td class="py-2 px-4 text-center"><?php echo $rep['mail']; ?></td>
                    <td class="py-2 px-4 text-center"><a href="view_img.php?id=<?php echo $rep['id']; ?>" target="_blank" class="text-blue-800 underline">image</a></td>
                    <td class="py-2 px-4 text-center"><?php echo $rep['description']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
