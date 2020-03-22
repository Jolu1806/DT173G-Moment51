<!-- Author Johan Lundqvist, FX utav moment 5.1.. Åtgärdad -->

<?php

// Skickar header-information
header("Content-type: application/json; charset=utf-8");
header("Access-control-allow-origin: *");
header('Access-control-Allow-Methods: POST, GET, DELETE, PUT');

// Hanterar db-kopplingar
include("includes/config.php");
include("includes/CourseRegister.class.php");

// Http-method, path och input av förfrågan
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

if ($request[0] != "courses") {
    http_response_code(404);
    exit();
}

$course = new CourseRegister(); // Klassen CourseRegister

// Om id används
if(isset($request[1])){
    $id = $request[1];
}

// Dess input skrivs in som variabler
$code = $input["code"];
$name = $input["name"];
$progression = $input["progression"];
$syllabus = $input["syllabus"];

switch ($method){
	case "GET":
		if(isset($id)) {
			// hämtar en specifik kurs
			$response = $course->getSpecifikCourse($id);
		}
		else {
			//Visar alla kurser
			$response = $course->getCourses();
		}
		//Returnerar resultat i JSON
		echo json_encode($response, JSON_PRETTY_PRINT);
		break;
	case "PUT":
		//Uppdaterar en kurs
		$course->updateCourse($id, $code, $name, $progression, $syllabus);
    	break;
	case "POST":
		//Lägger till en kurs
		$course->addCourse($code, $name, $progression, $syllabus);
		break;
	case "DELETE":
		//Raderar en kurs
   		$course->deleteCourse($id);
		break;
}

$courseArr = []; // Skapar tom json

if($method != "GET") {
    // skriver ut alla kurser
    $courseList = $course->getCourses();

    //Skapar array, därefter till JSON
    foreach($courseList as $row) {
        $row_arr['id'] = $row['id'];
        $row_arr['code'] = $row['code'];
        $row_arr['name'] = $row['name'];
        $row_arr['progression'] = $row['progression'];
        $row_arr['syllabus'] = $row['syllabus'];
        array_push($courseArr,$row_arr);
    }
    echo json_encode($courseArr);
}
?>