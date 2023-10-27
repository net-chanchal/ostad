<?php
defined("APPLICATION_NAME") OR die("Direct script access is not allowed.");

// This page only for guest.
// This page is for those users who have role empty.
// When a user registers his role is empty.

// Check Guest Login
if (!Session::has("logged") && Session::get("logged")["role"] !== "") {
    redirect(baseUrl("logout"));
}

Template::extend("includes/layouts/master.php");
Template::section("title", "Guest");
Template::section("content");
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Guest Dashboard</h1>
        <p>Please wait for the role permission.</p>
    </div>
<?php
Template::endSection();
Template::execute();
