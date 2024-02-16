<?php
include 'create.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="module" defer src="../js/script.js"></script>

</head>

<body class="flex justify-center items-center full min-h-screen">



    <main class="w-1/5 min-w-96 m-1">

        <form action="dashboard.php" method="post">
            <button type="submit" name="connexion">connexion</button>
        </form>

        <form action="create.php" method="POST" enctype="multipart/form-data" class="border border-solid border-black border-1 rounded-3xl bg-orange-200 shadow-2xl p-4">


            <div class="space-y-5">
                <div>
                    <div class="pt-2">
                        <h2 class=" font-semibold leading-7 text-gray-900 text-center capitalize text-xl">contact form</h2>
                        <div class="mt-1 grid grid-cols-1 gap-x-6p-2">

                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-base font-medium leading-6 text-gray-900 pl-2">First name</label>
                                <div class="mt-2 containerFirstName">
                                    <input type="text" onkeyup="validateFirstName()" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <span id="first-name-error" class="error-message text-sm"></span>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-base font-medium leading-6 text-gray-900 pl-2">Last name</label>
                                <div class="mt-2 ">
                                    <input type="text" onkeyup="validateLastName()" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <span id="last-name-error" class="error-message text-sm"></span>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email" class="block w-full text-base font-medium leading-6 text-gray-900 pl-2">Email address</label>
                                <div class="mt-2">
                                    <input id="email" onkeyup="validateEmail()" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                            <textarea id="about" onkeypress="validateDescription()" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
                                    <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-black">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
                <img src="captcha.php"/>
                <input type="text" name="captcha" />
                
            

            <div class="mt-6 flex items-center justify-center m-2 gap-x-6">
                <button type="submit" name="save" id="submit_btn" class="rounded-md bg-black px-7 py-2 text-base font-semibold text-white shadow-sm transition duration-200 hover:bg-white hover:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>

            </div>
        </form>
    </main>

</body>

</html>