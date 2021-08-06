<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LADO <sup>ADMIN</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($activePage == 'index') ? 'active':''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'customers') ? 'active':''; ?>">
        <a class="nav-link" href="customers.php">
        <i class="fas fa-users"></i>
            <span>Customers</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item <?= ($activePage == 'referal_tree') ? 'active':''; ?>">
        <a class="nav-link" href="referal_tree.php">
        <i class="fa fa-tree" aria-hidden="true"></i>
            <span>Referal Tree</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'add_product') ? 'active':''; ?>">
        <a class="nav-link" href="add_product.php">
        <i class="fas fa-plus-square"></i>
            <span>Add Product</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'add_msg') ? 'active':''; ?>">
        <a class="nav-link" href="add_msg.php">
        <i class="fa fa-comment" aria-hidden="true"></i>
            <span>Send Message</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'products') ? 'active':''; ?>">
        <a class="nav-link" href="products.php">
        <i class="fas fa-birthday-cake"></i>
            <span>Products</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'orders') ? 'active':''; ?>">
        <a class="nav-link" href="orders.php">
        <i class="fas fa-shipping-fast"></i>
            <span>Orders</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item <?= ($activePage == 'withdraw_request') ? 'active':''; ?>">
        <a class="nav-link" href="withdraw_request.php">
        <i class="fa fa-credit-card" aria-hidden="true"></i>
            <span>Gift Request</span></a>
    </li>
    <!-- <hr class="sidebar-divider">
    <li class="nav-item <?= ($activePage == 'activate_user') ? 'active':''; ?>">
        <a class="nav-link" href="activate_user.php">
        <i class="fa fa-check" aria-hidden="true"></i>
            <span>Activate User</span></a>
    </li> -->

    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'share') ? 'active':''; ?>">
        <a class="nav-link" href="share.php">
        <i class="fa fa-share-alt" aria-hidden="true"></i>
            <span>Share</span></a>
    </li>



<hr class="sidebar-divider">
<li class="nav-item <?= ($activePage == 'profit_share') ? 'active':''; ?>">
        <a class="nav-link" href="profit_share.php">
        <i class="fa fa-share-square" aria-hidden="true"></i>
            <span>Share Profit</span></a>
    </li>



<hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'cancel_products') ? 'active':''; ?>">
        <a class="nav-link" href="cancel_products.php">
        <i class="fa fa-window-close"></i>
            <span>Canceled Orders</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($activePage == 'transfer_history') ? 'active':''; ?>">
        <a class="nav-link" href="transfer_history.php">
        <i class="fa fa-history" aria-hidden="true"></i>
            <span>Transfer History</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    Interface
</div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    Addons
</div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>