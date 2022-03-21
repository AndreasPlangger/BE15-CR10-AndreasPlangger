<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture == "product.png") ?: unlink("../pictures/$picture");

    $sql = "DELETE FROM Media WHERE bookID = {$id}";
    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The book has been successfully deleted! <br/> You will be redirected to the startpage in 5 seconds.";
    } else {
        $class = "danger";
        $message = "An error occured: <br>" . $connect->error . "<br/> You will be redirected in 3 seconds.";
    }
    mysqli_close($connect);
    header("refresh: 5; url= ../index.php");
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1 class="mt-5 mb-5">Delete book info</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>