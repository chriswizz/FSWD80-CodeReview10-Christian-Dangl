<?php
    require_once "actions/db_connect.php";

    if ($_GET['action']=="create") $action = "Create New";
    if ($_GET['action']=="update") $action = "Update";

    $sql_authors = "SELECT * FROM authors ORDER BY last_name";
    $sql_publishers = "SELECT * FROM publishers ORDER BY publisher_name";
    $sql_types = "SELECT * FROM types ORDER BY type";
    $sql_genres = "SELECT * FROM genres ORDER BY genre";

    $result_authors = $connect->query($sql_authors);
    $result_publishers = $connect->query($sql_publishers);
    $result_types = $connect->query($sql_types);
    $result_genres = $connect->query($sql_genres);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM media 
                INNER JOIN `authors` ON fk_author = author_id
                INNER JOIN `publishers` ON fk_publisher = publisher_id
                INNER JOIN `sizes` ON fk_size = size_id
                INNER JOIN `types` ON fk_type = type_id
                INNER JOIN `genres` ON fk_genre = genre_id
                WHERE media_id = $id";
        $result = $connect->query($sql);
        $item = mysqli_fetch_assoc($result);
    } else {
        $id = "";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $action ?> Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <fieldset>
        <legend><?php echo $action ?> Item</legend>

        <form class="border border-success form-group" action="actions/a_create_update.php" method="post">
            <table cellspacing="0" cellpadding="0">
                <input type="hidden" name="id" value=<?php echo $id; ?>>
                <tr>
                    <th>Image:</th>
                    <td>
                      <input type="text" class="form-control" name="image" placeholder="Image Link" value="<?php if ($id<>"") echo $item['image']; ?>" />
                    </td>
                </tr>    
                <tr>
                    <th>Title:</th>
                    <td>
                      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php if ($id<>"") echo $item['title']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Author:</th>
                    <td>
                        <select type="number" class="form-control" name="author">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_authors)) {
                                    echo "<option ";
                                    if ($id<>"") if ($item['author_id']==$row['author_id']) echo "selected='selected' ";
                                    echo "value=" . $row['author_id'] . ">" . $row['last_name'] . ", " . $row['first_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>ISBN:</th>
                    <td>
                      <input type="text" class="form-control" name="isbn" placeholder="ISBN" value="<?php if ($id<>"") echo $item['isbn']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>
                      <input type="text" class="form-control" name="description" placeholder="Description" value="<?php if ($id<>"") echo $item['description']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Publish Date:</th>
                    <td>
                      <input type="date" class="form-control" name="publish_date" placeholder="Publish Date" value="<?php if ($id<>"") echo $item['publish_date']; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Publisher:</th>
                    <td>
                        <select type="number" class="form-control" name="publisher">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_publishers)) {
                                    echo "<option ";
                                    if ($id<>"") if ($item['publisher_id']==$row['publisher_id']) echo "selected='selected' ";
                                    echo "value=" . $row['publisher_id'] . ">" . $row['publisher_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>
                        <select type="number" class="form-control" name="type">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_types)) {
                                    echo "<option ";
                                    if ($id<>"") if ($item['type_id']==$row['type_id']) echo "selected='selected' ";
                                    echo "value=" . $row['type_id'] . ">" . $row['type'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Genre:</th>
                    <td>
                        <select type="number" class="form-control" name="genre">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_genres)) {
                                    echo "<option ";
                                    if ($id<>"") if ($item['genre_id']==$row['genre_id']) echo "selected='selected' ";
                                    echo "value=" . $row['genre_id'] . ">" . $row['genre'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type ="submit" class="btn btn-dark border">Submit</button></td>
                <tr>
                </tr>
                    <td><a href="index.php"><button type="button" class="btn btn-dark border">Back to Items</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>