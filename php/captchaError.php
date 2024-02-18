<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulaire de Connexion</title>
</head>

<body class="bg-gray-100 overflow-hidden">

    <header>

        <nav class="flex flex-row justify-end items-center p-4 w-full gap-8">

            <div class="flex justify-end">
                <a href="http://projets.test/Full-Stack-Project-hackers-poulette/php/index.php" class="font-bold text-xl p-2 group">
                    <img src="../img/accueil.svg" alt="accueil" style="width: 40px; height: auto;" class="font-bold text-xl px40 p-2 rounded-md hover:bg-orange-400 transition duration-300">
                </a>
            </div>


        </nav>
    </header>
    <main class="bg-gray-100 flex items-center justify-center mt-48">
        <div class="flex justify-center items-center">
            <div class="bg-white p-8 rounded shadow-md w-96">
                <p class="text-2xl font-bold mb-4 text-center">Captcha invalide</p>
                <p class="mb-4 text-center">Le captcha que vous avez saisi est invalide. Veuillez réessayer.</p>
                <a href="index.php" class="bg-orange-200 px-4 py-2 rounded-md hover:bg-orange-400 block w-full text-center">Réessayer</a>
            </div>
        </div>
    </main>

</body>

</html>