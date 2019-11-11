<?php
 require (__DIR__ . '/Classes/Db.php');
 require (__DIR__ . '/Classes/UsersTable.php');

$db = new Db('ota', 'root', '', 'localhost');

$usersTable =  new UsersTable($db);
$allUsers = $usersTable->findAll();

foreach ($allUsers as $allUser) {
    var_dump($allUser['email']);
}
