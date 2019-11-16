 <?php 
	$localhost = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "cr10_christian_dangl_biglibrary";

	// create connection
	$connect = new mysqli($localhost, $username, $password, $dbname);

	// check connection
	if($connect->connect_error) {
	    die("<br><font color='red'><b>connection failed: " . $connect->connect_error . "</b></font>");
	} else {
	    // echo "Successfully Connected";
	}
?>