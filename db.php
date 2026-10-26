<?php
session_start();
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'registration_system');
define('DB_PORT', '3306');
class DB_con
{
    private $connect;
public function __construct()
{
try {
        $this->connect = new PDO(
        "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=utf8mb4",DB_USER, DB_PASS);
       
    }
   catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
    }


}
public function fetchdata(){
    $read_data="SELECT id,name,email FROM users";
    $result = $this->connect->query($read_data)->fetchAll(PDO::FETCH_ASSOC);
   
return $result;
}

public function create($name, $email, $password){
    $sql = "INSERT INTO `users`( `name`, `email`, `password`) VALUES (?, ?, ?)";
    
    $stmt= $this->connect->prepare($sql);
    
    return  $stmt->execute([$name, $email, $password]);

}

public function delete($id){
    $deleteid = "DELETE FROM `users` WHERE id =?";

    $stmt= $this->connect->prepare($deleteid);
    
    return  $stmt->execute([$id]);
}


public function fetchOne($id){
$Query = "SELECT name, email FROM users WHERE id = ?";
$stmt = $this->connect->prepare($Query);
$stmt->execute([$id]);

return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($id , $name , $email , $password){
     $sql = "UPDATE users
                SET name = ?, email = ?, password = ?
                WHERE id = ?";

        $stmt = $this->connect->prepare($sql);
return $stmt->execute([$name, $email, $password, $id]);
        // header("Location: index.php");
}


}
// ?>