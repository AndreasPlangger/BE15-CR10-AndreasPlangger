<?php
require_once 'actions/db_connect.php';

if ($_GET['publisher_name']) {
    $publisher = $_GET['publisher_name'];
    $sql = "SELECT * FROM Media WHERE publisher_name = '$publisher'";
    $result = mysqli_query($connect, $sql);
    $tbody = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $tbody .= "<tr>
                <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'</td>
                <td>" . $row['title'] . "</td>
                <td>" . $row['ISBN'] . "</td>
                <td>" . $row['short_description'] . "</td>
                <td>" . $row['book_type'] . "</td>
                <td>" . $row['author_last_name'] . "</td>
                <td>" . $row['author_first_name'] . "</td>
                <td>" . $row['publisher_name'] . "</td>
                <td>" . $row['publisher_address'] . "</td>
                <td>" . $row['publish_date'] . "</td>
                <td>" . $row['book_status'] . "</td>
                </tr>";
        }
    } else {
        $tbody = "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
    }
}
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author page</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 4vw !important;
            height: 11vh !important;
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
        <table class='table table-striped mt-5'>
            <thead class='table-secondary'>
                <tr>
                    <th class='h5'>Picture</th>
                    <th class='h5'>Title</th>
                    <th class='h5'>ISBN</th>
                    <th class='h5'>Short description</th>
                    <th class='h5'>Media Type</th>
                    <th class='h5'>Author Last Name</th>
                    <th class='h5'>Author First Name</th>
                    <th class='h5'>Publisher</th>
                    <th class='h5'>Publisher address</th>
                    <th class='h5'>Publish date</th>
                    <th class='h5'>Status</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
        <div class='mb-3 d-flex justify-content-end'>
            <a href="index.php"><button class='btn btn-md btn-primary' type="button">Back</button></a>
        </div>
    </div>
</body>

</html>