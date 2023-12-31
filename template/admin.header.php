<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Love Hon Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body class="text-bg-light min-vh-100 d-flex">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 text-bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Love Hon Admin</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-auto" id="menu">
                        <li class="nav-item">
                            <a href="admin.dashboard.php" class="nav-link text-white <?php if ($current_page == 'home') echo 'active' ?>">
                                <i class="fs-5 bi bi-house"></i>
                                <span class="fs-4 fs-md-5 d-none d-md-inline">Home</span>
                            </a>
                        </li>
                        <!-- Add link to inbox page -->
                        <li class="nav-item">
                            <a href="admin.orders.php" class="nav-link text-white <?php if ($current_page == 'inbox') echo 'active' ?>">
                                <i class="fs-4 bi bi-envelope"></i>
                                <span class="fs-5 d-none d-sm-inline">Inbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.orders.php" class="nav-link text-white <?php if ($current_page == 'orders') echo 'active' ?>">
                                <i class="fs-4 bi bi-card-checklist"></i>
                                <span class="fs-5 d-none d-sm-inline">Orders</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-5 bi bi-person-circle"></i>
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="logoutHandler.php" method="post">
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">