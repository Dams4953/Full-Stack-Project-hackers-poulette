<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM users_coordonate WHERE id = :id";
    $stmt = $bdd->prepare($selectQuery);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fileName = $row['name'];
        $fileContent = base64_encode($row['file']);
        $fileType = "image/*";

        echo '<html>';
        echo '<head>';
        echo '<title>Image Viewer</title>';
        echo '</head>';
        echo '<body>';
        echo '<img src="data:' . $fileType . ';base64,' . $fileContent . '" alt="' . $fileName . '">';
        echo '</body>';
        echo '</html>';

        exit;
    }
}
?>
