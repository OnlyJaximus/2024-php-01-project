<?php

// $pageName = $_SERVER['SCRIPT_NAME'];
//echo $pageName; // 2_project_php/admin/enquiries.php

$pageName = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
//echo $pageName;  // services.php

?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="index.php">
            <h4>BlekY Services</h4>
        </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  
                <?php echo $pageName == 'index.php' ? 'active' : '' ?> " href="index.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-home <?php echo $pageName == 'index.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Enquires</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                <?php echo $pageName == 'enquiries.php' ? 'active' : '' ?>
                " href="enquiries.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bullhorn <?php echo $pageName == 'enquiries.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enquiries</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Mange Services</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  
                <?php echo $pageName == 'services.php' ? 'active' : '' ?>
                <?php echo $pageName == 'services-create.php' ? 'active' : '' ?>
                <?php echo $pageName == 'services-edit.php' ? 'active' : '' ?>
                " href="services.php">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cogs   <?php echo $pageName == 'services.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
            </li>



            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Site Managment</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                <?php echo $pageName == 'users.php' ? 'active' : '' ?>
                <?php echo $pageName == 'users-create.php' ? 'active' : '' ?>
                <?php echo $pageName == 'users-edit.php' ? 'active' : '' ?>
                " href="users.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-plus  <?php echo $pageName == 'users.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin / Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  
                <?php echo $pageName == 'social-media.php' ? 'active' : '' ?>
                <?php echo $pageName == 'social-media-edit.php' ? 'active' : '' ?>
                <?php echo $pageName == 'social-media-create.php' ? 'active' : '' ?>
                " href="social-media.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-globe  <?php echo $pageName == 'social-media.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Social Media</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link  <?php echo $pageName == 'settings.php' ? 'active' : '' ?> " href="settings.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-globe  <?php echo $pageName == 'settings.php' ? 'text-white' : 'text-dark' ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Settings</span>
                </a>
            </li>


        </ul>
    </div>

    <div class="sidenav-footer mx-3 ">
        <a class="btn bg-gradient-primary mt-3 w-100" href="logout.php">Logout</a>

    </div>

</aside>