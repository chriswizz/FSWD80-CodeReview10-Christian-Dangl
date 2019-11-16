<?php
	require_once "actions/db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books, CDs and DVDs</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<div class ="container">
		<a href="create_update.php?a=create"><button type="button" class="btnFix btn btn-success border">Create New Item</button></a>
		<table class="table table-striped tableStickyHead" cellspacing= "0" cellpadding="0">
			<thead class="thead-dark">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Author</th>
					<th>ISBN</th>
					<th>Publish Date</th>
					<th>Publisher</th>
					<th>Type</th>
					<th>Genre</th>
					<th>Available</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$sql = "SELECT * FROM media
							INNER JOIN `authors` ON fk_author = author_id
							INNER JOIN `publishers` ON fk_publisher = publisher_id
							INNER JOIN `sizes` ON fk_size = size_id
							INNER JOIN `types` ON fk_type = type_id
							INNER JOIN `genres` ON fk_genre = genre_id
							INNER JOIN `availability` ON fk_available = available_id
							ORDER BY title";
					$result = $connect->query($sql);

					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo
							"<tr>
								<td>
									<img src=" . $row['image'] . " height=50px>
								</td>
								<td>" . $row['title'] . "</td>
								<td>" . $row['last_name'] . ", " . $row['first_name'] . "</td>
								<td>" . $row['isbn'] . "</td>
								<td>" . $row['publish_date'] . "</td>
								<td>" . $row['publisher_name'] . "</td>
								<td>" . $row['type'] . "</td>
								<td>" . $row['genre'] . "</td>
								<td>" . $row['available'] . "</td>
								<td>
									<a href='create_update.php?a=update&id=" . $row['media_id'] . "'><button type='button' class='btn btn-success btn-sm border'>Update</button></a>
									<a href='delete.php?id=" . $row['media_id'] . "'><button type='button' class='btn btn-success btn-sm border'>Delete</button></a>
									<a href='details.php?id=" . $row['media_id'] . "&image=" . $row['image'] . "&title=" . $row['title'] . "&first_name=" . $row['first_name'] . "&last_name=" . $row['last_name'] . "&isbn=" . $row['isbn'] . "&description=" . $row['description'] . "&publish_date=" . $row['publish_date'] . "&publisher_name=" . $row['publisher_name'] . "&type=" . $row['type'] . "&genre=" . $row['genre'] . "&available=" . $row['available'] . "'><button type='button' class='btn btn-success btn-sm border'>Details</button></a>
								</td>
							</tr>";
						}
					} else {
						echo "<center><font color='red'>No Data Avaliable</font></center>";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>