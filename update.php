<?php

require_once 'actions/db_connect.php';

if ($_GET['bookID']) {
    $id = $_GET['bookID'];
    $sql = "SELECT * FROM Media WHERE bookID = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
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
<html>

<head>
    <title>The Big Library - Edit Media Info</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            width: 60%;
        }

        .img-thumbnail {
            width: 4vw !important;
            height: 11vh !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h1 mt-5 mb-4'>Update request <img class='img-thumbnail rounded ms-5' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <td><input class="form-control" type="text" name="title" placeholder="Book Title" value="<?php echo $name ?>" /></td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td><input class="form-control" type="number" name="isbn" placeholder="ISBN" value="<?= $isbn ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class="form-control" type="text" name="desc" placeholder="Description" value="<?= $desc ?>" /></td>
                </tr>
                <tr>
                    <th>Media Type</th>
                    <td><input class="form-control" type="text" name="btype" placeholder="Type" value="<?= $btype ?>" /></td>
                </tr>
                <tr>
                    <th>Author Last Name</th>
                    <td><input class="form-control" type="text" name="authlast" placeholder="Author Surname" value="<?= $authlast ?>" /></td>
                </tr>
                <tr>
                    <th>Author First Name</th>
                    <td><input class="form-control" type="text" name="authfirst" placeholder="Author Name" value="<?= $authfirst ?>" /></td>
                </tr>
                <tr>
                    <th>Publisher</th>
                    <td><input class="form-control" type="text" name="pubname" placeholder="Publisher" value="<?= $pubname ?>" /></td>
                </tr>
                <tr>
                    <th>Publisher address</th>
                    <td><input class="form-control" type="text" name="pubadd" placeholder="Publisher address" value="<?= $pubadd ?>" /></td>
                </tr>
                <tr>
                    <th>Publish date</th>
                    <td><input class="form-control" type="date" name="pubdate" placeholder="Publish date" value="<?= $pubdate ?>" /></td>
                </tr>
                <tr>
                    <th>Book Status</th>
                    <td><input class="form-control" type="text" name="bstatus" placeholder="available/reserved" value="<?= $bstatus ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?= $data['bookID'] ?>" />
                    <input type="hidden" name="picture" value="<?= $data['picture'] ?>" />
                    <td><button class="btn btn-success mt-3 mb-3" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning mt-3 mb-3" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>