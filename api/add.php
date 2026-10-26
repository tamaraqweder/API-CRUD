<?php
header("Content-Type: application/json");

require "../db.php";

$db_obj = new DB_con();
$data = json_decode(file_get_contents("php://input"), true); //من جيسون ل php 

$name = $data["name"];
$email = $data["email"];
$password = $data["password"];
$password = password_hash($password, PASSWORD_DEFAULT);

$result = $db_obj->create($name, $email, $password);


if ($result) {
    echo json_encode(["message" => "User created successfully"]);
} else {
    echo json_encode(["message" => "Failed to create user"]);
}






//البيانات الداخلة: JSON ← تحوّلت إلى مصفوفة PHP باستخدام json_decode().
//- البيانات الخارجة: مصفوفة PHP ← تحوّلت إلى JSON باستخدام json_encode().


?>


