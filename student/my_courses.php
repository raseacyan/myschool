<?php
session_start();
include('../inc/connect.php');
include('../inc/functions.php');


$courses =  getCoursesByStudentId($_SESSION['user_id'],$conn);


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
                <th>Course Title</th>         
				<th>Registered Date</th>               
                <th>Price</th>
                <th>Payment</th>
                <th>Action</th>
                
			</tr>
			<?php foreach($courses as $course): ?>
			<tr>
                <td><?php echo $course['title']; ?></td>              
				<td><?php echo $course['register_date']; ?></td>               
                <td><?php echo $course['price']; ?></td>
                <td><?php echo $course['payment']; ?></td>
                <td>
                	<a href="courses_single.php?cid=<?php echo $course['course_id']; ?>">view</a>
                </td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>