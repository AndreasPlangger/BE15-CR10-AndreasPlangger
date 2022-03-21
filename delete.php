<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'actions/db_connect.php';

if ($_GET['bookID']) {
    $id = $_GET['bookID'];
    $sql = "SELECT * FROM Media WHERE bookID = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $name = $data['title'];
        $isbn = $data['ISBN'];
        $desc = $data['short_description'];
        $btype = $data['book_type'];
        $authlast = $data['author_last_name'];
        $authfirst = $data['author_first_name'];
        $pubname = $data['publisher_name'];
        $pubadd = $data['publisher_address'];
        $pubdate = $data['publish_date'];
        $bstatus = $data['book_status'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Big Library - Delete Media</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 70%;
        }

        .img-thumbnail {
            width: 4vw !important;
            height: 11vh !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2 mb-3'>Delete book and all the info<img class='img-thumbnail rounded ms-5' src='pictures/<?= $picture ?>' alt="<?= $name ?>"></legend>
        <h5>You have selected the data below:</h5>
        <table class='table table-striped'>
            <thead class='table-secondary'>
                <tr>
                    <th class='h5'>Title</th>
                    <th class='h5'>ISBN</th>
                    <th class='h5'>Short description</th>
                    <th class='h5'>Book Type</th>
                    <th class='h5'>Author Surname</th>
                    <th class='h5'>Author Name</th>
                    <th class='h5'>Publisher</th>
                    <th class='h5'>Publisher address</th>
                    <th class='h5'>Publish date</th>
                    <th class='h5'>Book Status</th>
                </tr>
            </thead>
            <tr>
                <td><?= $name ?></td>
                <td><?= $isbn ?></td>
                <td><?= $desc ?></td>
                <td><?= $btype ?></td>
                <td><?= $authlast ?></td>
                <td><?= $authfirst ?></td>
                <td><?= $pubname ?></td>
                <td><?= $pubadd ?></td>
                <td><?= $pubdate ?></td>
                <td><?= $bstatus ?></td>
            </tr>
        </table>

        <h3 class="mb-4 mt-5">Are you sure?</h3>
        <form action="actions/a_delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="picture" value="<?= $picture ?>" />
            <button class="btn btn-success mb-5" type="submit">Yes</button>
            <a href="index.php"><button class="btn btn-warning mb-5" type="button">No</button></a>
        </form>
    </fieldset>
</body>

</html>