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
                echo "<p>Item Successfully Updated</p>";
                echo "<a href='../insert.php'><button type='button'>Back</button></a>";
                echo "<a href='../index.php'><button type='button'>Home</button></a>";
            } else  {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }
        } else {
            $sql = "INSERT INTO media (image, title, fk_author, isbn, description, publish_date, fk_publisher, fk_type, fk_genre) VALUES ('$image', '$title', $author, '$isbn', '$desc', '$publ_date', $publisher, $type, $genre)";
            if($connect->query($sql) === TRUE) {
                echo "<p>New Item Successfully Created</p>";
                echo "<a href='../insert.php'><button type='button'>Back</button></a>";
                echo "<a href='../index.php'><button type='button'>Home</button></a>";
            } else  {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }
        }
        $connect->close();
    }
?>