<?php
declare (strict_types = 1);

use PHPUnit\Framework\TestCase;

include '/docker/home/db/db.php';  
include '/docker/home/functions.php';

$table 	    = $_POST['table'];
$crud_tp 	= $_POST['crud_tp'];
$user_info  = $_POST['user_info'];
$where_map  = $_POST['where_map'];
// $id 		= $_POST['col1'];
// $username 	= $_POST['col2'];
// $email 		= $_POST['col3'];
// $pwd 		= $_POST['col4'];
// $age 		= $_POST['col5'];

// $employee_list = array(
//     $id,
//     $username,
//     $email,
//     $pwd,
//     $age
// );

// file_put_contents('myDebug',"'.usercrud.','".$user_info[1]."'\n", FILE_APPEND | LOCK_EX);

if ($crud_tp == 'insert') {
    db()->insert($table, $user_info);
} elseif($crud_tp == 'update') {
    db()->update($table, $user_info, $where_map);
} elseif($crud_tp == 'delete') {
    db()->delete($table, $where_map);
    //삭제 후 조회값 리턴
    $rows = db()->rows($table);
    echo json_encode($rows);
} elseif($crud_tp == 'search') {
    $rows = db()->rows($table);
    echo json_encode($rows);
} else {
    echo 'fail';
}




// final class CrudData extends TestCase
// {
//     public function testInsert(): void
//     {
//         //users table clear
//         db()->query("TRUNCATE users");
//         // insert
//         db()->insert('users', ['name' => 'Person', 'age' => 30, 'address' => 'seoul']);
//         // search
//         $rows = db()->rows('users');
//         // === type and value 를 모두 비교하여 같은경우만 수행
//         // assertTrue : assertsame, assert... 이런식으로 asset으로 시작하는 테스트 함수들은 안의 조건들이 맞으면 게속수행, 아니면 에러를 발생시키는 내장함수이다.
//         $this->assertTrue(count($rows) === 1); //조회건수가 1건이 맞다면 아래 계속 수행
//         $rows = db()->rows('users', ['name' => 'Person']);
//         $this->assertTrue(count($rows) === 1);
//         db()->insert('users', ['name' => 'Person', 'age' => 30, 'address' => 'seoul']);
//         $rows = db()->rows('users');
//         $this->assertTrue(count($rows) === 2); //단순히 배열 갯수를 구하는 내장함수
//         $this->assertTrue(db()->count('users') === 2); //db.php 선언된 함수
//     }

//     public function testUpdate(): void
//     {
//         db()->query("TRUNCATE users");
//         db()->insert('users', ['name' => 'You', 'age' => 30, 'address' => 'seoul']);
//         db()->insert('users', ['name' => 'Me', 'age' => 31, 'address' => 'seoul']);

//         $this->assertTrue(db()->count('users') == 2);

//         db()->update('users', ['name' => 'Jeo'], ['age' => 30]);

//         $this->assertTrue(db()->count('users', ['name' => 'You']) == 0);
//         $this->assertTrue(db()->count('users', ['name' => 'Jeo']) == 1);

//     }

// }