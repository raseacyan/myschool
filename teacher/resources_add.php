<?php
session_start();
if(isset($_SESSION['user_id'])){
	print_r($_SESSION);
}

include('../inc/connect.php');
include('../inc/functions.php');

$course_id = $_GET['cid'];
$teacher_id = $_SESSION['user_id'];

if(isset($_POST['add-resource'])){
	//senitize incoming data
	$url  = $conn->real_escape_string(trim($_POST['url']));
	$description = $conn->real_escape_string(trim($_POST['description']));
	$course_id = $conn->real_escape_string(trim($_POST['course_id']));	
	$teacher_id = $conn->real_escape_string(trim($_POST['teacher_id']));

	//save to database
	$sql = "INSERT INTO resources (url, description, course_id, teacher_id  ) VALUES ('{$url}', '{$description}', '{$course_id}', '{$teacher_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:my_courses.php');
	} else {
	  echo "Error: ".$conn->error;
	}
	
}


$conn->close();
?>

<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<h3>Add Resource</h3>

	<form action="resources_add.php" method="post">
		<label for="url">URL</label><br>
		<input type="text" name="url"  required /><br>

        <label for="description">Description</label><br>
		<textarea name="description"></textarea><br>       

		<input type="hidden" name="course_id" value="<?php echo $course_id; ?>"/>
		<input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>"/>


		<br>
		<input type="submit" name="add-resource" value="submit"/>
	</form>

</body>
</html>