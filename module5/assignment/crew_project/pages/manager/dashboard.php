<?php
defined("APPLICATION_NAME") or die("Direct script access is not allowed.");

// Check manager login
if (!Session::has("logged") || (Session::get("logged")["role"] !== "manager")) {
    redirect(baseUrl("logout"));
}

Template::extend("includes/layouts/master.php");
Template::section("title", "Dashboard");
Template::section("content");
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Manager Dashboard</h1>
    </div>
<?php
Template::endSection();
Template::execute();
