<?php
include 'connection.php';
session_start();

if (isset($_POST['save']) && isset($_POST['captcha'])) {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        echo "captcha valide !";

        // évite des attaques XSS
        $firstName = htmlspecialchars($_POST['first-name'], ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars($_POST['last-name'], ENT_QUOTES, 'UTF-8');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');

        if ($email === false) {

            echo "Erreur : Adresse email invalide.";
        } else {
            if (isset($_FILES['file-upload'])) {
                $file = $_FILES['file-upload'];

                // évite injection de fichiers malveillants
                $extensionsFiles = ['jpg', 'jpeg', 'png', 'pdf'];
                $uploadedFileInfo = pathinfo($file['name']);
                $uploadedFileExtension = strtolower($uploadedFileInfo['extension']);

                if (!in_array($uploadedFileExtension, $extensionsFiles)) {

                    echo "Erreur : Extension de fichier non autorisée.";
                } else {
                    // évite les attaques DoS
                    $maxFileSize = 30 * 1024 * 1024;

                    if ($file['size'] > $maxFileSize) {

                        echo "Erreur : Fichier trop volumineux.";
                    } else {

                        $fileContent = file_get_contents($file['tmp_name']);

                        // évite les attaques d'injection SQL
                        $insertQuery = "INSERT INTO users_coordonate (name, firstname, mail, file, description) VALUES (:firstname, :lastname, :email, :file, :about)";
                        $re = $bdd->prepare($insertQuery);

                        $re->bindParam(':firstname', $firstName, PDO::PARAM_STR);
                        $re->bindParam(':lastname', $lastName, PDO::PARAM_STR);
                        $re->bindParam(':email', $email, PDO::PARAM_STR);
                        $re->bindParam(':file', $fileContent, PDO::PARAM_LOB);
                        $re->bindParam(':about', $about, PDO::PARAM_STR);

                        if ($re->execute()) {
                            header("location: index.php");
                        } else {

                            echo "Erreur : Impossible d'ajouter l'utilisateur.";
                        }
                    }
                }
            }
        }
    } else {
        echo "captcha invalide...";
    }
}
