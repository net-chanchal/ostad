<?php
defined("APPLICATION_NAME") or die("Direct script access is not allowed.");

// Check admin login
if (!Session::has("logged") || (Session::get("logged")["role"] !== "admin")) {
    redirect(baseUrl("logout"));
}

Template::extend("includes/layouts/master.php");
Template::section("title", "Role Management");
Template::section("content");
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Role Management</h1>

        <div id="message">
            <!-- For JS response -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $db = new Database(DATA_DIRECTORY);
                        $result = $db->table("users")->get();

                        foreach ($result as $i => $row):
                        ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td><?= $row["first_name"]; ?></td>
                            <td><?= $row["last_name"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td>
                                <?php if ($row["id"] === Session::get("logged")["id"]): ?>
                                    <label>
                                        <select class="form-control form-control-sm" disabled>
                                            <option value="">Admin</option>
                                        </select>
                                    </label>
                                <?php else: ?>
                                    <label>
                                        <select class="form-control form-control-sm permission" data-id="<?= $row["id"]; ?>">
                                            <option value=""></option>
                                            <option value="admin" <?= $row["role"] === "admin" ? "selected" : ""; ?>>Admin</option>
                                            <option value="manager" <?= $row["role"] === "manager" ? "selected" : ""; ?>>Manager</option>
                                            <option value="user" <?= $row["role"] === "user" ? "selected" : ""; ?>>User</option>
                                        </select>
                                    </label>
                                <?php endif; ?>
                            </td>
                            <td><?= date("M d, Y", strtotime($row["created_at"])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Role Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to change the user role?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveButton" class="btn btn-primary">Change Role</button>
                </div>
            </div>
        </div>
    </div>
<?php
Template::endSection(); // End content section

// Start script section
Template::section("script");
?>
    <script>
        $(".permission").on("change", function() {
            $('#myModal').modal("show");
            window.user = [
                $(this).data("id"), // id
                $(this).val() // role
            ];
        });

        $("#saveButton").on("click", function () {
            const id = window.user[0];
            const role = window.user[1];

            $.ajax({
                url: "<?= baseUrl("admin/ajax/role-permission"); ?>",
                method: "POST",
                data: {"id": id, "role": role},
                beforeSend: function() {
                    $("#message").html(`<div class="alert alert-primary" role="alert">Please wait...</div>`);
                },
                success: function(json) {
                    if (json["status"] === "SUCCESS") {
                        $("#message").html(`<?= success("The role has been updated."); ?>`);
                    } else {
                        $("#message").html(`<?= error("Role update failed."); ?>`);
                    }
                }
            });

            $('#myModal').modal("hide");
        });
    </script>
<?php
Template::endSection(); // End script section
Template::execute();
