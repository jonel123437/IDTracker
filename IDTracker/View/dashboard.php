<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>idTracker | Dashboard</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
    </head>
    <body>
        <?php
            include "Model/loginModel.php";
            include "Model/searchModel.php";
        ?>
        <header>
            <div class="header_container">
                <h1 id="dashboard_title" style="cursor: pointer; margin-left: 1rem;">ID Tracker</h1>
                <div class="header_container1">
                    <ul class="ul_container">
                        <li><a href="" id="dropdown"><?= $fullNameProfile ?><a href="" id="dropdown1"> ▼</a></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="dropdown-logout">
            <a href="?page=profile">Profile</a>
            <br>
            <a href="?page=dashboard">Dashboard</a>
            <br>
            <a href="#" onclick="confirmLogout()">Logout</a>
        </div>
        <div id="greetings" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
            <h1>WELCOME TO DASHBOARD</h1>
            <form action="" method="post">
                <div>
                    <input type="text" placeholder="Search ID" name="id_no">
                    <button type="submit" id="search_id">></button>
                </div>
            </form>
        </div>
    </body>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/profile.js"></script>
</html>
