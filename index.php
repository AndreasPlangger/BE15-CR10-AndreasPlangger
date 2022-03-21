<?php

require_once "actions/db_connect.php";

$sql = "SELECT * FROM Media";
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
                <td>" . $row['publisher_name'] . "<br>" . "<a href='publisher.php?publisher_name=" . $row['publisher_name'] . "'><button class='btn btn-success btn-sm p-1 mt-2' type='button'><span style='font-size:x-small;'>Show Media</span></button></a></td>
                <td>" . $row['publisher_address'] . "</td>
                <td>" . $row['publish_date'] . "</td>
                <td>" . $row['book_status'] . "</td>
                <td><a href='details.php?bookID=" . $row['bookID'] . "'><button class='btn btn-primary btn-sm w-100 mb-2' type='button'>Info</button></a>
                <a href='update.php?bookID=" . $row['bookID'] . "'><button class='btn btn-warning btn-sm w-100 mb-2' type='button'>Edit</button></a>
                <a href='delete.php?bookID=" . $row['bookID'] . "'><button class='btn btn-danger btn-sm w-100' type='button'>Delete</button></a></td>
                </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Big Library</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 36vw !important;
            height: auto !important;
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
    <div class="manageProduct ms-3 me-3 mt-3">
        <p class='mt-5 mb-5 display-6'>Media List</p>
        <table class='table table-striped'>
            <thead class='table-success'>
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
                    <th class='h5'>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
        <div class='p-4'>
            <a href="create.php"><button class='btn btn-lg btn-primary' type="button">Add media</button></a>
        </div>
    </div>
</body>

</html>