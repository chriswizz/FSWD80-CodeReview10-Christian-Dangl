<?php
    require_once "actions/db_connect.php";

    $sql_authors = "SELECT * FROM authors";
    $sql_publishers = "SELECT * FROM publishers";
    $sql_types = "SELECT * FROM types";
    $sql_genres = "SELECT * FROM genres";

    $result_authors = $connect->query($sql_authors);
    $result_publishers = $connect->query($sql_publishers);
    $result_types = $connect->query($sql_types);
    $result_genres = $connect->query($sql_genres);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM media WHERE media_id = $id";
        $result = $connect->query($sql);
        $item = mysqli_fetch_assoc($result);
    } else {
        $id = "";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert New Item</title>

    <style type= "text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50% ;
        }

        table tr td {
            padding: 10px 0px ;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>Insert New Item</legend>

        <form action="actions/a_insert.php" method="post">
            <table cellspacing="0" cellpadding="0">
                <input type="text" name="id" value=<?php echo $id; ?>>
                <tr>
                    <th>Image:</th >
                    <td>
                      <input type="text" name="image" placeholder="Image Link" value="<?php if ($id<>"") echo $item['image']; ?>">
                    </td>
                </tr>    
                <tr>
                    <th>Title:</th>
                    <td>
                      <input type="text" name="title" placeholder="Title" value="<?php if ($id<>"") echo $item['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Author:</th>
                    <td>
                        <select type="number" name="author" selected=<?php if ($id<>"") echo $id; ?>>
                            <?php
                                while ($row = mysqli_fetch_assoc($result_authors)) {
                                    echo "<option value=" . $row['author_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>ISBN:</th>
                    <td>
                      <input type="text" name="isbn" placeholder="ISBN" value="<?php if ($id<>"") echo $item['isbn']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>
                      <input type="text" name="description" placeholder="Description" value="<?php if ($id<>"") echo $item['description']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Publish Date:</th>
                    <td>
                      <input type="date" name="publish_date" placeholder="Publish Date" value="<?php if ($id<>"") echo $item['publish_date']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Publisher:</th>
                    <td>
                        <select type="number" name="publisher">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_publishers)) {
                                    echo "<option value=" . $row['publisher_id'] . ">" . $row['publisher_name'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>
                        <select type="number" name="type">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_types)) {
                                    echo "<option value=" . $row['type_id'] . ">" . $row['type'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Genre:</th>
                    <td>
                        <select type="number" name="genre">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_genres)) {
                                    echo "<option value=" . $row['genre_id'] . ">" . $row['genre'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type ="submit">Submit</button></td>
                <tr>
                </tr>
                    <td><a href="index.php"><button type="button">Back to Items Overview</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>