<?php
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
        $tcontent = "<tr>
            <td>" . $name . "</td>
            <td>" . $isbn . "</td>
            <td>" . $desc . "</td>
            <td>" . $btype . "</td>
            <td>" . $authlast . "</td>
            <td>" . $authfirst . "</td>
            <td>" . $pubname . "</td>
            <td>" . $pubadd . "</td>
            <td>" . $pubdate . "</td>
            <td>" . $bstatus . "</td>
            </tr>";
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
    <title>Book details</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <p class='h2 text-center mt-5 mb-5'> <?= $name ?> </p>
        <img src="pictures/<?= $picture ?>" class="rounded mx-auto d-block mb-3 " alt="<?= $name ?>" width="200px">
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
            <tbody>
                <?= $tcontent; ?>
            </tbody>
        </table>
        <div class='mb-3 d-flex justify-content-end'>
            <a href="index.php"><button class='btn btn-md btn-primary' type="button">Back</button></a>
        </div>
    </div>
</body>

</html>