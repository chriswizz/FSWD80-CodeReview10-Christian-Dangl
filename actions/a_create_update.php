<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../style/style.css">

<?php 
    require_once 'db_connect.php';

    if ($_POST) {
        $image = $_POST['image'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $desc = $_POST['description'];
        $publ_date = $_POST['publish_date'];
        $publisher = $_POST['publisher'];
        $type = $_POST['type'];
        $genre = $_POST['genre'];

        if ($_POST['id'] <> "") {
            $id = $_POST['id'];
            $sql = "UPDATE media SET image='$image', title='$title', fk_author=$author, isbn='$isbn', description='$desc', publish_date='$publ_date', fk_publisher=$publisher, fk_type=$type, fk_genre=$genre WHERE media_id=$id";
            if($connect->query($sql) === TRUE) {
                echo "<div class='container mt-5'>";
                echo "<h3>Item Successfully Updated</h3>";
                echo "<a href='../index.php'><button type='button' class='btn btn-dark border'>Back to Items</button></a>";
                echo "</div>";
            } else  {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }
        } else {
            $sql = "INSERT INTO media (image, title, fk_author, isbn, description, publish_date, fk_publisher, fk_type, fk_genre) VALUES ('$image', '$title', $author, '$isbn', '$desc', '$publ_date', $publisher, $type, $genre)";
            if($connect->query($sql) === TRUE) {
                echo "<div class='container mt-5'>";
                echo "<h3>New Item Successfully Created</h3>";
                echo "<a href='../create_update.php?action=create'><button type='button' class='btn btn-dark m-1 border'>Create New Item</button></a>";
                echo "<a href='../index.php'><button type='button' class='btn btn-dark m-1 border'>Back to Items</button></a>";
                echo "</div>";
            } else  {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }
        }
        $connect->close();
    }
?>