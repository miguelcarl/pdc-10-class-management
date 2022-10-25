<?php

include ("init.php");
use Student;


$template = $mustache->loadTemplate('student/add.mustache');
echo $template->render();

try {
    if (isset($_POST['first_name'])) {
        $saveStudent = new Student($_POST['first_name'], $_POST['last_name'], $_POST['student_number'], $_POST['email'], $_POST['contact_number'], $_POST['program']);
        $saveStudent->setConnection($connection);
        $saveStudent->saveStudent();
        header('index.php');
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}