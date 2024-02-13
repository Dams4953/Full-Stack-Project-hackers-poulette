<?php
include 'connection.php';

if (isset($_POST['save'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $file = $_FILES['file'];

    $insertQuery = "INSERT INTO users_coordonate (name, firstname, mail, file, description) VALUES (:last_name, :first_name, :email, :file_upload, :about)";

    $re = $bdd->prepare($insertQuery);
    $re->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $re->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $re->bindParam(':email', $email, PDO::PARAM_STR);
    $re->bindParam(':file_upload', $fileContent, PDO::PARAM_LOB);
    $re->bindParam(':about', $about, PDO::PARAM_STR);
    $re->execute();
}
?>
