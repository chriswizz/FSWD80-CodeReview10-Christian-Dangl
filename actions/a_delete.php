<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style/style.css">

<?php 
	require_once 'db_connect.php';

	if ($_POST) {
	    $id = $_POST['id'];

	    $sql = "DELETE FROM media WHERE media_id = $id";
	    if($connect->query($sql) === TRUE) {
	       echo "<p>Successfully deleted!</p>" ;
	       echo "<a href='../index.php'><button type='button' class='btn btn-dark btn-sm border'>Back</button></a>";
	    } else {
	       echo "Error deleting record: " . $connect->error;
	    }
	    $connect->close();
	}
?>
