<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulaire de Connexion</title>
</head>

<body  class="bg-gray-100 w-full">
    <header>

        <nav class="flex flex-row justify-end items-center p-4 w-full gap-8">

            <div class="flex justify-end">
                <a href="http://projets.test/Full-Stack-Project-hackers-poulette/php/index.php" class="font-bold text-xl">Accueil</a>
            </div>

        </nav>
    </header>


    <main  class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-semibold mb-6">Connexion</h1>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" class="w-full p-2 border rounded">
                </div>



                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded">
                </div>

                <button name="connect" type="submit" class="w-full bg-orange-200 p-2 rounded hover:bg-orange-400">Se Connecter</button>

                <?php
                session_start();
                include "connection.php";

                if (isset($_POST["connect"])) {
                    if (isset($_POST["username"]) && isset($_POST["password"])) {

                        $usernam = htmlspecialchars($_POST["username"]);
                        $pwd = sha1($_POST["password"]);

                        $recupUse = $bdd->prepare('SELECT * FROM connexion WHERE username = :username AND password = :password');
                        $recupUse->execute(array('username' => $_POST['username'], 'password' => $_POST['password']));
                        $count = $recupUse->rowCount();
                        if ($count > 0) {

                            $_SESSION['username'] = $_POST['username'];
                            header('location:dashboard.php');
                        } else { ?>
                            <div class='bg-red-200 p-2 w-full rounded my-5'>
                                <p class='text-red-700'>
                                    <?php echo 'Username or password is wrong'; ?>
                                </p>
                            </div>
                <?php }
                    }
                } ?>
            </form>
        </div>
    </main>


</body>

</html>