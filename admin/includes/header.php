<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
    });
</script>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary nb1">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="dashboard.php">Ayunae | Admin Portal</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="color:white" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="post" action="search-orders.php">
        <div class="input-group">
            <input class="form-control" type="text" name="searchinputdata" placeholder="Enter Name or Order No." aria-label="Search for..." aria-describedby="btnNavbarSearch" required />
            <button class="btn btn-primary search1" id="btnNavbarSearch" type="submit" name="search"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw dd1"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="admin-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .nb1 {
        background-color: #cf8d88 !important;
    }

    .search1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #cf8d88;
    }

    .search1:hover , .search1:active {
        color: #fff;
        background-color: #654321;
        border-color:  #654321;
    }

    .dd1 {
        color: #fff;
    }

    .dd1:hover {
        color: #654321;
    }

    .dd1:active {
        color: #654321;
    }
</style>