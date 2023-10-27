<?php
// Check Login Session
if (Session::has("logged")) {
    $role = Session::get("logged")["role"];
} else {
    // If session not exist then logout
    redirect(baseUrl("logout"));
}

// Three types of user's role 'admin', 'manager' and 'user'.
// Redirect different page and it's depend under role.
if ($role === "admin") {
    redirect(baseUrl("admin/dashboard"));
} elseif ($role === "manager") {
    redirect(baseUrl("manager/dashboard"));
} elseif ($role == "user") {
    redirect(baseUrl("user/dashboard"));
} else {
    // Redirect to guest page if role is empty.
    redirect(baseUrl("guest"));
}
