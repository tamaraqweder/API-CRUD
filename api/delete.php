
<?php
header("Content-Type: application/json");

require "../db.php";

$db_obj = new DB_con();

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];

$result = $db_obj->delete($id);

if ($result) {
    echo json_encode(["message" => "User deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete user"]);
}
?>
