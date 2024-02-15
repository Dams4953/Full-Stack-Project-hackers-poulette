<?php
include 'connection.php';

if (isset($_POST['save'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $about = $_POST['about'];

    $file = $_FILES['file-upload']; 
    $fileName = $file['name'];
    $fileContent = file_get_contents($file['tmp_name']);

    $insertQuery = "INSERT INTO users_coordonate (firstname, name, mail, file, description) VALUES (:first_name, :last_name, :email, :file, :about)";

    $re = $bdd->prepare($insertQuery);
    $re->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $re->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $re->bindParam(':email', $email, PDO::PARAM_STR);
    $re->bindParam(':file', $fileContent, PDO::PARAM_LOB);
    $re->bindParam(':about', $about, PDO::PARAM_STR);
    $re->execute();

    header("location: index.php");
}
?>
