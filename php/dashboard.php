<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>dashboard</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            color: #3490dc;
            text-decoration: underline;
            cursor: pointer;
        }

        td a:hover {
            color: #2779bd;
        }
    </style>
</head>

<body>
    <h1>dashboard</h1>
    <table>
        <?php
        include 'connection.php';

        $sql = "SELECT * FROM users_coordonate";
        $req = $bdd->query($sql);


        while ($rep = $req->fetch()) { ?>
            <tr>
                <td><?php echo $rep['name']; ?></td>
                <td><?php echo $rep['firstname']; ?></td>
                <td><?php echo $rep['mail']; ?></td>
                <td><a href="view_img.php?id=<?php echo $rep['id']; ?>" target="_blank">image</a></td>
                <td><?php echo $rep['description']; ?></td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>