<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $about = $_POST['about'];

    if (isset($_FILES['file-upload'])) {
        $file = $_FILES['file-upload'];
        $fileName = $file['name'];
        $fileContent = file_get_contents($file['tmp_name']);

        $insertQuery = "INSERT INTO users_coordonate (name, firstname, mail, file, description) VALUES (:firstname, :lastname, :email, :file, :about)";

        $re = $bdd->prepare($insertQuery);
        $re->bindParam(':firstname', $firstName, PDO::PARAM_STR);
        $re->bindParam(':lastname', $lastName, PDO::PARAM_STR);
        $re->bindParam(':email', $email, PDO::PARAM_STR);
        $re->bindParam(':file', $fileContent, PDO::PARAM_LOB);
        $re->bindParam(':about', $about, PDO::PARAM_STR);
        $re->execute();
      
        header("location: index.php");
    }
}
?>
