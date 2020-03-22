* __GET:__ curl -i -X GET http://studenter.miun.se/~jolu1806/dt173g/api/courselist.php/courses
* __GET med ID:__ curl -i -X GET http://studenter.miun.se/~jolu1806/dt173g/api/courselist.php/courses/19
* __POST:__ curl -i -X POST -d '{"code":"DT057G","name":"Webbutveckling I", "progression":"A", "syllabus":"https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=17948"}' http://localhost/web3/course/courselist.php/courses/
* __PUT:__ curl -i -X PUT -d '{"code":"DT057G","name":"Webbutveckling I", "progression":"A", "syllabus":"https://www.miun.se/utbildning/kursplaner-och-utbildningsplaner/Sok-kursplan/kursplan/?kursplanid=17948"}' http://localhost/web3/course/courselist.php/courses/1
* __DELETE:__ curl -i -X DELETE http://studenter.miun.se/~jolu1806/dt173g/api/courselist.php/courses/19"# mom5.1" 

