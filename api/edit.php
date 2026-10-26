<?php
header("Content-Type: application/json");

require "../db.php";

$db_obj = new DB_con();

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];
$name = $data["name"];
$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);

$result = $db_obj->update($id, $name, $email, $password);

if ($result) {
    echo json_encode(["message" => "User updated successfully"]);
} else {
    echo json_encode(["message" => "Failed to update user"]);
}?>