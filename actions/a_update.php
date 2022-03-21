<?php

require_once 'db_connect.php';
require_once 'file_upload.php';


if ($_POST) {
    $id = $_POST['id'];
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

    if ($picture->error === 0) {
        ($_POST["picture"] == "product.png") ?: unlink("../pictures/$_POST[picture]");
        $sql = "UPDATE Meda SET picture = '$picture->fileName', title = '$name', ISBN = $isbn, short_description = '$desc', book_type = '$btype', author_last_name = '$authlast', author_first_name = '$authfirst', publisher_name = '$pubname', publisher_address = '$pubadd', publish_date = '$pubdate', book_status = '$bstatus' WHERE bookID = {$id}";
    } else {
        $sql = "UPDATE Media SET title = '$name', ISBN = $isbn, short_description = '$desc', book_type = '$btype', author_last_name = '$authlast', author_first_name = '$authfirst', publisher_name = '$pubname', publisher_address = '$pubadd', publish_date = '$pubdate', book_status = '$bstatus' WHERE bookID = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Meda data has been successfully updated.";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while updating record: <br>" . mysqli_connect_error();
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
            <h1 class="mt-5 mb-5">Update Media info</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= ($message) ?? ''; ?></p>
            <p><?= ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>