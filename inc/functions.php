<?php


/*******************
Courses
********************/


function getCourses($conn){
	$sql = "SELECT c.id, 

	c.title, c.description, c.price, t.name AS teacher_name from courses AS c, teachers AS t WHERE c.teacher_id = t.id";	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getCourseById($id, $conn){
	$sql = "SELECT * from courses WHERE `id`={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();	
            $data = $row;	
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getCoursesByStudentId($id, $conn){
	$sql = "SELECT r.register_date, r.payment, r.course_id, c.title, c.price
    FROM registrations AS r, courses AS c
    WHERE r.course_id=c.id AND r.student_id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getCoursesByTeacherId($id, $conn){
	$sql = "SELECT *
    FROM courses AS c
    WHERE c.teacher_id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/*******************
Resources
********************/

function getResourcesByCourseId($id, $conn){
	$sql = "SELECT * FROM resources WHERE course_id = {$id}";	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


/*******************
Students
********************/
function getStudentById($id, $conn){
	$sql = "SELECT * from students WHERE `id`={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();	
            $data = $row;	
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/*******************
Teachers
********************/

function getTeachers($conn){
	$sql = "SELECT * from teachers";	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getTeacherNameById($id, $conn){
	$sql = "SELECT * from teachers WHERE id={$id}";	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();
			$data = $row['name'];

			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}