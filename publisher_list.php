<?php
	require_once "actions/db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Big Library</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<div class ="container">
		<a href="index.php"><button type="button" class="btnFix btn btn-success border">Back to Items</button></a>
		<table class="table table-striped tableStickyHead" cellspacing= "0" cellpadding="0">
			<thead class="thead-dark">
				<tr>
					<th>Publisher Name</th>
					<th>Publisher Address</th>
					<th>Size</th>
					<th>Show&nbsp;Publications</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$sql = "SELECT * FROM publishers
							INNER JOIN `sizes` ON fk_size = size_id
							ORDER BY size_id DESC";
					$result = $connect->query($sql);

					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo
							"<tr>
								<td>" . $row['publisher_name'] . "</td>
								<td>" . $row['publisher_address'] . "</td>
								<td>" . $row['size'] . "</td>
								<td>
									<a href='publisher_publications.php?action=update&publisher_id=" . $row['publisher_id'] . "'><button type='button' class='btn btn-success btn-sm border'>Show&nbsp;Publications</button></a>
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