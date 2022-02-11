<?php
include('../inc/connect.php');
include('../inc/functions.php');


$courses = getCourses($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($courses): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Price</th>
				<th>Teacher</th>
			</tr>
			<?php foreach($courses as $course): ?>
			<tr>
				<td><?php echo $course['title']; ?></td>
				<td><?php echo nl2br($course['description']); ?></td>
				<td><?php echo $course['price']; ?></td>
				<td><?php echo $course['teacher_name']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>