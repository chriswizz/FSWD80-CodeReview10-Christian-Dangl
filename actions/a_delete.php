<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../style/style.css">

<?php 
	require_once 'db_connect.php';

	if ($_POST) {
	    $id = $_POST['id'];

	    $sql = "DELETE FROM media WHERE media_id = $id";
	    if($connect->query($sql) === TRUE) {
			echo "<div class='container mt-5'>";
	        echo "<h3>Successfully deleted</h3>";
	        echo "<a href='../index.php'><button type='button' class='btn btn-dark border'>Back to Items</button></a>";
	        echo "</div>";
	    } else {
	        echo "Error deleting record: " . $connect->error;
	    }
	    $connect->close();
	}
?>