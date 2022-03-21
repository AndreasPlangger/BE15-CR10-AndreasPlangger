<?php

require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $picture = file_upload($_FILES['picture']);
    $name = $_POST['title'];
    $isbn = $_POST['isbn'];
    $desc = $_POST['desc'];
    $btype = $_POST['btype'];
    $authlast = $_POST['authlast'];
    $authfirst = $_POST['authfirst'];
    $pubname = $_POST['pubname'];
    $pubadd = $_POST['pubadd'];
    $pubdate = $_POST['pubdate'];
    $bstatus = $_POST['bstatus'];

    $uploadError = '';

    $sql = "INSERT INTO Media (picture, title, ISBN, short_description, book_type, author_last_name, author_first_name, publisher_name, publisher_address, publish_date, book_status) VALUES ('$picture->fileName', '$name', '$isbn', '$desc', '$btype', '$authlast', '$authfirst', '$pubname', '$pubadd', '$pubdate', '$bstatus')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created: <br>
            <table class='table table-bordered'>
            <thead>
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
            <hr>
            <tr>
            <td> $name </td>
            <td> $isbn </td>
            <td> $desc </td>
            <td> $btype </td>
            <td> $authlast </td>
            <td> $authfirst </td>
            <td> $pubname </td>
            <td> $pubadd </td>
            <td> $pubdate </td>
            <td> $bstatus </td>
            </tr>
            </table>
            <hr>
            <br/> You will be automatically redirected to the startpage in 5 seconds.";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
    header("refresh: 5; url = ../index.php");
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1 class="mt-5 mb-5">Create book info</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>