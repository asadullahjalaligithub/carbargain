<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-car text-success"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Transaction</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Deals</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="purchase.php">Purchase</a>
                        <a class="collapse-item" href="sale.php">Sales</a>
                    </div>
                </div>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Settings</div>

            <!-- Nav Item - Pages Collapse Menu -->
            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="company.php">
                    <i class="fas  fa-building"></i>
                    <span>Company</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="models.php">
                    <i class="fas fa-tasks"></i>
                    <span>Model</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="colors.php">
                    <i class="fas fa-paint-brush"></i>
                    <span>Color</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="engine.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Engine</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="person.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Person</span></a>
            </li>
            <?php 
            if($_SESSION['privilage']=='admin') {
            ?>
<!-- Divider -->
<hr class="sidebar-divider" />

<!-- Heading -->
<div class="sidebar-heading">Admin Setting</div>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="purchaseApprovals.php">
        <i class="fas  fa-check-circle"></i>
        <span>Purchase Approvals</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="salesApprovals.php">
        <i class="fas fa-check-square"></i>
        <span>Sales Approvals</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="Users.php">
        <i class="fas fa-users"></i>
        <span>Manage Users</span></a>
</li>

<?php }?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>