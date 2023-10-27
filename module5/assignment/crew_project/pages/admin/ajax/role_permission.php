<?php
defined("APPLICATION_NAME") OR die("Direct script access is not allowed.");

// Check admin login
if (!Session::has("logged") || (Session::get("logged")["role"] !== "admin")) {
    redirect(baseUrl("logout"));
}

// Received user post data
$id = inputPost("id");
$role = inputPost("role");

// Update role
$db = new Database(DATA_DIRECTORY);
$isUpdated = $db->table("users")
    ->where("id", $id)
    ->update(["role" => $role]);

if ($isUpdated === true) {
    $response["status"] = "SUCCESS";
} else {
    $response["status"] = "FAILED";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
sleep(2);
