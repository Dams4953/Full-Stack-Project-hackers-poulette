<?php
require("php/scriptMail.php");
?>
<?php
include "php/create.php";
?>
<?php
if (isset($_POST['save'])) {
    if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="../js/script.js"></script>
    <link href="../src/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact form</title>
</head>

<body class="bg-gray-100 w-full">
    <header>

        <nav class="flex flex-row justify-end items-center p-4 w-full gap-8">

            <form action="connexion.php" method="post">
                <button type="submit" name="connexion" class="font-bold text-xl bg-orange-200 px-4 py-2 rounded-md hover:bg-orange-400 transition duration-300 border-gray-500 rounded-2xl bg-orange-200 shadow-2xl p-6">Connexion</button>
            </form>

            <a href="http://projets.test/Full-Stack-Project-hackers-poulette/php/index.php" class="font-bold text-xl p-2 group">
                <img src="../img/accueil.svg" alt="accueil" style="width: 40px; height: auto;" class="font-bold text-xl px40 p-2 rounded-md hover:bg-orange-400 transition duration-300">
            </a>

        </nav>
    </header>


    <main class="container mx-auto my-8 p-4 flex justify-center items-center">

        <form action="create.php" method="POST" id="form_contact" enctype="multipart/form-data" class="contact-form border-gray-500 rounded-2xl bg-orange-200 shadow-2xl p-6">

            <div class="space-y-5">
                <div>
                    <div class="pt-2">
                        <h2 class=" font-semibold leading-7 text-gray-900 text-center capitalize text-xl">contact form</h2>
                        <div class="mt-1 grid grid-cols-1 gap-x-6p-2">

                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-base font-medium leading-6 text-gray-900 pl-2">First name</label>
                                <div class="mt-2 containerFirstName">
                                    <input type="text" onkeyup="validateFirstName()" name="first-name" id="first-name" autocomplete="given-name" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-800">
                                    <span id="first-name-error" class="error-message text-sm"></span>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-base font-medium leading-6 text-gray-900 pl-2">Last name</label>
                                <div class="mt-2 ">
                                    <input type="text" onkeyup="validateLastName()" name="last-name" id="last-name" autocomplete="family-name" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-800">
                                    <span id="last-name-error" class="error-message text-sm"></span>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email" class="block w-full text-base font-medium leading-6 text-gray-900 pl-2">Email address</label>
                                <div class="mt-2">
                                    <input id="email" onkeyup="validateEmail()" name="email" type="email" autocomplete="email" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-800">
                                    <span id="text" class="text-sm"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 grid grid-cols-1 gap-x-6  sm:grid-cols-6 px-2">
                    <div class="col-span-full ">
                        <label for="about" class="block text-base font-medium leading-6 text-gray-900 pl-2">Description</label>
                        <div class="mt-2">
                            <textarea id="about" onkeyup="validateDescription()" name="about" rows="3" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-800"></textarea>
                            <span id="description-error" class="error-message text-sm"></span>
                        </div>
                    </div>

                    <div class="col-span-full px-2 py-2">
                        <label for="cover-photo" class="block text-base font-medium leading-6 text-gray-900 pl-2">Cover photo</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-black-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-2 flex text-base leading-6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold focus-within:outline-none focus-within:ring-2 focus-within:ring-gray-600 focus-within:ring-offset-2 hover:text-black">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-center mt-8">
                <img src="captcha.php" alt="Captcha Image" class="border border-gray-300 rounded-md shadow-md mr-4">
                <input type="text" name="captcha" placeholder="Entrez le captcha" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-800">
            </div>

            <div class="mt-6 flex items-center justify-center m-2 gap-x-6">
                <input type="hidden" name="fake_token" value="<?php echo $_SESSION['fake_token']; ?>">
                <button type="submit" name="save" id="submit_btn" class="rounded-md bg-black px-7 py-2 text-base font-semibold text-white shadow-sm transition duration-200 hover:bg-white hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>

            </div>
            <div id="ok"></div>
            <?php
            if (@$response == "success") {
            ?>

                <p class="success">Email send successfully</p>
            <?php
            }
            ?>
        </form>
    </main>
</body>

</html>