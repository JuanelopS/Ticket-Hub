<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";

// $user = new User('test6@est.com', '111111111114r8h', 'testname6', 'testsurname6');

/* echo "<pre>";
print_r($user->get_all());
echo "</pre>";
 */

/* $user->insert(); */

/* User::delete(2); */

// print_r(User::get_by_id(1));

$data = User::get_by_id(5);

require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/user.php";




