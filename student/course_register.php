<?php
session_start();

if(isset($_SESSION['user_id'])){
    print_r($_SESSION);
}else{
    header("location:login.php");
}


include('../inc/connect.php');
include('../inc/functions.php');

$course_id = null;


if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cid'])){
    $course_id = $_GET['cid']; 
    $course = getCourseById($course_id, $conn);
}else{
    header('location:courses_list.php');
}

$student = getStudentById($_SESSION['user_id'], $conn);

$today = date("Y-m-d");
$register_date = $today;


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course-register'])){
    
	//senitize incoming data
	$register_date = $conn->real_escape_string(trim($_POST['register_date']));
    $payment = "unpaid";	
    $course_id = $conn->real_escape_string(trim($_POST['course_id']));
    $student_id = $conn->real_escape_string(trim($_POST['student_id']));

	//save to database
	$sql = "INSERT INTO registrations (`register_date`,`payment`,`course_id`, `student_id`) 
    VALUES ('{$register_date}', '{$payment}', '{$course_id}', {$student_id})";
   
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

    <h3>Course Info</h3>
    <p>
    Course: <?php echo $course['title']; ?> <br>
    Price: <?php echo $course['price']; ?> 
    </p>

    <h3>Registration Info</h3>
    <p>
    
    Register Date: <?php echo $register_date; ?> 

     
    </p>
    <h3>Student Info</h3>
    <p>
    Student Name: <?php echo $student['name']; ?> 
    </p>

	<form action="course_register.php" method="post">
		
        <input type="hidden" name="register_date" value="<?php echo $register_date;?>"/>        
        <input type="hidden" name="course_id" value="<?php echo $course['id'];?>"/>
        <input type="hidden" name="student_id" value="<?php echo $student['id'];?>"/>
        
     
		<input type="submit" name="course-register" value="Confirm"/>
	</form>

</body>
</html>