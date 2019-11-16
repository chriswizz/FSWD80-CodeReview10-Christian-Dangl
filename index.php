<?php
	require_once "actions/db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books, CDs and DVDs</title>

	<style type ="text/css">
		.manageMedia {
			width: 100%;

		}
		table {
			width: 100%;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div class ="manageMedia">
		<a href="insert.php"><button type="button">Insert New Item</button></a>
		<table border="1" cellspacing= "0" cellpadding="0">
			<thead>
				<tr>
					<th>Image</th>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>ISBN</th>
					<th>Description</th>
					<th>Publish Date</th>
					<th>Publisher</th>
					<th>Type</th>
					<th>Genre</th>
					<th>Available</th>
					<th>Update/Delete</th>
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
							INNER JOIN `availability` ON fk_available = available_id";
					$result = $connect->query($sql);

					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo
							"<tr>
								<td>
									<img src=" . $row['image'] . " height=50px>
								</td>
								<td>" . $row['media_id'] . "</td>
								<td>" . $row['title'] . "</td>
								<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
								<td>" . $row['isbn'] . "</td>
								<td>" . $row['description'] . "</td>
								<td>" . $row['publish_date'] . "</td>
								<td>" . $row['publisher_name'] . "</td>
								<td>" . $row['type'] . "</td>
								<td>" . $row['genre'] . "</td>
								<td>" . $row['available'] . "</td>
								<td>
									<a href='insert.php?id=" . $row['media_id'] . "'><button type='button'>Update</button></a>
									<a href='delete.php?id=" . $row['media_id'] . "'><button type='button'>Delete</button></a>
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