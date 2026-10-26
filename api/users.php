<?php
//مكانًا يستقبل طلب عرض المستخدمين،

require "../db.php";//صندوق
$db_obj = new DB_con();//نسخه من الصندوق
$users = $db_obj->fetchdata(); //خزنا البيانات هون  داخل الصندوق

header("Content-Type: application/json"); //ملصق ع الصندوق انه جيسون

echo json_encode($users); //بتحوّل البيانات من صيغة PHP إلى صيغة JSON.

?>