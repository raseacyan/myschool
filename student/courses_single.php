<?php 

session_start();
if(isset($_SESSION['user_id'])){
	print_r($_SESSION);
}

include('../inc/connect.php');
include('../inc/functions.php');

$course_id = $_GET['cid'];

$course = getCourseById($course_id, $conn);


$resources = getResourcesByCourseId($course_id, $conn);




?>

<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<h3>Course Info</h3>
	<p>
		Course Title: <?php echo $course['title']; ?>
	</p>
	<p>
		Course Teacher: <?php echo getTeacherNameById($course['teacher_id'], $conn); ?>
	</p>
	<p>
		Course Description: <?php echo nl2br($course['description']); ?>
	</p>

	<h3>Resources Info</h3>

	<?php if($resources): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
                <th>URL</th>         
				<th>Description</th>               
               
                
			</tr>
			<?php foreach($resources as $resource): ?>
			<tr>
                <td><?php echo $resource['url']; ?></td>              
				<td><?php echo $resource['description']; ?></td>               
               
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

</body>
</html>