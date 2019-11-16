<!DOCTYPE html>
<html>
<head>
    <title><?php echo $action ?> Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <fieldset>
        <legend>Item Details</legend>

        <div class="border border-success">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>Image:</th>
                    <td>
                      <img src=<?php echo $_GET['image']; ?>>
                    </td>
                </tr>    
                <tr>
                    <th>Title:</th>
                    <td>
                      <?php echo $_GET['title']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Author:</th>
                    <td>
                        <?php echo $_GET['last_name'] . ", " . $_GET['first_name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>ISBN:</th>
                    <td>
                      <?php echo $_GET['isbn']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>
                      <?php echo $_GET['description']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Publish Date:</th>
                    <td>
                      <?php echo $_GET['publish_date']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Publisher:</th>
                    <td>
                        <?php echo $_GET['publisher_name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>
                        <?php echo $_GET['type']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Genre:</th>
                    <td>
                        <?php echo $_GET['genre']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Available:</th>
                    <td>
                        <?php if ($_GET['available']=="true") echo "available"; else echo "reserved"; ?>
                    </td>
                </tr>
                </tr>
                    <td><a href="index.php"><button type="button" class="btn btn-dark btn-sm border">Back to Items</button></a></td>
                </tr>
            </table>
        </div>
    </fieldset>
</body>
</html>