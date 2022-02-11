<?php

include('../inc/connect.php');
include('../inc/functions.php');

$teachers = getTeachers($conn);

if(isset($_POST['add-course'])){
	//senitize incoming data
	$title = $conn->real_escape_string(trim($_POST['title']));
	$description = $conn->real_escape_string(trim($_POST['description']));
	$price = $conn->real_escape_string(trim($_POST['price']));	
	$teacher_id = $conn->real_escape_string(trim($_POST['teacher_id']));

	//save to database
	$sql = "INSERT INTO courses (title, description, price, teacher_id  ) VALUES ('{$title}', '{$description}', '{$price}', '{$teacher_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:courses_list.php');
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

	<form action="courses_add.php" method="post">
		<label for="title">Course Title</label><br>
		<input type="text" name="title"  required /><br>

		<label for="description">Course Description</label><br>
		<textarea name="description"></textarea><br>

		<label for="price">Price</label><br>
		<input type="text" name="price"  required /><br>

		<label for="teacher_id">Teacher</label><br>
		<select name="teacher_id">
			<?php foreach($teachers as $teacher): ?>
				<option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['name']; ?></option>
			<?php endforeach; ?>
		</select><br>

		<br>
		<input type="submit" name="add-course" value="submit"/>
	</form>

</body>
</html>