<?php defined("APPLICATION_NAME") OR die("Direct script access is not allowed."); ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= baseUrl(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup>
        </div>
    </a>
    <?php if(Session::get("logged")["role"] !== ""): ?>

    <li class="nav-item <?= activeMenu("admin/dashboard"); ?>">
        <a class="nav-link" href="<?= baseUrl(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if (Session::get("logged")["role"] === "admin"): ?>
    <li class="nav-item <?= activeMenu("admin/role-management"); ?>">
        <a class="nav-link" href="<?= baseUrl("admin/role-management"); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Role Management</span>
        </a>
    </li>
    <?php endif; ?>

    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= baseUrl(); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Guest</span>
            </a>
        </li>
    <?php endif; ?>


</ul>
